<template>

  <div>
    <div class="container mb-3 d-flex justify-content-between">
      <h2>Snippets</h2>
      <router-link class="btn btn-default btn-lg" :to="{ name: 'snippet.create' }">Add more</router-link>
    </div>

    <div class="" v-if="loading">
      Loading...
    </div>

    <div v-if="!loading && snippets.length === 0">
      No record found.
    </div>

    <div class="p-1 mb-4 bg-light rounded-3 border" v-for="(snippet, index) in snippets">
      <div class="container-fluid py-2">
        <div>
          <div class="my-2">
            <div class="d-flex justify-content-between">
              <p class="fs-4">{{ snippet.title }}</p>

              <div>
                <button class="btn btn-link" @click="copy(snippet)">Copy</button>
                <router-link :to="{ name: 'snippet.edit', params: { id: snippet.id }}">Edit</router-link>
                <button class="btn btn-link" @click="destroy(snippet)">Delete</button>
              </div>

            </div>
            <div><show-more :text="snippet.descr"></show-more></div>
          </div>

        </div>
        <button class="btn btn-primary btn-sm" @click="() => $set(showSnippet, index, !showSnippet[index])">
          {{ showSnippet[index] ? 'Hide snippet' : 'Show snippet'}}
        </button>

        <div
            class="mt-3 border p-3"
            style="max-height: 300px; overflow-y: scroll"
            v-show="showSnippet[index]"
            v-html="snippet.snippet"
        />

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
import ShowMore from "../ShowMore";

export default {
  components: {
    ShowMore
  },
  created() {
    this.fetchSnippets()
  },
  watch: {
    'pagination.page': function () {
      this.fetchSnippets()
    }
  },
  data() {
    return {
      loading: true,
      showSnippet: [],
      snippets: [],
      pagination: {
        perPage: 20,
        page: 1,
        total: 0
      },
    }
  },
  methods: {
    fetchSnippets() {
      this.loading = true
      axios.get('admin/snippets', { params: this.pagination }).then(({ data }) => {
        this.snippets = data.data
        this.pagination.total = data.total
        this.loading = false
      })
    },
    copy(snippet, variant) {
      navigator.clipboard.writeText(snippet.snippet)

      this.$bvToast.toast('Copied', {
        variant: 'success',
        noCloseButton: true
      })
    },
    destroy(snippet) {
      this.$bvModal.msgBoxConfirm('Are you sure you want to delete this snippet?', {
        okVariant: 'danger',
        okTitle: 'YES',
        cancelTitle: 'NO',
      })
          .then(value => {
            if (! value) {
              axios.delete(`admin/snippets/${snippet.id}`).then(() => {
                this.fetchSnippets();
              })
            }
          })
    },
  }
}
</script>

<style>
.toast:not(.show) {
  display: block;
}
</style>
