<template>
  <div class="home-container">
    <HomeTopBar />
    <h1>Noticias Principales</h1>
    <div v-if="loading" class="loading">Cargando...</div>
    <div v-if="error" class="error-message">{{ error }}</div>
    <div v-if="newsList.length" class="news-list">
      <NewsCard v-for="news in newsList" :key="news.notciaID" :news="news" />
    </div>
  </div>
</template>

<script>
import HomeTopBar from '@/components/layout/HomeTopBar.vue'
import NewsCard from '@/components/NewsCard.vue'
import api from '@/services/api'

export default {
  name: 'HomePage',
  components: {
    HomeTopBar,
    NewsCard
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
      const response = await api.get('/get/news'); // Updated route
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
.home-container {
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
  flex-wrap: wrap;
  gap: 2rem;
  justify-content: center;
}
</style>
