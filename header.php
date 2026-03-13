<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <!-- Google Tag Manager -->
  <script>(function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5N9DSV6');</script>
  <!-- End Google Tag Manager -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <?php wp_head(); ?>
  <title><?php echo wp_get_document_title(); ?></title>
  <style>
    /* ==========================================================================
      EDEX - Educación Ejecutiva UNW
      Premium Graduate School Design System
    ========================================================================== */
    :root {
      /* Brand Colors */
      --primary: #07C8CC;
      --primary-light: #5EEAED;
      --primary-dark: #059799;
      --primary-glow: rgba(7, 200, 204, 0.25);

      /* Sophisticated Neutrals */
      --obsidian: #0A0E17;
      --charcoal: #141B2D;
      --slate: #1E2A3D;
      --gunmetal: #2C3E50;
      --silver: #8B97A8;
      --pearl: #E8ECF1;
      --ivory: #F7F9FC;
      --white: #FFFFFF;

      --error: #EF4444;
      --success: #10B981;

      /* Accent Colors */
      --gold: #C9A962;
      --gold-light: #E4D4A8;

      --neon-cyan: #00F0FF;
      --neon-purple: #A855F7;
      --neon-green: #22D3EE;

      /* Typography */
      --font-display: 'Playfair Display', Georgia, serif;
      --font-body: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;

      /* Glassmorphism */
      --glass-bg: rgba(255, 255, 255, 0.05);
      --glass-border: rgba(255, 255, 255, 0.1);
      --glass-blur: blur(20px);

      /* Shadows & Effects */
      --shadow-soft: 0 4px 30px rgba(0, 0, 0, 0.08);
      --shadow-elevated: 0 20px 60px rgba(0, 0, 0, 0.12);
      --shadow-glow: 0 0 40px var(--primary-glow);

      /* Transitions */
      --ease-premium: cubic-bezier(0.23, 1, 0.32, 1);
      --duration-fast: 0.2s;
      --duration-base: 0.4s;
      --duration-slow: 0.8s;

      /*  */
      --radius-lg: 20px;
      --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);

      /* Fuentes */
      --font-mono: 'JetBrains Mono', 'Fira Code', monospace;
    }

    /* Reset */
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
      font-size: 16px;
    }

    body {
      font-family: var(--font-body);
      font-size: 1rem;
      line-height: 1.7;
      color: var(--charcoal);
      background-color: var(--ivory);
      -webkit-font-smoothing: antialiased;
      overflow-x: hidden;
    }

    img {
      max-width: 100%;
      height: auto;
      display: block;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    ul,
    ol {
      list-style: none;
    }

    button {
      font-family: inherit;
      cursor: pointer;
      border: none;
      background: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5 {
      font-family: var(--font-display);
      font-weight: 500;
      line-height: 1.2;
      letter-spacing: -0.02em;
    }

    .container {
      width: 100%;
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    /* ==========================================================================
           HEADER
           ========================================================================== */
    .header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      padding: 1.25rem 0;
      transition: all var(--duration-base) var(--ease-premium);
    }

    .header.scrolled {
      padding: 0.875rem 0;
      background: rgba(255, 255, 255, 0.97);
      backdrop-filter: var(--glass-blur);
      box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
    }

    .nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo img {
      height: 52px;
      width: auto;
    }

    .nav-menu {
      display: flex;
      align-items: center;
      gap: 2.5rem;
    }

    .nav-menu a {
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--white);
      letter-spacing: 0.02em;
      position: relative;
      padding: 0.5rem 0;
      transition: color var(--duration-fast);
    }

    .header.scrolled .nav-menu a {
      color: var(--charcoal);
    }

    .nav-menu a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--primary);
      transition: width var(--duration-base) var(--ease-premium);
    }

    .nav-menu a:hover::after {
      width: 100%;
    }

    /* Dropdown Styles */
    .nav-menu>li {
      position: relative;
    }

    .nav-dropdown-toggle {
      display: flex;
      align-items: center;
      gap: 0.4rem;
      cursor: pointer;
    }

    .nav-dropdown-toggle svg {
      width: 12px;
      height: 12px;
      transition: transform var(--duration-fast);
    }

    .nav-menu>li:hover .nav-dropdown-toggle svg {
      transform: rotate(180deg);
    }

    .nav-dropdown {
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%) translateY(10px);
      min-width: 280px;
      background: var(--white);
      border-radius: 12px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
      opacity: 0;
      visibility: hidden;
      transition: all var(--duration-fast) var(--ease-premium);
      padding: 0.75rem;
      z-index: 100;

      /* jcc */
      max-height: 450px;
      overflow-y: auto;
      scrollbar-width: thin;
    }

    .nav-dropdown::-webkit-scrollbar {
      width: 6px;
    }

    .nav-dropdown::-webkit-scrollbar-track {
      background: var(--glass-bg);
      border-radius: 10px;
    }

    .nav-dropdown::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
      border-radius: 10px;
      transition: all var(--duration-fast);
    }

    .nav-dropdown::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(180deg, var(--primary-light) 0%, var(--primary) 100%);
      box-shadow: 0 0 10px var(--primary-glow);
    }

    .nav-menu>li:hover .nav-dropdown {
      opacity: 1;
      visibility: visible;
      transform: translateX(-50%) translateY(0);
    }

    .dropdown-section {
      padding: 0.5rem 0;
    }

    .dropdown-section:not(:last-child) {
      border-bottom: 1px solid var(--pearl);
      margin-bottom: 0.5rem;
    }

    .dropdown-label {
      font-size: 0.65rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      color: var(--silver);
      padding: 0.5rem 1rem;
      display: block;
    }

    .nav-dropdown a {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      color: var(--charcoal) !important;
      font-size: 0.85rem;
      transition: all var(--duration-fast);
    }

    .nav-dropdown a:hover {
      background: var(--ivory);
      color: var(--primary) !important;
    }

    .nav-dropdown a::after {
      display: none;
    }

    .dropdown-icon {
      width: 36px;
      height: 36px;
      background: linear-gradient(135deg, var(--primary-glow), rgba(201, 169, 98, 0.1));
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .dropdown-icon svg {
      width: 18px;
      height: 18px;
      color: var(--primary);
    }

    .dropdown-content {
      flex: 1;
    }

    .dropdown-title {
      font-weight: 600;
      color: var(--charcoal);
      display: block;
      line-height: 1.3;
    }

    .dropdown-desc {
      font-size: 0.75rem;
      color: var(--silver);
      display: block;
    }

    .dropdown-badge {
      font-size: 0.6rem;
      font-weight: 700;
      text-transform: uppercase;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      padding: 0.2rem 0.5rem;
      border-radius: 4px;
      margin-left: auto;
    }

    .nav-toggle {
      display: none;
      flex-direction: column;
      gap: 5px;
      padding: 0.5rem;
    }

    .nav-toggle span {
      display: block;
      width: 24px;
      height: 2px;
      background: var(--white);
      transition: all var(--duration-fast);
    }

    .header.scrolled .nav-toggle span {
      background: var(--charcoal);
    }

    /*  */
    .header .logo-scroll {
      display: none;
    }

    .header.scrolled .logo-no-scroll {
      display: none !important;
    }

    .header.scrolled .logo-scroll {
      display: block;
      max-width: 168px;
    }

    /* ==========================================================================
           BUTTONS
           ========================================================================== */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.75rem;
      padding: 1rem 2rem;
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      border-radius: 4px;
      transition: all var(--duration-base) var(--ease-premium);
      position: relative;
      overflow: hidden;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      color: var(--white);
      box-shadow: 0 4px 20px var(--primary-glow);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 30px var(--primary-glow);
    }

    .btn-outline-light {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      color: var(--white);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .btn-outline-light:hover {
      background: var(--white);
      color: var(--charcoal);
    }

    .btn-lg {
      padding: 1.25rem 2.5rem;
      font-size: 0.85rem;
    }

    .btn-icon {
      width: 18px;
      height: 18px;
    }

    /* ==========================================================================
           HERO SECTION
           ========================================================================== */
    .hero {
      min-height: 100vh;
      display: flex;
      align-items: center;
      position: relative;
      background: linear-gradient(135deg, var(--obsidian) 0%, var(--charcoal) 50%, var(--slate) 100%);
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(ellipse 80% 50% at 20% 40%, var(--primary-glow) 0%, transparent 50%),
        radial-gradient(ellipse 60% 40% at 80% 60%, rgba(201, 169, 98, 0.08) 0%, transparent 50%);
    }

    .hero-grid {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
      background-size: 80px 80px;
      animation: gridMove 30s linear infinite;
    }

    @keyframes gridMove {
      0% {
        transform: translate(0, 0);
      }

      100% {
        transform: translate(80px, 80px);
      }
    }

    .hero .container {
      position: relative;
      z-index: 10;
      display: grid;
      grid-template-columns: 1.1fr 0.9fr;
      gap: 4rem;
      align-items: center;
      padding-top: 100px;
      padding-bottom: 80px;
    }

    .hero-content {
      color: var(--white);
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.625rem 1.25rem;
      background: var(--glass-bg);
      backdrop-filter: var(--glass-blur);
      border: 1px solid var(--glass-border);
      border-radius: 100px;
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--primary-light);
      margin-bottom: 1.75rem;
      font-family: var(--font-body);
    }

    .hero-badge::before {
      content: '';
      width: 8px;
      height: 8px;
      background: var(--primary);
      border-radius: 50%;
      animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 1;
        transform: scale(1);
      }

      50% {
        opacity: 0.5;
        transform: scale(1.3);
      }
    }

    .hero-title {
      font-size: clamp(2.25rem, 4.5vw, 3.5rem);
      font-weight: 400;
      color: var(--white);
      margin-bottom: 1.5rem;
      line-height: 1.15;
    }

    .hero-title strong {
      display: block;
      font-weight: 600;
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-description {
      font-size: 1.0625rem;
      color: var(--silver);
      margin-bottom: 2.5rem;
      max-width: 520px;
      line-height: 1.8;
    }

    .hero-cta {
      display: flex;
      gap: 1rem;
      margin-bottom: 3.5rem;
    }

    /* Hero Programs Highlights */
    .hero-programs {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      padding-top: 2rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .hero-program-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem 1.25rem;
      background: var(--glass-bg);
      backdrop-filter: blur(10px);
      border: 1px solid var(--glass-border);
      border-radius: 12px;
      transition: all var(--duration-base) var(--ease-premium);
      cursor: pointer;
    }

    .hero-program-item:hover {
      background: rgba(7, 200, 204, 0.1);
      border-color: var(--primary);
      transform: translateX(8px);
    }

    .program-icon {
      width: 44px;
      height: 44px;
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .program-icon svg {
      width: 22px;
      height: 22px;
      color: var(--white);
    }

    .program-item-content h4 {
      font-family: var(--font-body);
      font-size: 0.8rem;
      font-weight: 600;
      color: var(--white);
      margin-bottom: 0.25rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .program-item-content p {
      font-size: 0.8rem;
      color: var(--silver);
      line-height: 1.4;
    }

    /* Hero Visual */
    .hero-visual {
      position: relative;
      display: flex;
      justify-content: center;
    }

    .hero-visual--mobile {
      display: none;
    }

    .hero-visual--desktop {}

    @media (max-width: 1200px) {
      .hero-visual--desktop {
        display: none;
      }

      .hero-visual--mobile {
        display: flex;
      }
    }

    .hero-image-container {
      position: relative;
      width: 100%;
      max-width: 480px;
    }

    .hero-image-wrapper {
      position: relative;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: var(--shadow-elevated);
    }

    .hero-image-wrapper::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, transparent 50%, rgba(10, 14, 23, 0.9) 100%);
      z-index: 2;
    }

    .hero-image-wrapper img {
      width: 100%;
      height: 580px;
      object-fit: cover;
      object-position: top center;
    }

    @media (max-width: 767px) {
      .hero-image-wrapper img {
        height: 280px;
        max-height: 270px;
      }
    }

    .hero-float-card {
      position: absolute;
      background: var(--glass-bg);
      backdrop-filter: var(--glass-blur);
      border: 1px solid var(--glass-border);
      border-radius: 16px;
      padding: 1.25rem;
      color: var(--white);
      z-index: 20;
      animation: float 6s ease-in-out infinite;
    }

    .hero-float-card.card-1 {
      top: 15%;
      left: -15%;
      animation-delay: 0s;
    }

    .hero-float-card.card-2 {
      bottom: 25%;
      right: -10%;
      animation-delay: -2s;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-12px);
      }
    }

    .float-card-number {
      font-family: var(--font-display);
      font-size: 2.25rem;
      font-weight: 500;
      color: var(--primary);
      line-height: 1;
    }

    .float-card-label {
      font-size: 0.75rem;
      color: var(--silver);
      text-transform: uppercase;
      letter-spacing: 0.1em;
      margin-top: 0.25rem;
    }

    /* ==========================================================================
           SECTIONS BASE
           ========================================================================== */
    .section {
      padding: 6rem 0;
    }

    .section-header {
      text-align: center;
      max-width: 700px;
      margin: 0 auto 4rem;
    }

    .section-label {
      display: inline-block;
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--primary);
      margin-bottom: 1rem;
    }

    .section-title {
      font-size: clamp(1.875rem, 3.5vw, 2.75rem);
      color: var(--charcoal);
      margin-bottom: 1rem;
    }

    .section-subtitle {
      font-size: 1.0625rem;
      color: var(--silver);
      line-height: 1.7;
    }

    /* ==========================================================================
           DOCENTES SECTION (Carrusel)
           ========================================================================== */
    .docentes {
      background: var(--white);
      overflow: hidden;
    }

    .docentes-slider-container {
      position: relative;
      width: 100%;
      overflow: hidden;
    }

    .docentes-slider {
      display: flex;
      gap: 1.5rem;
      animation: slideDocentes 40s linear infinite;
    }

    @keyframes slideDocentes {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }

    .docente-card {
      flex-shrink: 0;
      width: 280px;
      background: var(--ivory);
      border-radius: 16px;
      overflow: hidden;
      transition: all var(--duration-base) var(--ease-premium);
    }

    .docente-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-elevated);
    }

    .docente-image {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .docente-info {
      padding: 1.5rem;
    }

    .docente-name {
      font-family: var(--font-display);
      font-size: 1.125rem;
      font-weight: 500;
      color: var(--charcoal);
      margin-bottom: 0.5rem;
    }

    .docente-bio {
      font-size: 0.85rem;
      color: var(--silver);
      line-height: 1.6;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    /* ==========================================================================
           AREAS TEMATICAS
           ========================================================================== */
    .areas {
      background: linear-gradient(180deg, var(--ivory) 0%, var(--white) 100%);
    }

    .areas-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1.25rem;
    }

    .area-card {
      position: relative;
      height: 320px;
      border-radius: 16px;
      overflow: hidden;
      cursor: pointer;
    }

    .area-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform var(--duration-slow) var(--ease-premium);
    }

    .area-card:hover img {
      transform: scale(1.08);
    }

    .area-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, transparent 40%, rgba(10, 14, 23, 0.95) 100%);
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 1.5rem;
      transition: background var(--duration-base);
    }

    .area-card:hover .area-overlay {
      background: linear-gradient(180deg, rgba(7, 200, 204, 0.15) 0%, rgba(10, 14, 23, 0.98) 100%);
    }

    .area-icon {
      width: 48px;
      height: 48px;
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1rem;
      opacity: 0;
      transform: translateY(20px);
      transition: all var(--duration-base) var(--ease-premium);
    }

    .area-card:hover .area-icon {
      opacity: 1;
      transform: translateY(0);
    }

    .area-icon svg,
    .area-icon .svg {
      width: 24px;
      height: 24px;
      color: var(--white);
    }

    .area-name {
      font-family: var(--font-display);
      font-size: 1.25rem;
      font-weight: 500;
      color: var(--white);
      margin-bottom: 0.5rem;
      line-height: 1.3;
    }

    .area-arrow {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.75rem;
      font-weight: 600;
      color: var(--primary);
      text-transform: uppercase;
      letter-spacing: 0.1em;
      opacity: 0;
      transform: translateX(-10px);
      transition: all var(--duration-base) var(--ease-premium);
    }

    .area-card:hover .area-arrow {
      opacity: 1;
      transform: translateX(0);
    }

    .area-arrow svg {
      width: 16px;
      height: 16px;
    }

    /* ==========================================================================
           BENEFITS SECTION
           ========================================================================== */
    .benefits {
      background: var(--charcoal);
      position: relative;
      overflow: hidden;
    }

    .benefits::before {
      content: '';
      position: absolute;
      top: -30%;
      right: -10%;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, var(--primary-glow) 0%, transparent 70%);
    }

    .benefits .section-header {
      color: var(--white);
    }

    .benefits .section-title {
      color: var(--white);
    }

    .benefits-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2rem;
      position: relative;
      z-index: 10;
    }

    .benefit-card {
      padding: 2.5rem 2rem;
      background: var(--glass-bg);
      backdrop-filter: var(--glass-blur);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      text-align: center;
      transition: all var(--duration-base) var(--ease-premium);
    }

    .benefit-card:hover {
      transform: translateY(-5px);
      border-color: var(--primary);
      box-shadow: var(--shadow-glow);
    }

    .benefit-icon {
      width: 72px;
      height: 72px;
      margin: 0 auto 1.5rem;
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      border-radius: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 30px var(--primary-glow);
      margin: 0;
    }

    .benefit-icon svg,
    .benefit-icon .svg {
      width: 28px;
      height: 28px;
      color: var(--white);
    }

    .benefit-card h3 {
      font-family: var(--font-body);
      font-size: 1.125rem;
      font-weight: 600;
      color: var(--white);
      margin-bottom: 0.75rem;
    }

    .benefit-card p {
      font-size: 0.9rem;
      color: var(--silver);
      line-height: 1.7;
    }

    /* ==========================================================================
           CTA SECTION
           ========================================================================== */
    .cta-section {
      padding: 6rem 0;
      background: var(--ivory);
      text-align: center;
    }

    .cta-content {
      max-width: 650px;
      margin: 0 auto;
    }

    .cta-section .section-title {
      margin-bottom: 1.25rem;
    }

    .cta-section p {
      font-size: 1.0625rem;
      color: var(--silver);
      margin-bottom: 2rem;
    }

    /* ==========================================================================
           FOOTER
           ========================================================================== */
    .footer {
      position: relative;
      z-index: 10;
      background: var(--obsidian);
      color: var(--white);
      padding: 4rem 0 1.5rem;
    }

    .footer-main {
      display: grid;
      grid-template-columns: 1.5fr 1fr 1fr 1fr;
      gap: 3rem;
      margin-bottom: 3rem;
      padding-bottom: 3rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .footer-brand p {
      color: var(--silver);
      font-size: 0.9rem;
      line-height: 1.7;
      margin-top: 1.25rem;
      max-width: 280px;
    }

    .footer-logo {
      height: 48px;
      filter: brightness(0) invert(1);
    }

    .footer h4 {
      font-family: var(--font-body);
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--primary);
      margin-bottom: 1.25rem;
    }

    .footer-links li {
      margin-bottom: 0.625rem;
    }

    .footer-links a {
      color: var(--silver);
      font-size: 0.875rem;
      transition: color var(--duration-fast);
    }

    .footer-links a:hover {
      color: var(--primary);
    }

    .footer-contact p {
      color: var(--silver);
      font-size: 0.875rem;
      margin-bottom: 0.375rem;
    }

    .footer-contact strong {
      color: var(--white);
    }

    .social-links {
      display: flex;
      gap: 0.75rem;
      margin-top: 1.25rem;
    }

    .social-links a {
      width: 40px;
      height: 40px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all var(--duration-fast);
    }

    .social-links a:hover {
      background: var(--primary);
      border-color: var(--primary);
    }

    .social-links svg,
    .social-links .svg {
      width: 16px;
      height: 16px;
      color: var(--white);
    }

    .footer-bottom {
      text-align: center;
    }

    .footer-bottom p {
      color: var(--silver);
      font-size: 0.8rem;
    }

    /* ==========================================================================
           WHATSAPP FLOAT
           ========================================================================== */
    .whatsapp-float {
      position: fixed;
      bottom: 1.5rem;
      right: 1.5rem;
      z-index: 1000;
    }

    .whatsapp-btn {
      display: flex;
      align-items: center;
      gap: 0.625rem;
      padding: 0.875rem 1.25rem;
      background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
      color: var(--white);
      border-radius: 100px;
      font-size: 0.8rem;
      font-weight: 600;
      box-shadow: 0 6px 25px rgba(37, 211, 102, 0.35);
      transition: all var(--duration-base) var(--ease-premium);
    }

    .whatsapp-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 35px rgba(37, 211, 102, 0.45);
    }

    .whatsapp-btn svg {
      width: 20px;
      height: 20px;
    }

    /* ==========================================================================
           RESPONSIVE
           ========================================================================== */
    @media (max-width: 1200px) {
      .hero .container {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 3rem;
      }

      .hero-content {
        order: 2;
      }

      .hero-visual {
        order: 1;
      }

      .hero-description {
        margin: 0 auto 2.5rem;
      }

      .hero-cta {
        justify-content: center;
      }

      .hero-programs {
        max-width: 500px;
        margin: 0 auto;
      }

      .hero-float-card {
        display: none;
      }

      .areas-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 968px) {
      .nav-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--white);
        flex-direction: column;
        padding: 1.5rem;
        gap: 1rem;
        box-shadow: var(--shadow-elevated);
      }

      .nav-menu.active {
        display: flex;
      }

      .nav-menu a {
        color: var(--charcoal) !important;
      }

      .nav-toggle {
        display: flex;
      }

      /* Dropdown Mobile */
      .nav-dropdown {
        position: static;
        transform: none;
        min-width: 100%;
        box-shadow: none;
        background: var(--ivory);
        border-radius: 8px;
        margin-top: 0.5rem;
        max-height: 0;
        overflow: hidden;
        opacity: 1;
        visibility: visible;
        padding: 0;
        transition: max-height var(--duration-base), padding var(--duration-base);
      }

      .nav-menu>li.dropdown-open .nav-dropdown {
        max-height: 500px;
        padding: 0.5rem;
      }

      .nav-dropdown-toggle {
        justify-content: center;
      }

      .nav-dropdown-toggle svg {
        transition: transform var(--duration-fast);
      }

      .nav-menu>li.dropdown-open .nav-dropdown-toggle svg {
        transform: rotate(180deg);
      }

      .nav-menu>li:hover .nav-dropdown {
        opacity: 1;
        visibility: visible;
        transform: none;
      }

      .dropdown-icon {
        width: 32px;
        height: 32px;
      }

      .dropdown-icon svg {
        width: 14px;
        height: 14px;
      }

      .benefits-grid {
        grid-template-columns: 1fr;
      }

      .footer-main {
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
      }
    }

    @media (max-width: 768px) {

      .container {
        padding: 0 1.25rem;
      }

      .hero .container {
        padding-top: 30px;
        padding-bottom: 50px;
      }

      .section {
        padding: 3.5rem 0;
      }

      .section-title {
        font-size: 1.75rem;
      }

      .hero {
        padding: 100px 0 60px;
      }

      .hero-title {
        font-size: 1.75rem;
        line-height: 1.25;
      }

      .hero-badge {
        font-size: 0.6rem;
        padding: 0.5rem 1rem;
      }

      .hero-description {
        font-size: 0.95rem;
      }

      .hero-cta {
        flex-direction: column;
        gap: 0.75rem;
      }

      .hero-cta .btn {
        width: 100%;
        justify-content: center;
      }

      .hero-programs {
        gap: 0.75rem;
      }

      .hero-program-item {
        padding: 1rem;
      }

      .program-icon {
        width: 44px;
        height: 44px;
      }

      .areas-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }

      .area-card {
        height: 240px;
      }

      .area-card h3 {
        font-size: 1.125rem;
      }

      .area-count {
        font-size: 0.7rem;
      }

      /* Docentes Slider Mobile */
      .docentes-slider {
        padding: 0 1rem;
      }

      .docente-card {
        min-width: 200px;
      }

      /* .docente-image {
        width: 100px;
        height: 100px;
      } */

      .docente-card h3 {
        font-size: 1rem;
      }

      .docente-card p {
        font-size: 0.75rem;
      }

      .slider-nav {
        display: none;
      }

      .benefits {
        padding: 3.5rem 0;
      }

      .benefits-grid {
        gap: 1rem;
      }

      .benefit-card {
        padding: 1.75rem 1.25rem;
      }

      .benefit-icon {
        width: 56px;
        height: 56px;
      }

      .benefit-icon svg,
      .benefit-icon .svg {
        width: 24px;
        height: 24px;
      }

      .cta-section {
        padding: 3.5rem 0;
      }

      .cta-section .section-title {
        font-size: 1.5rem;
      }

      .footer {
        padding: 3rem 0 1.25rem;
      }

      .footer-main {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 2rem;
      }

      .footer-brand p {
        max-width: 100%;
        margin: 1rem auto 0;
      }

      .footer-logo {
        margin: 0 auto;
      }

      .social-links {
        justify-content: center;
      }

      .whatsapp-btn span {
        display: none;
      }

      .whatsapp-btn {
        padding: 0.875rem;
        border-radius: 50%;
      }
    }

    @media (max-width: 767px) {
      .hero {
        padding-bottom: 0;
      }

      /* .hero .container {
        padding-top: 30px;
        padding-bottom: 50px;
      } */

      .docente-image {
        margin-inline: auto;
      }

      /* .dropdown-section:not(:last-child) {
        height: 270px;
        overflow: auto;
      } */
      #header .nav-dropdown {
        height: 270px;
        overflow: auto;
      }


      .docente-image {
        height: 200px;
      }

      .docente-card {
        width: 172px;
      }
    }

    /* Extra small devices */
    @media (max-width: 480px) {
      .container {
        padding: 0 1rem;
      }

      .hero-title {
        font-size: 1.5rem;
      }

      .hero-program-item {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
      }

      .program-icon {
        margin: 0 auto;
      }

      .section-title {
        font-size: 1.5rem;
      }

      .area-card {
        height: 200px;
      }

      .docente-card {
        min-width: 180px;
        /* padding: 1.25rem; */
      }

      /* .docente-image {
        width: 80px;
        height: 80px;
      } */

      .btn {
        padding: 0.875rem 1.5rem;
        font-size: 0.75rem;
      }
    }

    .program-ver-evento {
      font-size: 12px;
      margin-left: auto;
      font-family: var(--font-body);
    }

    @media (max-width: 768px) {
      .program-ver-evento {
        margin-left: 0;
      }
    }

    @media (min-width: 768px) {
      .program-ver-evento {
        min-width: 85px;
      }

    }
  </style>
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5N9DSV6" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <!-- Header -->
  <?php
  $logo_header = get_field('global_logo_header', 'option');
  $logo_header_scroll = get_field('global_logo_header_scroll', 'option'); ?>

  <header class="header" id="header">
    <div class="container">
      <nav class="nav">
        <a href="<?= home_url(); ?>" class="logo">
          <?php if (!empty($logo_header) && !empty($logo_header['url'])): ?>
            <img src="<?= esc_url($logo_header['url']); ?>" alt="<?= esc_attr($logo_header['alt']); ?>"
              class="logo-no-scroll">
          <?php endif; ?>
          <?php if (!empty($logo_header_scroll) && !empty($logo_header_scroll['url'])): ?>
            <img src="<?= esc_url($logo_header_scroll['url']); ?>" alt="<?= esc_attr($logo_header_scroll['alt']); ?>"
              class="logo-scroll">
          <?php endif; ?>
        </a>
        <!--  -->
        <?php
        wp_nav_menu([
          'theme_location' => 'header-menu',
          'container' => false,
          'fallback_cb' => '__return_false',
          'items_wrap' => '<ul class="nav-menu" id="navMenu">%3$s</ul>',
          'walker' => new Client_Header_MegaMenu_Walker(),
        ]); ?>

        <?php
        class Client_Header_MegaMenu_Walker extends Walker_Nav_Menu
        {
          private string $current_group = '';
          private bool $section_open = false;

          private function open_section(string &$output, string $group): void
          {
            $label = ($group === 'programas')
              ? 'Programas Destacados'
              : 'Áreas de Conocimiento';

            $output .= '<div class="dropdown-section">';
            $output .= '<span class="dropdown-label">' . esc_html($label) . '</span>';
            $this->section_open = true;
            $this->current_group = $group;
          }

          private function close_section(string &$output): void
          {
            if ($this->section_open) {
              $output .= '</div>';
              $this->section_open = false;
            }
          }

          public function start_lvl(&$output, $depth = 0, $args = null): void
          {
            // Solo nivel 1 (los hijos de "Programas")
            if ($depth === 0) {
              $this->current_group = '';
              $this->section_open = false;
              $output .= '<div class="nav-dropdown">';
            }
          }

          public function end_lvl(&$output, $depth = 0, $args = null): void
          {
            if ($depth === 0) {
              $this->close_section($output);

              // Obtener el total de programas disponibles (excluyendo los que están próximamente)
              $programas_query = new WP_Query(array(
                'post_type' => 'programa',
                'posts_per_page' => -1,
                'meta_query' => array(
                  'relation' => 'OR',
                  array(
                    'key' => 'programas_proximamente',
                    'compare' => 'NOT EXISTS'
                  ),
                  array(
                    'key' => 'programas_proximamente',
                    'value' => '1',
                    'compare' => '!='
                  )
                )
              ));
              $total_programas = $programas_query->found_posts;
              wp_reset_postdata();

              // Obtener el total de áreas de especialización
              $total_areas = wp_count_terms(array(
                'taxonomy' => 'areas',
                'hide_empty' => false
              ));
              if (is_wp_error($total_areas)) {
                $total_areas = 0;
              }

              // Sección estática final
              $output .= '<div class="dropdown-section">';
              $output .= '<span class="dropdown-label">' . $total_programas . ' Programas Disponibles</span>';
              $output .= '<a href="' . esc_url(home_url('#areas')) . '">';
              $output .= '<div class="dropdown-icon">';
              $output .= '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
              $output .= '<rect x="3" y="3" width="7" height="7"></rect>';
              $output .= '<rect x="14" y="3" width="7" height="7"></rect>';
              $output .= '<rect x="14" y="14" width="7" height="7"></rect>';
              $output .= '<rect x="3" y="14" width="7" height="7"></rect>';
              $output .= '</svg>';
              $output .= '</div>';
              $output .= '<div class="dropdown-content">';
              $output .= '<span class="dropdown-title">Ver todos los programas</span>';
              $output .= '<span class="dropdown-desc">' . $total_areas . ' áreas de especialización</span>';
              $output .= '</div>';
              $output .= '<span class="dropdown-badge">' . $total_programas . '</span>';
              $output .= '</a>';
              $output .= '</div>';

              $output .= '</div>'; // .nav-dropdown
            }
          }

          public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0): void
          {
            $has_children = !empty($args->walker->has_children);

            // ===== NIVEL 0 (top items del header)
            if ($depth === 0) {
              $output .= '<li class="li-' . mb_strtolower($item->title) . '">';

              // Si tiene hijos, queremos el toggle con tu clase + caret SVG
              if ($has_children) {
                $output .= '<a href="' . esc_url($item->url ?: '#') . '" class="nav-dropdown-toggle">';
                $output .= esc_html($item->title);
                $output .= '
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M6 9l6 6 6-6" />
          </svg>
        ';
                $output .= '</a>';

                return; // el dropdown se abre en start_lvl()
              }

              // Item normal
              $output .= '<a href="' . esc_url($item->url) . '">';
              $output .= esc_html($item->title);
              $output .= '</a>';

              return;
            }

            // ===== NIVEL 1 (links dentro del mega menú)
            if ($depth === 1) {
              // Agrupación:
              // - Si el tipo/label del item en WP es "Programa" => Programas Destacados
              // - Si es "Área" o "Enlace personalizado" => Áreas de Conocimiento
              // En tu captura se ve exactamente eso (Área / Programa / Enlace personalizado).
              $type_label = isset($item->type_label) ? (string) $item->type_label : '';
              $group = (stripos($type_label, 'Programa') !== false) ? 'programas' : 'areas';

              // Abrir sección si cambió el grupo
              if ($group !== $this->current_group) {
                $this->close_section($output);
                $this->open_section($output, $group);
              } elseif (!$this->section_open) {
                $this->open_section($output, $group);
              }

              // ACF fields (menu item)
              $icon = function_exists('get_field') ? get_field('menu_header_icono', $item) : null;
              $desc = function_exists('get_field') ? get_field('menu_header_descripcion', $item) : '';
              $badge = function_exists('get_field') ? get_field('menu_header_etiqueta', $item) : '';

              // Icon HTML
              $icon_html = '';
              if (is_array($icon) && !empty($icon['url'])) {
                $icon_html = '<img src="' . esc_url($icon['url']) . '" alt="" loading="lazy">';
              } elseif (is_numeric($icon)) {
                $url = wp_get_attachment_url((int) $icon);
                if ($url) {
                  $icon_html = '<img src="' . esc_url($url) . '" alt="" loading="lazy">';
                }
              }

              // Link del item (sin <li>, igualito a tu maqueta)
              $output .= '<a href="' . esc_url($item->url) . '">';

              $output .= '<div class="dropdown-icon">' . $icon_html . '</div>';

              $output .= '<div class="dropdown-content">';
              $output .= '<span class="dropdown-title">' . esc_html($item->title) . '</span>';
              if (!empty($desc)) {
                $output .= '<span class="dropdown-desc">' . esc_html($desc) . '</span>';
              }
              $output .= '</div>';

              if (!empty($badge)) {
                $output .= '<span class="dropdown-badge">' . esc_html($badge) . '</span>';
              }

              $output .= '</a>';
            }
          }

          public function end_el(&$output, $item, $depth = 0, $args = null): void
          {
            // Cerrar <li> solo para nivel 0
            if ($depth === 0) {
              $output .= '</li>';
            }
          }
        } ?>
        <button class="nav-toggle" id="navToggle" aria-label="Menú">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </nav>
    </div>
  </header>
