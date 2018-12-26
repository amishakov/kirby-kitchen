<?php snippet('header') ?>
<?= css(Kirby::plugin('avoskitchen/kitchen')->mediaUrl() . '/css/kitchen.css') ?>

<article class="recipe">

  <header class="recipe-header">
    <h1><?= $page->title()->escape() ?></h1>

    <?php if ($image = $page->cover()->toFile()): ?>
      <figure class="recipe-cover">
        <?= $image->resize(1000)->html() ?>
      </figure>
    <?php endif ?>
  </header>
  
  <?= $page->text()->kirbytext() ?>
  
  <?php if ($page->ingredients()->isNotEmpty()): ?>
    <div class="recipe-ingredients / js-kitchen-ingredients">
      <h2>Zutaten</h2>
      <?= $page->yieldFormatted() ?>
      <?= $page->ingredientsFormatted() ?>
    </div>
  <?php endif ?>

  <?php if ($page->instructions()->isNotEmpty()): ?>
    <div class="recipe-instructions">
      <h2>Zubereitung</h2>
      <?= $page->instructionsFormatted() ?>
    </div>
  <?php endif ?>
  
  <?php if ($page->tips()->isNotEmpty()): ?>
    <div class="recipe-tips">
      <h2>Tipps &amp; Varianten</h2>
      <?= $page->tipsFormatted() ?>
    </div>
  <?php endif ?>

  <footer class="recipe-footer">
    <h2>Rezeptinformationen</h2>

    <?php if ($page->source()->isNotEmpty()): ?>
      <div class="recipe-source">
        <h3>Quelle/Inspiration:</h3>
        <?= $page->source()->kirbytext() ?>
      </div>
    <?php endif ?>

    <div class="recipe-meta">
      <p><strong>Kategorie:</strong> <?= $page->categoryTitle()->escape() ?></p>
      <?php if ($page->cuisines()->isNotEmpty()): ?>
        <p><strong>Küchen:</strong> <?= $page->cuisinesFormatted() ?></p>
      <?php endif ?>
      <?php if ($page->lastEdited()->isNotEmpty()): ?>
        <p><strong>Zuletzt bearbeitet:</strong> <?= $page->lastEdited()->toDate('d.m.Y \u\m H:i') ?> Uhr</p>
      <?php endif ?>
    </div>
  </footer>

</article>

<?php
$assetsUrl = Kirby::plugin('avoskitchen/kitchen')->mediaUrl();
echo js("{$assetsUrl}/js/kitchen.js", [
  'data-assets-url' => $assetsUrl,
]);
?>

<?php snippet('footer') ?>