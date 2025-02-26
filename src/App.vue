<template>
  <div id="app">
    <router-view></router-view>
    <AppFooter />
  </div>
</template>

<script>
import AppFooter from '@/components/layout/Footer.vue'

export default {
  name: 'App',
  components: {
    AppFooter
  }
}
</script>

<style>
#app {
  font-family: var(--font-family-base);
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

/* Esto asegura que el footer siempre esté al final */
.router-view-container {
  flex: 1;
}
</style>
