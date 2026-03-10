<?php
/*
  Template name: programas
*/
get_header(); ?>
<style>
  :root {
    --success: #10B981;
  }

  /* Hero */
  .program-hero {
    padding: 140px 0 80px;
    background: linear-gradient(135deg, var(--obsidian), var(--charcoal), var(--slate));
    position: relative;
    /* overflow: hidden; */
  }

  .program-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 80% 50% at 20% 40%, var(--primary-glow), transparent 50%), radial-gradient(ellipse 60% 40% at 80% 60%, rgba(201, 169, 98, 0.08), transparent 50%);
  }

  .program-hero-grid {
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
    background-size: 80px 80px;
  }

  .program-hero .container {
    position: relative;
    z-index: 10;
  }

  .hero-content {
    max-width: 800px;
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
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
    margin-bottom: 1.5rem;
  }

  .hero-area {
    color: var(--gold);
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 0.75rem;
    letter-spacing: 0.05em;
  }

  .hero-title {
    font-size: clamp(2rem, 4vw, 3rem);
    color: var(--white);
    margin-bottom: 1.5rem;
    line-height: 1.15;
  }

  .hero-title strong {
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .hero-start {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: var(--white);
    font-size: 1.125rem;
    margin-bottom: 2rem;
  }

  .hero-start-icon {
    width: 48px;
    height: 48px;
    background: var(--primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .hero-start-icon svg {
    width: 20px;
    height: 20px;
    color: var(--white);
  }

  .hero-start span {
    font-weight: 600;
  }

  .hero-start small {
    display: block;
    color: var(--silver);
    font-size: 0.8rem;
    font-weight: 400;
  }

  /* Info Cards */
  .info-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-top: 2.5rem;
  }

  .info-card {
    padding: 1.5rem;
    background: var(--glass-bg);
    backdrop-filter: var(--glass-blur);
    border: 1px solid var(--glass-border);
    border-radius: 16px;
    text-align: center;
  }

  .info-card-icon {
    width: 44px;
    height: 44px;
    margin: 0 auto 1rem;
    background: rgba(7, 200, 204, 0.15);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .info-card-icon svg {
    width: 22px;
    height: 22px;
    color: var(--primary);
  }

  .info-card-label {
    font-size: 0.7rem;
    color: var(--silver);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 0.25rem;
  }

  .info-card-value {
    font-size: 1rem;
    color: var(--white);
    font-weight: 600;
  }

  /* Price Card */
  .price-card {
    /* grid-column: span 2; */
    grid-column: span 1;
    background: linear-gradient(135deg, var(--primary-dark), var(--primary));
    padding: 1.5rem 2rem;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .price-info h4 {
    color: var(--white);
    font-family: var(--font-body);
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 0.25rem;
    opacity: 0.9;
  }

  .price-amount {
    font-size: 2rem;
    color: var(--white);
    font-weight: 700;
  }

  .price-amount small {
    font-size: 1rem;
    font-weight: 400;
  }

  .price-installments {
    color: rgba(255, 255, 255, 0.85);
    font-size: 0.85rem;
  }

  .btn-cta {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    background: var(--white);
    color: var(--primary-dark);
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    border-radius: 8px;
    transition: all 0.3s;
  }

  .btn-cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  }

  /* Main Content */
  .program-content {
    padding: 5rem 0;
  }

  .content-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 4rem;
  }

  /* Sections */
  .content-section {
    margin-bottom: 4rem;
  }

  .section-title {
    font-size: 1.75rem;
    color: var(--charcoal);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .section-title::before {
    content: '';
    width: 4px;
    height: 28px;
    background: var(--primary);
    border-radius: 2px;
  }

  .section-text {
    color: var(--gunmetal);
    font-size: 1rem;
    line-height: 1.8;
  }

  .section-text p {
    margin-bottom: 1rem;
  }

  .read-more-btn {
    color: var(--primary);
    font-weight: 600;
    font-size: 0.875rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 0.5rem;
  }

  .read-more-btn svg {
    width: 16px;
    height: 16px;
    transition: transform 0.3s;
  }

  .read-more-btn.expanded svg {
    transform: rotate(180deg);
  }

  .expandable-content {
    max-height: 200px;
    overflow: hidden;
    transition: max-height 0.5s ease;
  }

  .expandable-content.expanded {
    max-height: 2000px;
  }

  /* Benefits List */
  .benefits-list {
    display: grid;
    gap: 1rem;
    max-width: 848px;
  }


  .benefit-item {
    display: flex;
    gap: 1rem;
    padding: 1.25rem;
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s;
  }

  .benefit-item:hover {
    transform: translateX(5px);
    box-shadow: var(--shadow-elevated);
  }

  .benefit-icon {
    width: 44px;
    height: 44px;
    min-width: 44px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-inline: 0 !important;
  }

  .benefit-icon svg {
    width: 20px;
    height: 20px;
    color: var(--white);
  }

  .benefit-item p {
    color: var(--gunmetal);
    font-size: 0.9rem;
    line-height: 1.6;
  }

  /* Target Audience */
  .audience-card {
    padding: 2rem;
    background: linear-gradient(135deg, var(--charcoal), var(--obsidian));
    border-radius: 20px;
    color: var(--white);
  }

  .audience-card h3 {
    font-size: 1.25rem;
    margin-bottom: 1rem;
    color: var(--white);
  }

  .audience-card p {
    color: var(--silver);
    font-size: 0.95rem;
    line-height: 1.7;
  }

  /* Skills */
  .skills-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }

  .skill-item {
    padding: 1.25rem;
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow-soft);
    border-left: 3px solid var(--primary);
  }

  .skill-item p {
    color: var(--gunmetal);
    font-size: 0.9rem;
    line-height: 1.6;
  }

  /* Competencies */
  .competencies-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
  }

  .competency-tag {
    padding: 0.75rem 1.25rem;
    background: var(--primary);
    color: var(--white);
    font-size: 0.8rem;
    font-weight: 600;
    border-radius: 100px;
  }

  /* Courses Accordion */
  .courses-accordion {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .course-item {
    background: var(--white);
    border-radius: 16px;
    box-shadow: var(--shadow-soft);
    overflow: hidden;
  }

  .course-header {
    padding: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    transition: background 0.3s;
  }

  .course-header:hover {
    background: var(--ivory);
  }

  .course-number {
    width: 40px;
    height: 40px;
    background: var(--primary);
    color: var(--white);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.9rem;
    margin-right: 1rem;
  }

  .course-title-wrap {
    flex: 1;
  }

  .course-title {
    font-family: var(--font-body);
    font-size: 1rem;
    font-weight: 600;
    color: var(--charcoal);
    margin-bottom: 0.25rem;
  }

  .course-meta {
    display: flex;
    gap: 1rem;
    font-size: 0.8rem;
    color: var(--silver);
  }

  .course-toggle {
    width: 32px;
    height: 32px;
    background: var(--pearl);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
  }

  .course-toggle svg {
    width: 16px;
    height: 16px;
    color: var(--gunmetal);
    transition: transform 0.3s;
  }

  .course-item.active .course-toggle {
    background: var(--primary);
  }

  .course-item.active .course-toggle svg {
    color: var(--white);
    transform: rotate(180deg);
  }

  .course-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease;
  }

  .course-item.active .course-content {
    max-height: 1000px;
  }

  .course-body {
    padding: 0 1.5rem 1.5rem;
    border-top: 1px solid var(--pearl);
  }

  .course-description {
    color: var(--gunmetal);
    font-size: 0.9rem;
    margin: 1rem 0;
    line-height: 1.7;
  }

  .course-body h5,
  .course-topics h5 {
    font-family: var(--font-body);
    font-size: 0.8rem;
    color: var(--charcoal);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 0.75rem;
  }

  .course-body ul,
  .course-topics ul {
    display: grid;
    gap: 0.5rem;
  }

  .course-body li,
  .course-topics li {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    color: var(--gunmetal);
    font-size: 0.875rem;
  }

  .course-body li::before,
  .course-topics li::before {
    content: '';
    width: 6px;
    height: 6px;
    min-width: 6px;
    background: var(--primary);
    border-radius: 50%;
    margin-top: 0.5rem;
  }

  .course-docente {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--pearl);
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .course-docente img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
  }

  .course-docente span {
    font-size: 0.85rem;
    color: var(--silver);
  }

  .course-docente strong {
    color: var(--charcoal);
  }

  /* Project Card */
  .project-card {
    background: linear-gradient(135deg, var(--gold), #B8963F);
    padding: 2rem;
    border-radius: 20px;
    color: var(--obsidian);
  }

  .project-card h4 {
    font-size: 1.125rem;
    margin-bottom: 0.5rem;
  }

  .project-card .project-label {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    opacity: 0.7;
    margin-bottom: 0.5rem;
  }

  .project-card p {
    font-size: 0.9rem;
    line-height: 1.7;
    opacity: 0.9;
  }

  /* Sidebar */
  .sidebar {
    position: sticky;
    top: 100px;
  }

  .sidebar-card {
    background: var(--white);
    border-radius: 20px;
    box-shadow: var(--shadow-elevated);
    overflow: hidden;
    margin-bottom: 1.5rem;
  }

  .sidebar-header {
    padding: 1.5rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    text-align: center;
  }

  .sidebar-header h3 {
    font-size: 1.125rem;
    margin-bottom: 0.25rem;
  }

  .sidebar-header p {
    font-size: 0.85rem;
    opacity: 0.9;
  }

  .sidebar-body {
    padding: 1.5rem;
  }

  .sidebar-price {
    text-align: center;
    margin-bottom: 1.5rem;
  }

  .sidebar-price .amount {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--charcoal);
  }

  .sidebar-price .amount small {
    font-size: 1rem;
    font-weight: 400;
    color: var(--silver);
  }

  .sidebar-price .installments {
    font-size: 0.85rem;
    color: var(--silver);
    margin-top: 0.25rem;
  }

  .sidebar-benefit {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem;
    background: rgba(7, 200, 204, 0.08);
    border-radius: 8px;
    margin-bottom: 1rem;
  }

  .sidebar-benefit svg {
    width: 20px;
    height: 20px;
    color: var(--primary);
  }

  .sidebar-benefit span {
    font-size: 0.85rem;
    color: var(--charcoal);
  }

  .btn-primary {
    display: block;
    width: 100%;
    padding: 1rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    text-align: center;
    border-radius: 10px;
    transition: all 0.3s;
    margin-bottom: 0.75rem;
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--primary-glow);
  }

  .btn-outline {
    display: block;
    width: 100%;
    padding: 1rem;
    background: transparent;
    color: var(--charcoal);
    font-size: 0.85rem;
    font-weight: 600;
    text-align: center;
    border: 2px solid var(--pearl);
    border-radius: 10px;
    transition: all 0.3s;
  }

  .btn-outline:hover {
    border-color: var(--primary);
    color: var(--primary);
  }

  .btn-outline--requisito {
    background-color: white;
  }

  /* Docente Card */
  .docente-card-programa {
    background: var(--white);
    border-radius: 20px;
    box-shadow: var(--shadow-soft);
    overflow: hidden;
  }

  .docente-header {
    padding: 1.5rem;
    background: var(--charcoal);
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .docente-image {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--primary);
    /*  */
    min-width: 80px;
    min-height: 80px;
  }

  .docente-info h4 {
    color: var(--white);
    font-family: var(--font-body);
    font-size: 1rem;
    font-weight: 600;
  }

  .docente-info p {
    color: var(--silver);
    font-size: 0.8rem;
  }

  .docente-body {
    padding: 1.5rem;
  }

  .docente-body p {
    color: var(--gunmetal);
    font-size: 0.875rem;
    line-height: 1.7;
  }

  .docente-linkedin {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 1rem;
    color: var(--primary);
    font-size: 0.85rem;
    font-weight: 600;
  }

  .docente-linkedin svg {
    width: 18px;
    height: 18px;
  }

  /* Certification */
  .certification-section {
    position: relative;
    z-index: 10;
    padding: 5rem 0;
    background: var(--charcoal);
  }

  .certification-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
  }

  .cert-card {
    padding: 2rem;
    background: var(--glass-bg);
    backdrop-filter: var(--glass-blur);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    text-align: center;
  }

  .cert-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 1.25rem;
    background: linear-gradient(135deg, var(--gold), #B8963F);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .cert-icon svg {
    width: 28px;
    height: 28px;
    color: var(--obsidian);
  }

  .cert-card h4 {
    color: var(--white);
    font-size: 1rem;
    margin-bottom: 0.5rem;
  }

  .cert-card p {
    color: var(--silver);
    font-size: 0.875rem;
    line-height: 1.6;
  }

  /* Requirements Popup */
  .popup-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.7);
    z-index: 2000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
  }

  .popup-overlay.active {
    opacity: 1;
    visibility: visible;
  }

  .popup-content {
    background: var(--white);
    border-radius: 20px;
    max-width: 500px;
    width: 100%;
    max-height: 80vh;
    overflow-y: auto;
    transform: translateY(20px);
    transition: transform 0.3s;
  }

  .popup-overlay.active .popup-content {
    transform: translateY(0);
  }

  .popup-header {
    padding: 1.5rem;
    background: var(--charcoal);
    color: var(--white);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .popup-header h3 {
    font-size: 1.125rem;
  }

  .popup-close {
    width: 32px;
    height: 32px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }

  .popup-close svg {
    width: 18px;
    height: 18px;
    color: var(--white);
  }

  .popup-body {
    padding: 1.5rem;
  }

  .popup-body ul {
    display: grid;
    gap: 0.75rem;
  }

  .popup-body li {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    color: var(--gunmetal);
    font-size: 0.9rem;
  }

  .popup-body li svg {
    width: 20px;
    height: 20px;
    min-width: 20px;
    color: var(--primary);
    margin-top: 2px;
  }

  /* Footer */
  .footer {
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
    transition: color 0.2s;
  }

  .footer-links a:hover {
    color: var(--primary);
  }

  .footer-bottom {
    text-align: center;
  }

  .footer-bottom p {
    color: var(--silver);
    font-size: 0.8rem;
  }

  /* WhatsApp */
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
    background: linear-gradient(135deg, #25D366, #128C7E);
    color: var(--white);
    border-radius: 100px;
    font-size: 0.8rem;
    font-weight: 600;
    box-shadow: 0 6px 25px rgba(37, 211, 102, 0.35);
    transition: all 0.3s;
  }

  .whatsapp-btn:hover {
    transform: translateY(-3px);
  }

  .whatsapp-btn svg {
    width: 20px;
    height: 20px;
  }

  /* Responsive */
  @media (max-width: 1200px) {
    .content-grid {
      grid-template-columns: 1fr;
    }

    .sidebar {
      position: relative;
      top: 0;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1.5rem;
    }

    .price-card {
      grid-column: span 2;
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

    .dropdown-icon {
      width: 32px;
      height: 32px;
    }

    .dropdown-icon svg {
      width: 14px;
      height: 14px;
    }

    .nav-toggle {
      display: flex;
    }

    .info-cards {
      grid-template-columns: repeat(2, 1fr);
    }

    .price-card {
      grid-column: span 2;
      flex-direction: column;
      text-align: center;
      gap: 1rem;
    }

    .skills-grid {
      grid-template-columns: 1fr;
    }

    .certification-grid {
      grid-template-columns: 1fr;
    }

    .sidebar {
      grid-template-columns: 1fr;
    }

    .footer-main {
      grid-template-columns: 1fr 1fr;
    }
  }

  @media (max-width: 768px) {
    .container {
      padding: 0 1.25rem;
    }

    .program-hero {
      padding: 120px 0 60px;
    }

    .hero-title {
      font-size: 1.75rem;
    }

    .info-cards {
      /* grid-template-columns: 1fr; */
      grid-template-columns: repeat(3, 1fr);
      gap: 0.75rem;
    }

    .info-card {
      /* padding: 0.5rem; */
      padding: 1rem 0.5rem;
    }

    .info-card-value {
      font-size: 13px;
      line-height: 1.5;
    }

    .info-card-label {
      font-size: 10px;
    }

    .info-card-icon {
      width: 42px;
      height: 42px;
      margin-bottom: .75rem;
    }

    .info-card-icon img {
      width: 22px;
      object-fit: contain;
    }

    .price-card {
      grid-column: span 1;
    }

    .program-content {
      padding: 3rem 0;
    }

    .content-section {
      margin-bottom: 3rem;
    }

    .section-title {
      font-size: 1.375rem;
    }

    .footer-main {
      grid-template-columns: 1fr;
      text-align: center;
    }

    .footer-logo {
      margin: 0 auto;
    }

    .whatsapp-btn span {
      display: none;
    }

    .whatsapp-btn {
      padding: 0.875rem;
      border-radius: 50%;
    }
  }

  @media (min-width: 768px) {
    .price-card--mobile {
      display: none !important;
    }
  }

  @media (max-width: 767px) {
    .price-card--desktop {
      display: none !important;
    }
  }

  .program-hero .program-hero-grid+.container {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 4rem;
  }

  @media (max-width: 1200px) {
    .program-hero .program-hero-grid+.container {
      gap: 1.5rem;
    }
  }

  @media (max-width: 768px) {
    .program-hero .program-hero-grid+.container {
      grid-template-columns: 1fr;
    }
  }
</style>
<style>
  .edex-form {
    max-width: 480px;
    margin: auto;
    background: #ffffff;
    /* padding: 30px; */
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
  }

  .edex-form h2 {
    margin-bottom: 14px;
    text-align: center;
    color: #003366;
  }

  .edex-form .form-group {
    margin-bottom: 12px;
  }

  .edex-form .form-group label {
    display: block;
    margin-bottom: 4px;
    font-size: 13px;
    color: #333;
  }

  .edex-form .form-group input[type="text"],
  .edex-form .form-group input[type="email"],
  .edex-form .form-group input[type="tel"] {
    width: 100%;
    /* padding: 10px 12px; */
    padding: 8px 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
  }

  .edex-form .form-group input:focus {
    outline: none;
    border-color: #0077cc;
  }

  .edex-form .checkbox {
    display: flex;
    /* align-items: center; */
    gap: 8px;
  }

  .edex-form .checkbox label {
    font-size: 13px;
  }

  .edex-form button {
    width: 100%;
    padding: 12px;
    background: #0077cc;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    cursor: pointer;
    /* margin-top: 10px; */
  }

  .edex-form button:hover {
    background: #005fa3;
  }


  /*  */
  .program-form-col {
    position: relative;
  }

  .edex-form {
    position: fixed;
    z-index: 9;
    width: auto;
  }

  @media (max-width: 1535px) {
    .edex-form {
      top: 95px;
      height: 543.59px;
      overflow: auto;
    }
  }

  @media (max-width: 1024px) {
    .edex-form {
      position: static;
      width: 100%;
      height: auto;
      overflow: visible;
      margin-top: 1.5rem;
    }
  }

  @media (max-width: 768px) {
    .edex-form {
      margin-top: 1rem;
    }
  }
</style>

<style>
  /* Clase que aplicamos cuando lo “clavamos” */
  @media (min-width: 1025px) {
    .contact-form-card.is-absolute {
      position: absolute !important;
      left: 0;
      right: 0;
    }
  }
</style>

<style>
  @media (max-width: 767px) {
    .skill-item p {
      overflow-wrap: break-word !important;
      word-break: break-word !important;
    }

    .docente-header {
      display: flex !important;
      align-items: center !important;
      flex-direction: column !important;
      gap: 0 !important;
    }

    .docente-info h4 {
      text-align: center !important;
    }

    .docente-body p {
      overflow-wrap: break-word !important;
      word-break: break-word !important;
    }
  }
</style>

<?php get_template_part('inc/ui/sections/programa/program-hero'); ?>
<?php get_template_part('inc/ui/sections/programa/program-content'); ?>
<?php get_template_part('inc/ui/sections/programa/certification-section'); ?>

<?php
// Obtener campos ACF para el modal de requisitos
$modal_titulo = get_field('programa_modal_titulo');
$modal_inscripcion = get_field('programa_modal_inscripcion');
$modal_subtitulo = get_field('programa_modal_Subtitulo');
$modal_previos = get_field('programa_modal_previos');
?>
<!-- Requisitos Popup -->
<div class="popup-overlay" id="requisitosPopup" data-jcc>
  <div class="popup-content">
    <div class="popup-header">
      <h3><?= !empty($modal_titulo) ? esc_html($modal_titulo) : 'Requisitos de Inscripción'; ?></h3>
      <div class="popup-close" onclick="closePopup('requisitosPopup')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
    </div>
    <div class="popup-body">

      <?php if (!empty($modal_inscripcion) && is_array($modal_inscripcion)): ?>
        <ul>
          <?php foreach ($modal_inscripcion as $item): ?>
            <?php if (!empty($item['item'])): ?>
              <li>
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><?= esc_html($item['item']); ?></span>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php if (!empty($modal_previos) && is_array($modal_previos)): ?>
        <h4 style="margin-top: 1.5rem; margin-bottom: 0.75rem; font-size: 0.9rem;">
          <?= !empty($modal_subtitulo) ? esc_html($modal_subtitulo) : 'Requisitos Previos:'; ?>
        </h4>
        <ul>
          <?php foreach ($modal_previos as $item): ?>
            <?php if (!empty($item['item'])): ?>
              <li>
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><?= esc_html($item['item']); ?></span>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</div>

<script>
  // Popup functions
  function openPopup(id) {
    document.getElementById(id).classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closePopup(id) {
    document.getElementById(id).classList.remove('active');
    document.body.style.overflow = '';
  }

  // Close popup on overlay click
  document.querySelectorAll('.popup-overlay').forEach(overlay => {
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) {
        overlay.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  });
</script>

<!--  -->
<script>
  (() => {
    const section = document.getElementById("certification-section");
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {

        if (entry.isIntersecting) {
          console.log("🔥 Certification ya es visible");
        } else {
          console.log("❌ Certification fuera de pantalla");
        }

      });
    }, {
      threshold: 0.01 // apenas 1% visible ya dispara
    });

    observer.observe(section);
  })();
