<?php
$term = get_queried_object();
$indicadores = get_field('areas_indicadores', $term) ?? [];

?>

<?php if (!empty($indicadores)): ?>
<section class="stats-bar">
  <div class="container">
    <div class="stats-grid">
      <?php foreach ($indicadores as $indicador):
        $valor = $indicador['valor'];
        $etiqueta = $indicador['etiqueta']; ?>
        <div class="stat-item fade-in">
          <?php if (!empty($valor)): ?>
            <div class="stat-number">
              <?= $valor ?>
            </div>
          <?php endif; ?>
          <?php if (!empty($etiqueta)): ?>
            <div class="stat-label">
              <?= $etiqueta ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
