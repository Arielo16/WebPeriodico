<template>
  <div class="home-topbar">
    <div class="menu">
      <router-link to="/" class="nav-link">Inicio</router-link>
      <router-link to="/about" class="nav-link">Acerca de</router-link>
      <router-link to="/contact" class="nav-link">Contacto</router-link>
    </div>
    
    <div class="logo">
      <span>WebPeriodico</span>
    </div>
    
    <div class="user-profile">
      <router-link to="/profile" class="nav-link">Perfil</router-link>
      <button @click="logout" class="nav-link">Cerrar Sesión</button>
    </div>
  </div>
</template>

<script>
import { authService } from '@/services/auth.service'

export default {
  name: 'HomeTopBar',
  methods: {
    logout() {
      authService.logout();
      this.$router.push('/login');
    }
  }
}
</script>

<style scoped>
.home-topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1rem 2rem;
  background-color: #333;
  color: #fff;

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

    &:hover {
      text-decoration: underline;
    }
  }
}
</style>
