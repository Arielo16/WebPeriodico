<template>
  <div class="topbar">
    <div class="logo">
      <!-- Temporalmente comentamos la imagen hasta que tengas una -->
      <!-- <img src="@/assets/images/logo.png" alt="Logo" /> -->
      <span>Logo</span>
    </div>
    
    <nav class="nav-links">
      <router-link to="/" class="nav-link">Inicio</router-link>
      <router-link to="/home" class="nav-link">Dashboard</router-link>
      <router-link to="/about" class="nav-link">Acerca de</router-link>
      <router-link to="/contact" class="nav-link">Contacto</router-link>
    </nav>
    
    <div class="auth-buttons">
      <BaseButton variant="secondary" @click="$router.push('/login')">
        Iniciar Sesión
      </BaseButton>
      <BaseButton variant="primary" @click="$router.push('/register')">
        Registrarse
      </BaseButton>
    </div>
  </div>
</template>

<script>
import BaseButton from '@/components/common/BaseButton.vue'

export default {
  name: 'TopBar',
  components: {
    BaseButton
  }
}
</script>

<style lang="scss" scoped>
.topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  
  .logo {
    color: var(--text-primary);
    img {
      height: 40px;
    }
  }
  
  .nav-links {
    display: flex;
    gap: 2rem;
    
    .nav-link {
      color: var(--text-primary);
      text-decoration: none;
      
      &:hover {
        color: var(--color-primary);
      }
    }
  }
  
  .auth-buttons {
    display: flex;
    gap: 1rem;
  }
}
</style> 