<template>
  <div class="login-container">
    <div class="login-content">
      <div class="login-header">
        <h1>Bienvenido de nuevo</h1>
        <p class="subtitle">Tu fuente confiable de noticias te espera</p>
      </div>

      <div class="form-container">
        <form @submit.prevent="handleLogin" class="login-form">
          <div v-if="error" class="error-message">
            {{ error }}
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
            <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
          </div>

          <BaseButton 
            type="submit" 
            variant="primary" 
            class="login-button"
            :disabled="loading"
          >
            {{ loading ? 'Iniciando sesión...' : 'Iniciar Sesión' }}
          </BaseButton>
        </form>

        <div class="social-login">
          <p>O continúa con</p>
          <div class="social-buttons">
            <button class="social-button google">
              <i class="fab fa-google"></i>
              Google
            </button>
            <button class="social-button facebook">
              <i class="fab fa-facebook"></i>
              Facebook
            </button>
          </div>
        </div>

        <div class="register-prompt">
          <p>¿Aún no tienes una cuenta?</p>
          <div class="benefits">
            <div class="benefit-item">
              <i class="fas fa-check-circle"></i>
              <span>30 días de prueba gratis</span>
            </div>
            <div class="benefit-item">
              <i class="fas fa-check-circle"></i>
              <span>Cancela en cualquier momento</span>
            </div>
          </div>
          <BaseButton 
            variant="secondary" 
            class="register-button"
            @click="$router.push('/register')"
          >
            Crear cuenta
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
  name: 'LoginPage',
  components: {
    BaseButton
  },
  data() {
    return {
      email: '',
      password: '',
      showPassword: false,
      loading: false,
      error: null,
      remember: false
    }
  },
  methods: {
    async handleLogin() {
      try {
        this.loading = true;
        this.error = null;
        
        const credentials = {
          email: this.email,
          password: this.password,
          remember: this.remember
        };

        await authService.login(credentials);
        
        // Si el login es exitoso, redirigimos
        this.$router.push('/dashboard');
      } catch (error) {
        console.error('Error de login:', error);
        this.error = error.response?.data?.message || 
                    'Error al iniciar sesión. Por favor, verifica tus credenciales.';
      } finally {
        this.loading = false;
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: var(--bg-primary);

  .login-content {
    padding: 4rem;
    width: 100%;
    max-width: 600px;

    .login-header {
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

        .forgot-password {
          display: block;
          text-align: right;
          margin-top: 0.5rem;
          color: var(--color-primary);
          text-decoration: none;
          font-size: 0.9rem;

          &:hover {
            text-decoration: underline;
          }
        }
      }

      .login-button {
        width: 100%;
        padding: 1rem;
        font-size: 1.1rem;
        margin-bottom: 2rem;
      }

      .social-login {
        text-align: center;
        margin-bottom: 2rem;

        p {
          color: var(--text-secondary);
          margin-bottom: 1rem;
          position: relative;

          &::before,
          &::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background: var(--border-color);
          }

          &::before { left: 0; }
          &::after { right: 0; }
        }

        .social-buttons {
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 1rem;

          .social-button {
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            background: var(--bg-primary);
            color: var(--text-primary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background-color 0.3s ease;

            &:hover {
              background: var(--bg-secondary);
            }

            i {
              font-size: 1.2rem;
            }
          }
        }
      }

      .register-prompt {
        text-align: center;
        padding-top: 2rem;
        border-top: 1px solid var(--border-color);

        p {
          color: var(--text-secondary);
          margin-bottom: 1rem;
        }

        .benefits {
          margin: 1.5rem 0;

          .benefit-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            color: var(--text-secondary);

            i {
              color: var(--color-success);
            }
          }
        }

        .register-button {
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
  .login-container .login-content {
    padding: 2rem;
  }
}
</style> 