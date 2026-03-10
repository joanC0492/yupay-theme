<?php
/*
  Template name: areas
*/
get_header(); ?>
<style>
  :root {
    --success: #10B981;
    --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
    --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.12);
    --shadow-lg: 0 16px 48px rgba(0, 0, 0, 0.16);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 20px;
    --radius-xl: 28px;
    --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }

  body {
    font-family: var(--font-body);
    background: var(--obsidian);
    color: var(--pearl);
    line-height: 1.7;
    overflow-x: hidden;
  }

  /* ============ HERO SECTION ============ */
  .hero-areas {
    position: relative;
    min-height: 60vh;
    display: flex;
    align-items: center;
    padding: 140px 0 80px;
    overflow: hidden;
  }

  .hero-areas::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse at 20% 30%, var(--primary-glow) 0%, transparent 50%),
      radial-gradient(ellipse at 80% 70%, rgba(201, 169, 98, 0.1) 0%, transparent 50%);
    pointer-events: none;
  }

  .hero-areas .container {
    display: block;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 2;
    width: auto;
  }

  .hero-areas-content {
    max-width: 900px;
  }

  .breadcrumb {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
    font-size: 0.875rem;
  }

  .breadcrumb a {
    color: var(--silver);
    text-decoration: none;
    transition: var(--transition);
  }

  .breadcrumb a:hover {
    color: var(--primary);
  }

  .breadcrumb span {
    color: var(--primary);
  }

  .hero-areas-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, rgba(7, 200, 204, 0.15), rgba(201, 169, 98, 0.1));
    border: 1px solid rgba(7, 200, 204, 0.3);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--primary);
    margin-bottom: 1.5rem;
  }

  .hero-areas-badge svg {
    width: 16px;
    height: 16px;
  }

  .hero-areas-title {
    font-family: var(--font-display);
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    color: var(--white);
    line-height: 1.1;
    margin-bottom: 1.5rem;
    letter-spacing: -0.03em;
  }

  .hero-areas-title strong {
    background: linear-gradient(135deg, var(--primary), var(--gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .hero-areas-description {
    font-size: 1.125rem;
    color: var(--silver);
    max-width: 600px;
    line-height: 1.8;
  }

  .hero-areas h4 {
    line-height: 1.7;
  }

  /* ============ STATS BAR ============ */
  .stats-bar {
    background: var(--charcoal);
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    padding: 2rem 0;
  }

  .stats-bar .container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
  }

  .stats-grid {
    /* display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem; */
    display: flex;
    justify-content: center;
  }

  .stats-grid>* {
    flex: 1;
  }

  .stat-item {
    text-align: center;
    max-width: 310px;
  }

  .stat-number {
    font-family: var(--font-display);
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary);
    line-height: 1;
    margin-bottom: 0.5rem;
  }

  .stat-label {
    font-size: 0.875rem;
    color: var(--silver);
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  /* ============ PROGRAMS SECTION ============ */
  .programs-section {
    padding: 80px 0;
  }

  .programs-section .container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
  }

  .section-header {
    margin-bottom: 3rem;
  }

  .section-title {
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 600;
    color: var(--white);
    margin-bottom: 1rem;
  }

  .section-description {
    color: var(--silver);
    max-width: 600px;
  }

  .programs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
    gap: 2rem;
  }

  .program-card {
    background: var(--charcoal);
    border-radius: var(--radius-lg);
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: var(--transition);
    text-decoration: none;
    display: flex;
    flex-direction: column;
  }

  .program-card:hover {
    transform: translateY(-8px);
    border-color: rgba(7, 200, 204, 0.3);
    box-shadow: var(--shadow-glow);
  }

  .program-image {
    position: relative;
    height: 200px;
    overflow: hidden;
  }

  .program-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
  }

  .program-card:hover .program-image img {
    transform: scale(1.08);
  }

  .program-badges {
    position: absolute;
    top: 1rem;
    left: 1rem;
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
  }

  .program-badge {
    background: rgba(10, 14, 23, 0.9);
    backdrop-filter: blur(10px);
    padding: 0.375rem 0.75rem;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  .badge-new {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
  }

  .badge-type {
    background: rgba(201, 169, 98, 0.9);
    color: var(--obsidian);
  }

  .program-content {
    padding: 1.4rem;
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  .program-title {
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--white);
    margin-bottom: 0.75rem;
    line-height: 1.3;
  }

  .program-description {
    color: var(--silver);
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    flex: 1;
  }

  .program-meta {
    display: flex;
    padding-top: 1rem;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    /* gap: 1.5rem; */
    gap: 0.7rem;
  }

  .meta-item {
    display: flex;
    align-items: center;
    /* gap: 0.5rem; */
    font-size: 0.7rem;
    color: var(--silver);
    gap: 0.3rem;
  }

  .meta-item svg {
    width: 16px;
    height: 16px;
    color: var(--primary);
  }

  .program-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 1.5rem;
    background: rgba(0, 0, 0, 0.2);
    border-top: 1px solid rgba(255, 255, 255, 0.05);
  }

  .program-price {
    font-family: var(--font-display);
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary);
  }

  .program-price span {
    font-size: 0.8rem;
    font-weight: 400;
    color: var(--silver);
    display: block;
  }

  .program-cta {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: transparent;
    border: 1px solid var(--primary);
    color: var(--primary);
    padding: 0.625rem 1.25rem;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 600;
    transition: var(--transition);
  }

  .program-card:hover .program-cta {
    background: var(--primary);
    color: var(--obsidian);
  }

  /* ============ PROGRAMS PAGINATION ============ */
  .programs-pagination-wrapper {
    margin-top: 3rem;
    display: flex;
    justify-content: center;
  }

  .programs-pagination .page-numbers {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    list-style: none;
    margin: 0;
    padding: 0;
    flex-wrap: wrap;
  }

  .programs-pagination .page-numbers li {
    margin: 0;
  }

  .programs-pagination .page-numbers a,
  .programs-pagination .page-numbers span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 44px;
    height: 44px;
    padding: 0 1rem;
    border-radius: var(--radius-sm);
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
    border: 1px solid rgba(255, 255, 255, 0.1);
    background: var(--charcoal);
    color: var(--pearl);
  }

  .programs-pagination .page-numbers a:hover {
    background: rgba(7, 200, 204, 0.15);
    border-color: rgba(7, 200, 204, 0.4);
    color: var(--primary);
  }

  .programs-pagination .page-numbers .current {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    border-color: var(--primary);
    color: var(--white);
    cursor: default;
  }

  .programs-pagination .page-numbers .prev,
  .programs-pagination .page-numbers .next {
    padding: 0 1.25rem;
  }

  .programs-pagination .page-numbers .dots {
    border: none;
    background: transparent;
    cursor: default;
  }

  /* ============ CTA SECTION ============ */
  .cta-section {
    padding: 80px 0;
    background: linear-gradient(135deg, var(--charcoal), var(--slate));
    position: relative;
    overflow: hidden;
  }

  .cta-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse at 30% 50%, var(--primary-glow) 0%, transparent 50%);
    pointer-events: none;
  }

  .cta-section .container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 2rem;
    text-align: center;
    position: relative;
    z-index: 2;
  }

  .cta-title {
    font-family: var(--font-display);
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 1rem;
  }

  .cta-description {
    color: var(--silver);
    font-size: 1.125rem;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
  }

  .cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
  }

  .btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-size: 0.95rem;
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
    cursor: pointer;
    border: none;
  }

  .btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    box-shadow: 0 4px 20px var(--primary-glow);
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px var(--primary-glow);
  }

  .btn-secondary {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.2);
    color: var(--white);
  }

  .btn-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.3);
  }

  /* ============ RESPONSIVE ============ */
  @media (max-width: 968px) {
    .stats-grid {
      /* grid-template-columns: repeat(2, 1fr); */
      flex-direction: column;
      gap: 1.5rem;
      align-items: center;
    }

    .programs-grid {
      grid-template-columns: 1fr 1fr;
    }
  }

  @media (max-width: 768px) {
    .header .container {
      padding: 0 1.25rem;
    }

    .menu-toggle {
      display: flex;
    }

    /* .nav-menu {
      position: fixed;
      top: 0;
      right: -100%;
      width: 280px;
      height: 100vh;
      background: var(--charcoal);
      flex-direction: column;
      padding: 5rem 2rem 2rem;
      gap: 1.5rem;
      transition: var(--transition);
      border-left: 1px solid rgba(255, 255, 255, 0.05);
    } */
    /* .nav-menu.active {
      right: 0;
    } */

    /* Dropdown Mobile */
    .nav-dropdown {
      position: static;
      transform: none;
      min-width: 100%;
      box-shadow: none;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 8px;
      margin-top: 0.5rem;
      max-height: 0;
      overflow: hidden;
      opacity: 1;
      visibility: visible;
      padding: 0;
    }

    .nav-menu>li.dropdown-open .nav-dropdown {
      max-height: 500px;
      padding: 0.5rem;
    }

    .nav-menu>li.dropdown-open .nav-dropdown-toggle svg {
      transform: rotate(180deg);
    }

    .nav-menu>li:hover .nav-dropdown {
      opacity: 1;
      visibility: visible;
      transform: none;
    }

    .nav-dropdown a {
      color: var(--pearl) !important;
    }

    .dropdown-icon svg {
      width: 14px;
      height: 14px;
    }

    .hero {
      padding: 120px 0 60px;
      min-height: auto;
    }

    .hero .container {
      padding: 0 1.25rem;
    }

    .hero-title {
      font-size: 2rem;
    }

    .stats-bar .container,
    .programs-section .container,
    .cta-section .container,
    .footer .container {
      padding: 0 1.25rem;
    }

    .stat-number {
      font-size: 2rem;
    }

    .cta-title {
      font-size: 1.75rem;
    }

    .footer-content {
      flex-direction: column;
      text-align: center;
    }

    .footer-links {
      flex-direction: column;
      gap: 1rem;
    }
  }

  @media (max-width: 767px) {
    .programs-grid {
      grid-template-columns: 1fr;
    }

    .programs-pagination .page-numbers a,
    .programs-pagination .page-numbers span {
      min-width: 40px;
      height: 40px;
      font-size: 0.85rem;
    }
  }

  @media (max-width: 480px) {
    .stats-grid {
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }

    .stat-number {
      font-size: 1.75rem;
    }

    .program-meta {
      flex-direction: column;
      gap: 0.75rem;
    }

    .program-footer {
      flex-direction: column;
      gap: 1rem;
      text-align: center;
    }

    .cta-buttons {
      flex-direction: column;
    }

    .btn {
      width: 100%;
      justify-content: center;
    }
  }

  /* ============ ANIMATIONS ============ */
  .fade-in {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
  }

  .fade-in.visible {
    opacity: 1;
    transform: translateY(0);
  }

  /*  */
  @media (max-width: 767px) {
    .hero-areas-beneficios {
      grid-template-columns: 1fr !important;
    }
  }
</style>

<?php
get_template_part('inc/ui/sections/areas/hero-areas');
get_template_part('inc/ui/sections/areas/stats-bar');
get_template_part('inc/ui/sections/areas/programs-section');
// get_template_part('inc/ui/sections/areas/cta');
get_footer();
