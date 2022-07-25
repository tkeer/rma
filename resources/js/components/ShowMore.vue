<template>
  <div class="container">
    <span v-html="moreText"> </span>
    <a v-if="show" class="btn btn-link" @click="expanded = !expanded">
      {{ expanded ? 'less' : 'more' }}
    </a>
  </div>
</template>

<script>
export default {
  props: {
    text: {
      type: String,
      default: '',
    },
    maxLength: {
      default: 250
    }
  },
  computed: {
    moreText() {
      if (!this.expanded && this.text.length > this.maxLength) {
        return this.text.slice(0, this.maxLength) + '...'
      }
      return this.text
    }
  },
  data() {
    return {
      show: this.text.length > this.maxLength,
      expanded: false,
    }
  }
}
</script>