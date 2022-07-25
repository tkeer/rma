<template>

  <div>
    <div class="container mb-3 d-flex justify-content-between">
      <h2>PDFs</h2>
      <router-link class="btn btn-default btn-lg" :to="{ name: 'pdf.create' }">Add more</router-link>
    </div>

    <div class="" v-if="loading">
      Loading...
    </div>

    <div v-if="!loading && pdfs.length === 0">
      No record found.
    </div>

    <div class="p-1 mb-4 bg-light rounded-3 border" v-for="pdf in pdfs">
      <div class="container-fluid py-2">
        <div class="d-flex justify-content-between flex-wrap">
          <p class="fs-4 text-break">{{ pdf.title }}</p>
          <div>
            <router-link :to="{ name: 'pdf.edit', params: { id: pdf.id }}">Edit</router-link>
            <button class="btn btn-link" @click="destroy(pdf)">Delete</button>

          </div>
        </div>
        <a class="btn btn-primary btn-sm" :href="pdf.path" target="_blank">Download</a>
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
    this.fetchPdfs()
  },
  watch: {
    'pagination.page': function () {
      this.fetchPdfs()
    }
  },
  data() {
    return {
      loading: true,
      pdfs: [],
      pagination: {
        perPage: 20,
        page: 1,
        total: 0
      },
    }
  },
  methods: {
    fetchPdfs() {
      this.loading = true
      axios.get('admin/pdfs', { params: this.pagination }).then(({ data }) => {
        this.pdfs = data.data
        this.pagination.total = data.total
        this.loading = false
      })
    },
    destroy(pdf) {
      this.$bvModal.msgBoxConfirm('Are you sure you want to delete this pdf?', {
        okVariant: 'danger',
        okTitle: 'YES',
        cancelTitle: 'NO',
      })
          .then(value => {
            if (value) {
              axios.delete(`admin/pdfs/${pdf.id}`).then(() => {
                this.fetchPdfs();
              })
            }

          })
    },
  }
}
</script>
