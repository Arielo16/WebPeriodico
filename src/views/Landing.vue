<template>
  <div class="bg-surface-0 dark:bg-surface-900">
    <div id="home" class="landing-wrapper overflow-hidden">
      <TopBar class="py-6 px-6 mx-0 md:mx-12 lg:mx-20 lg:px-20 flex items-center justify-between relative lg:static" />
      
      <div class="hero-section">
        <h1>DataPress</h1>
        <p class="subtitle">Tu fuente confiable de noticias las 24 horas</p>
        
        <div class="features-grid">
          <FeatureCard
            icon="fas fa-newspaper"
            title="Noticias al Instante"
            description="Mantente informado con las últimas noticias actualizadas en tiempo real, 24/7."
          />
          <FeatureCard
            icon="fas fa-chart-bar"
            title="Análisis Profundo"
            description="Reportajes especiales y análisis detallados de expertos en cada tema."
          />
          <FeatureCard
            icon="fas fa-earth-americas"
            title="Cobertura Global"
            description="Noticias locales e internacionales con corresponsales en todo el mundo."
          />
          <FeatureCard
            icon="fas fa-mobile-screen-button"
            title="Acceso Multiplataforma"
            description="Lee tus noticias favoritas en cualquier dispositivo, en cualquier momento."
          />
        </div>

        <div class="subscription-section">
          <div class="pricing-card">
            <h2>Plan Premium</h2>
            <div class="price">
              <span class="amount">$9.99</span>
              <span class="period">/mes</span>
            </div>
            <ul class="features-list">
              <li>
                <i class="fas fa-check-circle"></i>
                Acceso ilimitado a todo el contenido
              </li>
              <li>
                <i class="fas fa-check-circle"></i>
                Reportajes exclusivos
              </li>
              <li>
                <i class="fas fa-check-circle"></i>
                Newsletter personalizada
              </li>
              <li>
                <i class="fas fa-check-circle"></i>
                Sin publicidad
              </li>
              <li>
                <i class="fas fa-check-circle"></i>
                Acceso a archivo histórico
              </li>
            </ul>
            <BaseButton variant="primary" class="subscribe-button">
              Prueba 1 mes GRATIS
            </BaseButton>
            <p class="guarantee">Cancela en cualquier momento</p>
          </div>
        </div>

        <div class="testimonials-section">
          <h2>Lo que dicen nuestros lectores</h2>
          <div class="testimonials-grid">
            <div class="testimonial-card">
              <div class="quote">"</div>
              <p>La calidad del periodismo y la profundidad de los análisis son excepcionales.</p>
              <div class="author">
                <img src="https://placehold.co/50x50/png" alt="Avatar" class="avatar">
                <div class="author-info">
                  <strong>Carlos Rodríguez</strong>
                  <span>Suscriptor desde 2022</span>
                </div>
              </div>
            </div>
            <div class="testimonial-card">
              <div class="quote">"</div>
              <p>Las noticias siempre están actualizadas y la app es muy fácil de usar.</p>
              <div class="author">
                <img src="https://placehold.co/50x50/png" alt="Avatar" class="avatar">
                <div class="author-info">
                  <strong>Ana García</strong>
                  <span>Suscriptora desde 2023</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TopBar from '@/components/layout/TopBar.vue'
import BaseButton from '@/components/common/BaseButton.vue'
import FeatureCard from '@/components/common/FeatureCard.vue'

export default {
  name: 'LandingPage',
  components: {
    TopBar,
    BaseButton,
    FeatureCard
  }
}
</script>

<style lang="scss" scoped>
.landing-wrapper {
  .hero-section {
    padding: 4rem 2rem;
    text-align: center;
    background: linear-gradient(to bottom, var(--bg-primary), var(--bg-secondary));
    
    h1 {
      font-size: 4rem;
      margin-bottom: 0.5rem;
      color: var(--color-primary);
      font-family: 'Times New Roman', serif;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }
    
    .subtitle {
      font-size: 1.8rem;
      color: var(--text-secondary);
      margin-bottom: 4rem;
      font-style: italic;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto 4rem;
      padding: 0 1rem;
    }

    .subscription-section {
      max-width: 400px;
      margin: 0 auto 4rem;
      
      .pricing-card {
        background: var(--bg-primary);
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);

        h2 {
          font-size: 2rem;
          color: var(--color-primary);
          margin-bottom: 1rem;
        }

        .price {
          margin-bottom: 2rem;
          
          .amount {
            font-size: 3rem;
            color: var(--color-primary);
            font-weight: bold;
          }

          .period {
            color: var(--text-secondary);
          }
        }

        .features-list {
          text-align: left;
          margin-bottom: 2rem;
          
          li {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            color: var(--text-secondary);

            i {
              color: var(--color-success);
            }
          }
        }

        .subscribe-button {
          width: 100%;
          padding: 1rem;
          font-size: 1.2rem;
          margin-bottom: 1rem;
        }

        .guarantee {
          color: var(--text-secondary);
          font-size: 0.9rem;
        }
      }
    }

    .testimonials-section {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;

      h2 {
        font-size: 2.5rem;
        color: var(--color-primary);
        margin-bottom: 3rem;
      }

      .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;

        .testimonial-card {
          background: var(--bg-primary);
          border-radius: 12px;
          padding: 2rem;
          position: relative;
          text-align: left;
          box-shadow: 0 4px 6px rgba(0,0,0,0.1);

          .quote {
            position: absolute;
            top: -1rem;
            left: 2rem;
            font-size: 4rem;
            color: var(--color-accent);
            opacity: 0.3;
          }

          p {
            font-style: italic;
            margin-bottom: 2rem;
            color: var(--text-secondary);
            line-height: 1.6;
          }

          .author {
            display: flex;
            align-items: center;
            gap: 1rem;

            .avatar {
              width: 50px;
              height: 50px;
              border-radius: 50%;
            }

            .author-info {
              strong {
                display: block;
                color: var(--color-primary);
              }

              span {
                font-size: 0.9rem;
                color: var(--text-secondary);
              }
            }
          }
        }
      }
    }
  }
}

@media (max-width: 768px) {
  .landing-wrapper .hero-section {
    padding: 2rem 1rem;

    h1 {
      font-size: 2.5rem;
    }

    .subtitle {
      font-size: 1.2rem;
    }

    .features-grid {
      grid-template-columns: 1fr;
    }
  }
}
</style> 