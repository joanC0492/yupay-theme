<?php get_header(); ?>
<style>
  .error404-hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 120px 2rem 60px;
    background: linear-gradient(135deg, var(--obsidian) 0%, var(--charcoal) 50%, var(--slate) 100%);
    position: relative;
    overflow: hidden;
  }

  .error404-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 80%;
    height: 150%;
    background: radial-gradient(circle, var(--primary-glow) 0%, transparent 60%);
    opacity: 0.4;
    pointer-events: none;
  }

  .error404-container {
    max-width: 700px;
    width: 100%;
    text-align: center;
    position: relative;
    z-index: 1;
  }

  /* Animaciones de entrada */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes pulse-error {

    0%,
    100% {
      transform: scale(1);
      box-shadow: 0 20px 60px rgba(239, 68, 68, 0.3);
    }

    50% {
      transform: scale(1.02);
      box-shadow: 0 22px 65px rgba(239, 68, 68, 0.35);
    }
  }

  @keyframes float {

    0%,
    100% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(-10px);
    }
  }

  .error404-icon {
    width: 100px;
    height: 100px;
    margin: 0 auto 2rem;
    background: linear-gradient(135deg, var(--error), #dc2626);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 20px 60px rgba(239, 68, 68, 0.3);
    animation: pulse-error 2s ease-in-out infinite, fadeInUp 0.6s var(--ease-premium);
  }

  .error404-icon svg {
    width: 50px;
    height: 50px;
    color: white;
  }

  .error404-number {
    font-family: var(--font-display);
    font-size: clamp(4rem, 12vw, 8rem);
    font-weight: 700;
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0 0 1rem;
    line-height: 1;
    animation: fadeInUp 0.6s var(--ease-premium) 0.1s both, float 3s ease-in-out infinite;
  }

  .error404-title {
    font-family: var(--font-display);
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 700;
    color: var(--white);
    margin: 0 0 1rem;
    line-height: 1.2;
    animation: fadeInUp 0.6s var(--ease-premium) 0.2s both;
  }

  .error404-subtitle {
    font-size: 1.125rem;
    color: var(--silver);
    margin: 0 0 2.5rem;
    line-height: 1.6;
    animation: fadeInUp 0.6s var(--ease-premium) 0.3s both;
  }

  .error404-card {
    background: var(--white);
    border-radius: 24px;
    padding: 2.5rem;
    box-shadow: var(--shadow-elevated);
    text-align: left;
    margin-bottom: 2rem;
    animation: fadeInUp 0.6s var(--ease-premium) 0.4s both;
  }

  .error404-card h3 {
    font-family: var(--font-display);
    font-size: 1.25rem;
    color: var(--charcoal);
    margin: 0 0 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .error404-card h3 svg {
    color: var(--primary);
    flex-shrink: 0;
  }

  .sugerencias-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    gap: 1rem;
  }

  .sugerencias-list li {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    background: var(--ivory);
    border-radius: 12px;
    transition: all 0.3s var(--ease-premium);
  }

  .sugerencias-list li:hover {
    background: rgba(7, 200, 204, 0.08);
    transform: translateX(4px);
  }

  .sugerencia-icon {
    width: 32px;
    height: 32px;
    min-width: 32px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
    font-weight: 700;
  }

  .sugerencia-icon svg {
    width: 18px;
    height: 18px;
  }

  .sugerencia-content h4 {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--charcoal);
    margin: 0 0 0.25rem;
  }

  .sugerencia-content p {
    font-size: 0.85rem;
    color: var(--gunmetal);
    margin: 0;
    line-height: 1.5;
  }

  .btn-inicio {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    width: 100%;
    padding: 1.25rem 2rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    text-decoration: none;
    border-radius: 14px;
    font-size: 1rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    box-shadow: 0 10px 40px var(--primary-glow);
    transition: all 0.3s var(--ease-premium);
    margin-bottom: 1rem;
    animation: fadeInUp 0.6s var(--ease-premium) 0.5s both;
  }

  .btn-inicio:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 50px rgba(7, 200, 204, 0.4);
  }

  .btn-inicio svg {
    width: 24px;
    height: 24px;
  }

  .btn-atras {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.875rem 1.5rem;
    background: transparent;
    color: var(--pearl);
    text-decoration: none;
    border: 2px solid var(--slate);
    border-radius: 10px;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.3s var(--ease-premium);
    animation: fadeInUp 0.6s var(--ease-premium) 0.6s both;
  }

  .btn-atras:hover {
    color: var(--white);
    border-color: var(--primary);
    background: rgba(7, 200, 204, 0.1);
  }

  .btn-atras svg {
    width: 18px;
    height: 18px;
  }

  .contacto-alternativo {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid var(--slate);
    text-align: center;
    animation: fadeInUp 0.6s var(--ease-premium) 0.7s both;
  }

  .contacto-alternativo p {
    color: var(--silver);
    font-size: 0.875rem;
    margin: 0 0 1rem;
  }

  .contacto-links {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
  }

  .contacto-links a {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--pearl);
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.2s;
  }

  .contacto-links a:hover {
    color: var(--primary);
  }

  .contacto-links svg {
    width: 18px;
    height: 18px;
  }

  @media (max-width: 1024px) {
    .error404-container {
      max-width: 600px;
    }
  }

  @media (max-width: 768px) {
    .error404-hero {
      padding: 100px 1.25rem 60px;
    }

    .error404-card {
      padding: 1.75rem;
    }

    .contacto-links {
      flex-direction: column;
      gap: 1rem;
    }
  }

  @media (max-width: 640px) {
    .error404-icon {
      width: 80px;
      height: 80px;
    }

    .error404-icon svg {
      width: 40px;
      height: 40px;
    }

    .error404-number {
      font-size: 3.5rem;
    }
  }
</style>

<section class="error404-hero">
  <div class="error404-container">
    <div class="error404-icon">
      <svg aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
      </svg>
    </div>

    <h1 class="error404-number">404</h1>
    <h2 class="error404-title">Página No Encontrada</h2>
    <p class="error404-subtitle">
      Lo sentimos, la página que buscas no existe o ha sido movida.
    </p>

    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-inicio">
      <svg aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
      </svg>
      Ir al Inicio
    </a>
  </div>
</section>

<?php get_footer(); ?>
