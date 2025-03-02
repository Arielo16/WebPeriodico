<template>
  <div class="news-card">
    <h2>{{ news.title }}</h2>
    <p class="news-category"><strong>Category:</strong> {{ news.categoryID }}</p> <!-- Agrega el campo Category -->
    <p>{{ news.description }}</p>
    <div class="news-card-footer">
      <p class="news-card-name"><strong>Name:</strong> {{ news.writer_name }}</p>
      <p class="news-card-views"><strong>Views:</strong> {{ news.views }}</p>
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
  width: 400px; /* Ajusta el ancho */
  height: 400px; /* Ajusta la altura para que sea cuadrada */
  background-color: #ffffff; /* Color de fondo blanco */
  border: 1px solid #ccc; /* Borde gris claro */
  border-radius: 20px;
  transition: all 0.3s;
  position: relative; /* Asegura que la animación esté al frente */
  z-index: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between; /* Asegura que el contenido esté distribuido */
  padding: 1rem;
}

.news-card:hover {
  transform: translateY(-35px); /* Eleva el cuadro */
  box-shadow: 0px 0px 30px 1px rgba(0, 0, 0, 0.916); /* Sombra más oscura */
  z-index: 10; /* Trae la tarjeta al frente al pasar el ratón */
}

.news-card h2 {
  font-size: 1.5rem;
  margin-bottom: 0.1rem; /* Reduce el margen inferior */
  color: #000; /* Color de texto negro */
}

.news-category {
  margin-bottom: 0 rem; /* Reduce el margen inferior */
  color: #000; /* Color de texto negro */
}

.news-card p {
  margin: 0.5rem 0;
  color: #000; /* Color de texto negro */
}

.news-card-footer {
  display: flex;
  justify-content: space-between;
}

.news-card-name, .news-card-views {
  color: #000; /* Color de texto negro */
  margin: 0;
}
</style>
