<template>
  <div class="news-card">
    <div class="news-image-container">
      <img v-if="news.images.length" :src="news.images[0]" alt="News Image" class="news-image" />
    </div>
    <div class="news-content">
      <h2>{{ news.title }}</h2>
      <p class="news-category"><strong>Category:</strong> {{ news.categoryID }}</p>
      <p>{{ news.description }}</p>
      <div class="news-card-footer">
        <p class="news-card-name"><strong>Name:</strong> {{ news.writer_name }}</p>
        <p class="news-card-views"><strong>Views:</strong> {{ news.views }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NewsCard',
  props: {
    news: {
      type: Object,
      required: true
    }
  }
}
</script>

<style scoped>
.news-card {
  width: 400px;
  background-color: #ffffff;
  border: 1px solid #ccc;
  border-radius: 20px;
  transition: all 0.3s;
  position: relative;
  z-index: 1;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.news-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
}

.news-image-container {
  width: 100%;
  height: 200px;
  overflow: hidden;
}

.news-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s;
}

.news-card:hover .news-image {
  transform: scale(1.1);
}

.news-content {
  padding: 1rem;
}

.news-card h2 {
  font-size: 1.5rem;
  margin-bottom: 0.5rem;
  color: #333;
}

.news-category {
  margin-bottom: 0.5rem;
  color: #666;
}

.news-card p {
  margin: 0.5rem 0;
  color: #555;
}

.news-card-footer {
  display: flex;
  justify-content: space-between;
  margin-top: 1rem;
}

.news-card-name, .news-card-views {
  color: #888;
  margin: 0;
}
</style>
