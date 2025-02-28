<template>
  <div class="news-card">
    <h2>{{ news.title }}</h2>
    <p>{{ news.description }}</p>
    <p><strong>Views:</strong> {{ news.views }}</p>
    <p><strong>Category:</strong> {{ news.categoryName }}</p>
    <p><strong>Matricula:</strong> {{ news.matricula }}</p>
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
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.news-card h2 {
  font-size: 1.5rem;
  margin-bottom: 0.5rem;
}

.news-card p {
  margin: 0.5rem 0;
}
</style>