</script>
<?php get_footer(); ?>


<script>
  (() => {
    const form = document.querySelector('.contact-form-card');
    const parent = document.querySelector('.program-form-col');
    const stopEl = document.getElementById('certification-section');

    if (!form || !parent || !stopEl) return;

    // Debe coincidir con tu CSS de >=1536 (top: 140px)
    const FIXED_TOP = 140;     // px
    const GAP = 24;            // separación extra antes de chocar (ajustable)

    function updateFormPosition() {
      // En responsive donde lo dejás estático:
      if (window.matchMedia('(max-width: 1024px)').matches) {
        form.classList.remove('is-absolute');
        form.style.top = '';
        return;
      }

      const formRect = form.getBoundingClientRect();
      const stopRect = stopEl.getBoundingClientRect();
      const parentRect = parent.getBoundingClientRect();

      const scrollY = window.scrollY || window.pageYOffset;

      // Top real del stopEl en documento
      const stopTopDoc = stopRect.top + scrollY;

      // Top real del parent en documento
      const parentTopDoc = parentRect.top + scrollY;

      const formHeight = formRect.height;

      // Punto donde el form (fixed) ya tocaría la sección (con GAP)
      const stopPoint = stopTopDoc - formHeight - FIXED_TOP - GAP;

      if (scrollY >= stopPoint) {
        // “Clavarlo” en el parent
        form.classList.add('is-absolute');
        form.style.top = (stopPoint - parentTopDoc) + 'px';
      } else {
        // Seguir fixed normal
        form.classList.remove('is-absolute');
        form.style.top = '';
      }
    }

    // performance: requestAnimationFrame
    let ticking = false;
    function onScrollOrResize() {
      if (!ticking) {
        window.requestAnimationFrame(() => {
          updateFormPosition();
          ticking = false;
        });
        ticking = true;
      }
    }

    window.addEventListener('scroll', onScrollOrResize, { passive: true });
    window.addEventListener('resize', onScrollOrResize);
    window.addEventListener('load', updateFormPosition);

    updateFormPosition();
  })();
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');

    if (form) {
      form.addEventListener('submit', function (e) {
        e.preventDefault(); // 🔥 Detenemos el envío inmediato

        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
          'event': 'registro_completado'
        });

        const submitBtn = this.querySelector('.btn-submit');
        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.innerHTML = '<span>ENVIANDO...</span>';
        }

        // ⏳ Delay de 3 segundos
        setTimeout(() => {
          form.submit(); // enviamos el formulario manualmente
        }, 1500);
      });
    }
  });
</script>
