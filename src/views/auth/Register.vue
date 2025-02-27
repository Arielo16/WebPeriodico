<template>
  <div class="register-container">
    <div class="register-content">
      <div class="register-header">
        <h1>Crea tu cuenta</h1>
        <p class="subtitle">Únete a nuestra comunidad de noticias</p>
      </div>

      <div class="form-container">
        <form @submit.prevent="handleRegister" class="register-form">
          <div v-if="error" class="error-message">
            {{ error }}
          </div>
          <div class="form-group">
            <label for="name">Nombre</label>
            <input 
              type="text" 
              id="name" 
              v-model="name"
              placeholder="Tu nombre"
              required
            >
          </div>

          <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input 
              type="email" 
              id="email" 
              v-model="email"
              placeholder="tu@email.com"
              required
            >
          </div>

          <div class="form-group">
            <label for="password">Contraseña</label>
            <div class="password-input">
              <input 
                :type="showPassword ? 'text' : 'password'" 
                id="password" 
                v-model="password"
                placeholder="••••••••"
                required
              >
              <button 
                type="button" 
                class="toggle-password"
                @click="showPassword = !showPassword"
              >
                <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
              </button>
            </div>
          </div>

          <BaseButton 
            type="submit" 
            variant="primary" 
            class="register-button"
            :disabled="loading"
          >
            {{ loading ? 'Registrando...' : 'Registrarse' }}
          </BaseButton>
        </form>

        <div class="login-prompt">
          <p>¿Ya tienes una cuenta?</p>
          <BaseButton 
            variant="secondary" 
            class="login-button"
            @click="$router.push('/login')"
          >
            Iniciar sesión
          </BaseButton>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import BaseButton from '@/components/common/BaseButton.vue'
import { authService } from '@/services/auth.service'

export default {
  name: 'RegisterPage',
  components: {
    BaseButton
  },
  data() {
    return {
      name: '',
      email: '',
      password: '',
      showPassword: false,
      loading: false,
      error: null
    }
  },
  methods: {
    async handleRegister() {
      try {
        this.loading = true;
        this.error = null;
        
        const userData = {
          name: this.name,
          email: this.email,
          password: this.password
        };

        await authService.register(userData);
        
        // Si el registro es exitoso, redirigimos
        this.$router.push('/login');
      } catch (error) {
        console.error('Error de registro:', error);
        this.error = error.response?.data?.message || 
                    'Error al registrar. Por favor, verifica tus datos.';
      } finally {
        this.loading = false;
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.register-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: var(--bg-primary);

  .register-content {
    padding: 4rem;
    width: 100%;
    max-width: 600px;

    .register-header {
      text-align: center;
      margin-bottom: 3rem;

      h1 {
        font-size: 2.5rem;
        color: var(--color-primary);
        font-family: 'Times New Roman', serif;
        margin-bottom: 1rem;
      }

      .subtitle {
        font-size: 1.2rem;
        color: var(--text-secondary);
        font-style: italic;
      }
    }

    .form-container {
      max-width: 400px;
      margin: 0 auto;
      width: 100%;

      .form-group {
        margin-bottom: 1.5rem;

        label {
          display: block;
          margin-bottom: 0.5rem;
          color: var(--text-primary);
          font-weight: 500;
        }

        input {
          width: 100%;
          padding: 0.75rem;
          border: 1px solid var(--border-color);
          border-radius: 4px;
          font-size: 1rem;
          transition: border-color 0.3s ease;

          &:focus {
            outline: none;
            border-color: var(--color-primary);
          }
        }

        .password-input {
          position: relative;

          .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
          }
        }
      }

      .register-button {
        width: 100%;
        padding: 1rem;
        font-size: 1.1rem;
        margin-bottom: 2rem;
      }

      .login-prompt {
        text-align: center;
        padding-top: 2rem;
        border-top: 1px solid var(--border-color);

        p {
          color: var(--text-secondary);
          margin-bottom: 1rem;
        }

        .login-button {
          width: 100%;
        }
      }

      .error-message {
        background-color: var(--color-danger);
        color: white;
        padding: 1rem;
        border-radius: 4px;
        margin-bottom: 1rem;
        text-align: center;
      }
    }
  }
}

@media (max-width: 640px) {
  .register-container .register-content {
    padding: 2rem;
  }
}
</style>
