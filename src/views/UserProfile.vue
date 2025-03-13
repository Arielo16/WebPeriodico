<template>
  <div>
    <div class="card">
      <HomeTopBar />
      <div class="UserProfile">
        <h1>Perfil de Usuario</h1>
        <div v-if="user">
          <h2>{{ user.name }}</h2> <!-- Muestra el nombre del usuario autenticado -->
        </div>
        <div class="card" v-if="writers.length">
          <h2>Lista de Escritores</h2>
          <ul>
            <li v-for="writer in writers" :key="writer.matricula">
              {{ writer.matricula }} - {{ writer.name }} - {{ writer.last_name }} - {{ writer.secund_last_name }}
            </li>
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
  },
  methods: {
    async getUserProfile() {
      try {
        const user = JSON.parse(localStorage.getItem('user'))
        if (user) {
          this.user = user
          const response = await axios.get(`/api/user/profile`, {
            headers: {
              'Authorization': `Bearer ${localStorage.getItem('token')}`
            }
          })
          this.writers = response.data.writer
        }
      } catch (error) {
        console.error('Error obteniendo el perfil:', error)
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
