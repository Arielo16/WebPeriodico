<template>
  <div>
    <div class="card">
      <HomeTopBar />
      <div class="UserProfile">
        <h1>Perfil de Usuario</h1>
        <div v-if="user">
          <h2>{{ user.name }}</h2>
          <p>Email: {{ user.email }}</p>
        </div>
        <div class="card" v-if="writers.length">
          <h2>Lista de Escritores</h2>
          <ul>
            <li v-for="writer in writers" :key="writer.id">{{ writer.name }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import HomeTopBar from '@/components/layout/HomeTopBar.vue'

export default {
  name: 'UserProfile',
  components: {
    HomeTopBar
  },
  data() {
    return {
      user: null,
      writers: []
    }
  },
  mounted() {
    this.getUserProfile()
    this.getWriters()
  },
  methods: {
    async getUserProfile() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/profile')
        this.user = response.data
      } catch (error) {
        console.error('Error obteniendo el perfil:', error)
      }
    },
    async getWriters() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/show')
        this.writers = response.data
      } catch (error) {
        console.error('Error obteniendo la lista de escritores:', error)
      }
    }
  }
}
</script>

<style scoped>
.profile {
  padding: 2rem;
}

.card {
  border: 1px solid #ccc;
  padding: 1rem;
  margin-top: 1rem;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>
