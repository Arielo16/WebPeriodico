<template>
  <img 
    :src="currentSrc" 
    :alt="alt"
    @error="handleError"
    v-bind="$attrs"
  >
</template>

<script>
export default {
  name: 'BaseImage',
  props: {
    src: {
      type: String,
      required: true
    },
    alt: {
      type: String,
      default: ''
    },
    fallbackSrc: {
      type: String,
      default: 'https://placehold.co/600x400/png'
    }
  },
  data() {
    return {
      currentSrc: this.src
    }
  },
  methods: {
    handleError() {
      this.currentSrc = this.fallbackSrc
    }
  }
}
</script> 