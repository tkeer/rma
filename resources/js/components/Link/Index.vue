<template>

  <div>
    <div class="container mb-3 d-flex justify-content-between">
      <h2>Links</h2>
      <router-link class="btn btn-default btn-lg" :to="{ name: 'link.create' }">Add more</router-link>
    </div>

    <div class="" v-if="loading">
      Loading...
    </div>

    <div v-if="!loading && links.length === 0">
      No record found.
    </div>

    <div class="p-1 mb-4 bg-light rounded-3 border" v-for="link in links">
      <div class="container-fluid py-2">
        <div class="d-flex justify-content-between flex-wrap">
          <p class="fs-4">
            <span class="text-break">{{ link.title }}</span>
            <span class="fs-6">(Opens in {{ link.opens_in_new ? 'new' : 'same'}} page)</span>
          </p>
          <div>
            <router-link :to="{ name: 'link.edit', params: { id: link.id }}">Edit</router-link>
            <button class="btn btn-link" @click="destroy(link)">Delete</button>

          </div>
        </div>
        <a :href="link.link" class="text-break" :target="link.opens_in_new ? '_blank' : '_self'">{{ link.link }}</a>
      </div>
    </div>


    <div class="container" v-if="pagination.total > pagination.perPage">
      <b-pagination
          pills
          size="sm"
          v-model="pagination.page"
          :total-rows="pagination.total"
          :per-page="pagination.perPage"
      ></b-pagination>
    </div>

  </div>


</template>

<script>
import axios from 'axios'

export default {
  created() {
    this.fetchLinks()
  },
  watch: {
    'pagination.page': function () {
      this.fetchLinks()
    }
  },
  data() {
    return {
      loading: true,
      links: [],
      pagination: {
        perPage: 20,
        page: 1,
        total: 0
      },
    }
  },
  methods: {
    fetchLinks() {
      this.loading = true
      axios.get('admin/links', { params: this.pagination }).then(({ data }) => {
        this.links = data.data
        this.pagination.total = data.total
        this.loading = false
      })
    },
    destroy(link) {
      this.$bvModal.msgBoxConfirm('Are you sure you want to delete this link?', {
        okVariant: 'danger',
        okTitle: 'YES',
        cancelTitle: 'NO',
      })
          .then(value => {
            if (value) {
              axios.delete(`admin/links/${link.id}`).then(() => {
                this.fetchLinks();
              })
            }
          })
    },
  }
}
</script>
