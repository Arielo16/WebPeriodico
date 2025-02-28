<template>
  <div class="dashboard-container">
    <h1>Noticias</h1>
    <div v-if="loading" class="loading">Cargando...</div>
    <div v-if="error" class="error-message">{{ error }}</div>
    <NewsList v-if="newsList.length" :newsList="newsList" />
  </div>
</template>

<script>
import NewsList from '@/components/NewsList.vue'
import api from '@/services/api'

export default {
  name: 'DashboardPage',
  components: {
    NewsList
  },
  data() {
    return {
      newsList: [],
      loading: false,
      error: null
    }
  },
  async created() {
    this.loading = true;
    try {
      const response = await api.get('/news/register');
      this.newsList = response.data;
    } catch (error) {
      this.error = 'Error al cargar las noticias.';
    } finally {
      this.loading = false;
    }
  }
}
</script>

<style scoped>
.dashboard-container {
  padding: 2rem;
  background-color: #f4f4f4;
}

.loading {
  text-align: center;
}

.error-message {
  color: red;
  text-align: center;
}

.news-list {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
</style>
