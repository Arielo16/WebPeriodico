<template>
  <div class="card">
    <HomeTopBar />
    <div v-if="news" class="news-details">
      <h1>{{ news.title }}</h1>
      <img v-if="news.images.length" :src="news.images[0]" alt="News Image" />
      <p><strong>Descripción:</strong> {{ news.description }}</p>
      <p><strong>Categoría:</strong> {{ news.categoryID }}</p>
      <p><strong>Autor:</strong> {{ news.writer_name }}</p>
      <p><strong>Vistas:</strong> {{ news.views }}</p>
    </div>
    <p v-else>Cargando noticia...</p>
  </div>
</template>

<script>
import axios from 'axios';
import { useRoute } from 'vue-router';
import { ref, onMounted } from 'vue';
import HomeTopBar from '@/components/layout/HomeTopBar.vue';
import { authService } from '@/services/auth.service';

export default {
  name: 'NewsDetails',
  components: {
    HomeTopBar
  },
  setup() {
    const route = useRoute();
    const news = ref(null);

    onMounted(async () => {
      try {
        const response = await axios.get(`http://localhost:8000/api/news/${route.params.id}`);
        news.value = response.data;
      } catch (error) {
        console.error('Error al cargar la noticia:', error);
      }
    });

    return { news };
  },
  methods: {
    logout() {
      authService.logout();
      this.$router.push('/login');
    }
  }
};
</script>

<style scoped>
.card {
  background-color: #a8a8a81f;
  color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.news-details {
  padding: 20px;
  color: #000; /* Change text color to black */
}
img {
  width: 100%;
  max-width: 600px;
}
.home-topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1rem 2rem;
  background-color: #333;
  color: #fff;
  z-index: 1000; /* Asegura que la barra superior esté siempre al frente */
}
.menu, .user-profile {
  display: flex;
  gap: 1rem;
}
.logo {
  font-size: 1.5rem;
  font-weight: bold;
}
.nav-link {
  color: #fff;
  text-decoration: none;
  background: none;
  border: none;
  cursor: pointer;
}
.nav-link:hover {
  text-decoration: underline;
}
.news-card-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
}
</style>
