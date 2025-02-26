<template>
  <div class="feature-card">
    <div class="icon-wrapper">
      <i :class="icon"></i>
    </div>
    <h3>{{ title }}</h3>
    <p>{{ description }}</p>
  </div>
</template>

<script>
export default {
  name: 'FeatureCard',
  props: {
    icon: {
      type: String,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    }
  }
}
</script>

<style lang="scss" scoped>
.feature-card {
  background: var(--bg-primary);
  border-radius: 12px;
  padding: 2rem;
  text-align: center;
  transition: transform 0.3s ease;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  
  &:hover {
    transform: translateY(-5px);
  }

  .icon-wrapper {
    width: 64px;
    height: 64px;
    margin: 0 auto 1.5rem;
    background: var(--color-accent);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    
    i {
      font-size: 2rem;
      color: var(--color-white);
    }
  }

  h3 {
    font-size: 1.5rem;
    color: var(--color-primary);
    margin-bottom: 1rem;
    font-family: 'Times New Roman', serif;
  }

  p {
    color: var(--text-secondary);
    line-height: 1.6;
  }
}
</style> 