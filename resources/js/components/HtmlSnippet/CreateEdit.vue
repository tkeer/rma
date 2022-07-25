<template>

  <div>

    <div class="row">
      <h2>{{ $route.meta.title }}</h2>
    </div>

    <form @submit.prevent="submit()">
      <div class="row g-3">

        <div class="col-12 col-md-6 p-2">
          <label for="title" class="form-label">Title</label>
          <input v-model="snippet.title" class="form-control" id="title" placeholder="Add Title" required>
        </div>

        <div class="col-12 p-2">
          <label class="form-label">Description</label>
          <textarea rows="10" v-model="snippet.descr" class="form-control" required></textarea>
        </div>

        <div class="col-12 p-2 snippet">
          <label class="form-label">Snippet</label>
          <vue-editor v-model="snippet.snippet" required></vue-editor>
        </div>


      </div>


      <div class="container">
        <button class="btn btn-primary btn-lg mt-3" type="submit">Save</button>
        <router-link class="btn btn-danger text-white btn-lg mt-3" :to="{ name: 'snippet.index' }">Cancel</router-link>
      </div>
    </form>

  </div>


</template>

<script>
import axios from 'axios'
import { VueEditor } from "vue2-editor"

export default {
  components: {
    VueEditor
  },
  data() {
    return {
      snippet: {
        title: '',
        descr: '',
        snippet: '',
      },
    }
  },
  async created() {
    if (this.$route.params.id) {
      this.snippet = await axios.get(`admin/snippets/${this.$route.params.id}`).then(({ data: { data } }) => data)
    }
  },
  methods: {
    submit () {
      if (! this.snippet.snippet) {
        return;
      }
      let path = '/admin/snippets'
      const data = this.snippet
      if (this.snippet.id) {
        path += `/${this.snippet.id}`
        data['_method'] = 'put'
      }
      axios.post(path, data).then(() => {
        this.$router.push({ name: 'snippet.index'})
      })
    }
  }
}
</script>

<style lang="scss" scoped>

.snippet :deep(.ql-editor) {
  max-height: 350px;
  overflow-y: auto;
}

</style>