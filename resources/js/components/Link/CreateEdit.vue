<template>


  <div>

    <div class="row">
      <h2>{{ $route.meta.title }}</h2>
    </div>

    <form @submit.prevent="submit()">
      <div class="row g-3">

        <div class="col-md-6 col-12">
          <div class="col-12 p-2">
            <label for="title" class="form-label">Title</label>
            <input v-model="link.title" class="form-control" id="title" placeholder="Add Title" required>
          </div>

          <div class="col-12 p-2">
            <label for="link" class="form-label">Link</label>
            <input type="text" v-model="link.link" class="form-control" id="link" placeholder="Add Link" required>
          </div>

          <div class="col-12 p-2">
            <label for="newtab" class="form-label">Open in new tab?</label>
            <input type="checkbox" v-model="link.opens_in_new" id="newtab">
          </div>


        </div>

      </div>


      <div class="container">
        <button class="btn btn-primary btn-lg mt-3" type="submit">Save</button>
        <router-link class="btn btn-danger text-white btn-lg mt-3" :to="{ name: 'link.index' }">Cancel</router-link>
      </div>
    </form>

  </div>


</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      link: {
        title: '',
        file: null,
        opens_in_new: false,
      },
    }
  },
  async created() {
    if (this.$route.params.id) {
      this.link = await axios.get(`admin/links/${this.$route.params.id}`).then(({ data: { data } }) => data)
    }
  },
  methods: {
    submit () {
      let path = '/admin/links'
      const data = this.link
      if (this.link.id) {
        path = `${path}/${this.link.id}`
        data['_method'] = 'put'
      }

      axios.post(path, data).then(() => {
        this.$router.push({ name: 'link.index'})
      })
    }
  }
}
</script>
