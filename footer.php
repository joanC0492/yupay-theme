<?php
$logo_footer = get_field('global_logo_footer', 'option');
$texto_footer = get_field('global_texto_footer', 'option');
$areas_titulo = get_field('global_areas_titulo', 'option');
$contacto_titulo = get_field('global_contacto_titulo', 'option');
$bloques_contacto = get_field('global_bloques_contacto', 'option');
$redes_sociales_titulo = get_field('global_redes_sociales_titulo', 'option');
$redes_sociales = get_field('global_redes_sociales', 'option');
$copyright = get_field('global_copyright', 'option');
$btn_whatsapp = get_field('global_btn_whatsapp', 'option'); ?>

<!-- Footer -->
<footer class="footer" id="footer">
  <div class="container">
    <div class="footer-main">
      <div class="footer-brand">
        <?php if (!empty($logo_footer) && !empty($logo_footer['url'])): ?>
          <img src="<?php echo esc_url($logo_footer['url']); ?>" alt="<?php echo esc_attr($logo_footer['alt']); ?>"
            class="footer-logo">
        <?php endif; ?>
        <?php if (!empty($texto_footer)): ?>
          <?php echo wp_kses_post($texto_footer); ?>
        <?php endif; ?>
      </div>
      <div class="footer-col">
        <?php if (!empty($areas_titulo)): ?>
          <h4><?= $areas_titulo ?></h4>
        <?php endif; ?>
        <?php if (has_nav_menu('footer-menu')) {
          wp_nav_menu([
            'theme_location' => 'footer-menu',
            'container' => false,
            'items_wrap' => '<ul class="footer-links">%3$s</ul>',
            'depth' => 1,
            'fallback_cb' => false,
          ]);
        } ?>
      </div>
      <div class="footer-col">
        <?php if (!empty($contacto_titulo)): ?>
          <h4><?= $contacto_titulo ?></h4>
        <?php endif; ?>
        <div class="footer-contact">
          <?php foreach ($bloques_contacto as $bloque):
            $subtitulo = $bloque['subtitulo'];
            $valor = $bloque['valor'];
            $enlace = $bloque['enlace']; ?>
            <?php if (!empty($subtitulo)): ?>
              <p>
                <strong><?= $subtitulo ?></strong>
              </p>
            <?php endif; ?>
            <?php if (!empty($enlace)): ?>
              <a href="<?= $enlace["url"] ?>">
                <?php if (!empty($valor)): ?>
                  <p>
                    <?= $valor ?>
                  </p>
                <?php endif; ?>
              </a>
            <?php else: ?>
              <?php if (!empty($valor)): ?>
                <p>
                  <?= $valor ?>
                </p>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="footer-col">
        <?php if (!empty($redes_sociales_titulo)): ?>
          <h4><?= $redes_sociales_titulo ?></h4>
        <?php endif; ?>

        <div class="social-links">
          <?php foreach ($redes_sociales as $rrss):
            $logo_rrss = $rrss["logo"];
            $link_rrss = $rrss["link"]; ?>
            <a href="<?= $link_rrss['url'] ?>" aria-label="<?= $link_rrss['title'] ?>" target='_blank'
              rel="noopener noreferrer">
              <img src="<?= $logo_rrss['url'] ?>" alt="<?= $logo_rrss['title'] ?>" class="svg">
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php if (!empty($copyright)): ?>
      <div class="footer-bottom">
        <p>&copy; <?= date('Y') ?>
          <?= $copyright ?>
        </p>
      </div>
    <?php endif; ?>
  </div>
</footer>

<!-- WhatsApp Float -->
<?php if (!empty($btn_whatsapp)):
  $wsp_texto_boton = $btn_whatsapp['texto_boton'] ?: '¿Necesitas ayuda?';
  $wsp_mensaje = $btn_whatsapp['mensaje'] ?: 'Hola, me interesa obtener información sobre los programas de Educación Ejecutiva';
  $wsp_numero = $btn_whatsapp['numero'] ?: '997535372';
  $wsp_ocultar = (bool) $btn_whatsapp['ocultar_whatsapp'] ?? false; ?>
  <?php if (!$wsp_ocultar): ?>
    <div class="whatsapp-float">
      <a href="https://wa.me/51<?= $wsp_numero ?>?text=<?= urlencode($wsp_mensaje) ?>" target="_blank"
        rel="noopener noreferrer" class="whatsapp-btn">
        <svg fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
        </svg>
        <span>
          <?= esc_html($wsp_texto_boton) ?>
        </span>
      </a>
    </div>
  <?php endif; ?>
<?php endif; ?>

<?php wp_footer(); ?>
</body>

</html>
