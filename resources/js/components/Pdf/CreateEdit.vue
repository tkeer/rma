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
            <input v-model="pdf.title" class="form-control" id="title" placeholder="Add Title" required>
          </div>

          <div class="col-12 p-2">
            <label for="file" class="form-label">File</label>
            <b-form-file v-model="pdf.file" class="form-control" id="file" plain :required="!pdf.id"></b-form-file>
          </div>

        </div>

      </div>


      <div class="container">
        <button class="btn btn-primary btn-lg mt-3" type="submit">Save</button>
        <router-link class="btn btn-danger text-white btn-lg mt-3" :to="{ name: 'home' }">Cancel</router-link>
      </div>
    </form>

  </div>


</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      pdf: {
        title: '',
        file: null,
      },
    }
  },
  async created() {
    if (this.$route.params.id) {
      this.pdf = await axios.get(`admin/pdfs/${this.$route.params.id}`).then(({ data: { data } }) => data)
    }
  },
  methods: {
    submit () {
      let path = '/admin/pdfs'
      const formData = new FormData();
      formData.append("title", this.pdf.title);
      if (this.pdf.file) {
        formData.append("file", this.pdf.file);
      }
      if (this.pdf.id) {
        path = `${path}/${this.pdf.id}`
        formData.append('_method', 'put')
      }

      axios.post(path, formData).then(() => {
        this.$router.push({ name: 'home'})
      })
    }
  }
}
</script>
