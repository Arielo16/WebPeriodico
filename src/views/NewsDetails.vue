<template>
  <div class="card">
    <HomeTopBar />
    <div v-if="news" class="news-details">
      <div class="news-header">
        <span class="category-badge">{{ news.categoryID }}</span>
        <h1>{{ news.title }}</h1>
        <div class="news-meta">
          <div class="author-info">
            <span class="author-avatar"></span>
            <span class="author-name">{{ news.writer_name }}</span>
          </div>
          <div class="news-stats">
            <span class="views-count"><i class="eye-icon"></i> {{ news.views }} lecturas</span>
            <span class="publish-date">{{ formatDate(news.createdAt) }}</span>
          </div>
        </div>
      </div>
      
      <div class="content-wrapper">
        <div class="featured-image-container">
          <img v-if="news.images.length" :src="news.images[0]" alt="News Image" class="featured-image" />
          <div class="image-credit" v-if="news.imageCredit">Foto: {{ news.imageCredit }}</div>
        </div>
        
        <div class="article-summary">
          <p class="summary-text">{{ news.description }}</p>
        </div>
        
        <div class="article-body">
          <!-- Aquí iría el contenido completo del artículo si está disponible -->
          <p class="body-text" v-if="news.content">{{ news.content }}</p>
          <div class="article-placeholder" v-else>
            <p>El contenido completo del artículo aparecerá aquí...</p>
          </div>
        </div>
        
        <div class="share-tools">
          <button class="share-btn facebook">Compartir</button>
          <button class="share-btn twitter">Tweet</button>
          <button class="share-btn whatsapp">WhatsApp</button>
        </div>
      </div>
      
      <div class="related-news" v-if="news.relatedArticles && news.relatedArticles.length">
        <h3>Noticias relacionadas</h3>
        <div class="related-news-grid">
          <!-- Aquí irían artículos relacionados si los hubiera -->
        </div>
      </div>
    </div>
    <div v-else class="loading-container">
      <div class="loading-spinner"></div>
      <p>Cargando noticia...</p>
    </div>
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
    },
    formatDate(dateString) {
      if (!dateString) return '';
      const date = new Date(dateString);
      return date.toLocaleDateString('es-ES', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
      });
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

/* Nueva sección de estilos modernos */
.news-details {
  background-color: #ffffff;
  color: #333;
  padding: 0;
  border-radius: 4px;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
  overflow: hidden;
}

.news-header {
  padding: 24px 32px;
  border-bottom: 1px solid #f0f0f0;
  position: relative;
}

.category-badge {
  background-color: #e63946;
  color: white;
  font-size: 0.8rem;
  font-weight: 600;
  text-transform: uppercase;
  padding: 4px 12px;
  border-radius: 4px;
  display: inline-block;
  margin-bottom: 12px;
  letter-spacing: 0.5px;
}

.news-details h1 {
  font-size: 2.5rem;
  margin: 10px 0 20px;
  line-height: 1.2;
  font-weight: 800;
  color: #222;
  font-family: 'Georgia', serif;
}

.news-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 24px;
}

.author-info {
  display: flex;
  align-items: center;
}

.author-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: #ddd;
  margin-right: 12px;
  display: inline-block;
}

.author-name {
  font-weight: 600;
  color: #555;
}

.news-stats {
  display: flex;
  gap: 16px;
  color: #777;
  font-size: 0.9rem;
}

.eye-icon {
  display: inline-block;
  width: 16px;
  height: 16px;
  background-color: #777;
  mask: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 4.5c-5 0-9.3 3-11 7.5 1.7 4.5 6 7.5 11 7.5s9.3-3 11-7.5c-1.7-4.5-6-7.5-11-7.5zm0 12.5c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z"/></svg>');
  vertical-align: middle;
  margin-right: 4px;
}

.content-wrapper {
  padding: 24px 32px;
}

.featured-image-container {
  position: relative;
  margin: 0 auto 24px;
  width: 100%;
  text-align: center;
  overflow: hidden;
  max-width: 800px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

.featured-image {
  width: 100%;
  height: auto;
  max-height: 450px;
  object-fit: contain;
  display: block;
  margin: 0 auto;
}

.image-credit {
  position: absolute;
  bottom: 8px;
  right: 8px;
  background-color: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 4px 8px;
  border-radius: 2px;
  font-size: 0.75rem;
}

.article-summary {
  margin: 24px 0;
  padding: 16px 24px;
  background-color: #f9f9f9;
  border-left: 4px solid #e63946;
  font-size: 1.1rem;
  line-height: 1.6;
  font-weight: 500;
  font-style: italic;
}

.article-body {
  font-size: 1.1rem;
  line-height: 1.8;
  color: #333;
  margin-bottom: 32px;
}

.body-text {
  margin-bottom: 16px;
}

.share-tools {
  display: flex;
  gap: 12px;
  margin-top: 32px;
  border-top: 1px solid #eee;
  padding-top: 24px;
}

.share-btn {
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  font-weight: 600;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s ease;
}

.share-btn.facebook {
  background-color: #3b5998;
  color: white;
}

.share-btn.twitter {
  background-color: #1da1f2;
  color: white;
}

.share-btn.whatsapp {
  background-color: #25D366;
  color: white;
}

.related-news {
  padding: 24px 32px;
  border-top: 1px solid #eee;
  background-color: #f9f9f9;
}

.related-news h3 {
  font-size: 1.4rem;
  margin-bottom: 16px;
  color: #222;
  font-weight: 700;
}

.related-news-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
}

.loading-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 64px 0;
  color: #666;
}

.loading-spinner {
  width: 40px;
  height: 40px;
  border: 4px solid #f3f3f3;
  border-top: 4px solid #e63946;
  border-radius: 50%;
  animation: spin 1s linear infinite;
  margin-bottom: 16px;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Media queries para responsividad */
@media (max-width: 768px) {
  .news-details h1 {
    font-size: 1.8rem;
  }
  
  .news-header, .content-wrapper, .related-news {
    padding: 16px;
  }
  
  .news-meta {
    flex-direction: column;
    align-items: flex-start;
    gap: 12px;
  }
  
  .featured-image-container {
    margin: 0 -16px 20px;
    width: calc(100% + 32px);
    border-radius: 0;
  }
  
  .featured-image {
    max-height: 300px;
  }
  
  .related-news-grid {
    grid-template-columns: 1fr;
  }
}
</style>