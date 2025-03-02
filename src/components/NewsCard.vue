<template>
  <div class="news-card">
    <h2>{{ news.title }}</h2>
    <p>{{ news.description }}</p>
    <p><strong>Views:</strong> {{ news.views }}</p>
    <p><strong>Category:</strong> {{ news.categoryName }}</p>
    <p><strong>Name:</strong> {{ news.writer_name }}</p>
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
  border: 1px solid #ccc;
  padding: 1rem;
  margin: 1rem 0;
  border-radius: 8px;
  background-color: #fff;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transition: transform 0.2s, box-shadow 0.2s;
  max-width: 400px; /* Specific width */
  font-family: inherit; /* Maintain font type */
}

.news-card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.news-card h2 {
  font-size: 1.5rem;
  margin-bottom: 0.5rem;
}

.news-card p {
  margin: 0.5rem 0;
}
</style>
