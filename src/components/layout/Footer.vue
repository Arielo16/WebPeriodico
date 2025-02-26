<template>
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-section">
        <h3>Nuestra Empresa</h3>
        <ul>
          <li><a href="#">Sobre Nosotros</a></li>
          <li><a href="#">Carreras</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
      
      <div class="footer-section">
        <h3>Recursos</h3>
        <ul>
          <li><a href="#">Documentación</a></li>
          <li><a href="#">Tutoriales</a></li>
          <li><a href="#">Guías</a></li>
        </ul>
      </div>
      
      <div class="footer-section">
        <h3>Legal</h3>
        <ul>
          <li><a href="#">Privacidad</a></li>
          <li><a href="#">Términos</a></li>
          <li><a href="#">Cookies</a></li>
        </ul>
      </div>
    </div>
    
    <div class="footer-bottom">
      <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'AppFooter'
}
</script>

<style lang="scss" scoped>
.footer {
  background-color: var(--bg-primary);
  color: var(--text-primary);
  padding: 4rem 2rem 2rem;
  
  .footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
    
    .footer-section {
      h3 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        color: var(--text-primary);
      }
      
      ul {
        list-style: none;
        padding: 0;
        
        li {
          margin-bottom: 0.5rem;
          
          a {
            color: var(--text-secondary);
            text-decoration: none;
            
            &:hover {
              color: var(--color-primary);
            }
          }
        }
      }
    }
  }
  
  .footer-bottom {
    text-align: center;
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid var(--border-color);
    
    p {
      color: var(--text-secondary);
    }
  }
}
</style> 