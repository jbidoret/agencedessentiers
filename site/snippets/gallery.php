
<div class="gallery"  style="--count:<?= count($images) ?>">

<?php foreach ($images as $image): ?>
  <figure class="image carousel-cell">
    <img 
      src="<?= $image->thumb(['width'=> 400])->url() ?>" 
      srcset="<?= $image->srcset('cover') ?>" 
      sizes="(min-width: 1260px) calc(69.48vw - 333px), (min-width: 920px) calc(99.38vw - 422px), (min-width: 660px) calc(100vw - 162px), calc(100vw - 30px)"
      alt="<?= $image->alt() ?>">
    <?php if($image->caption()->isNotEmpty()):?>
      <figcaption>
        <details>
          <summary><span>?</span></summary>
          <?= $image->caption()->kirbytext() ?>
        </details>
      </figcaption>
    <?php endif ?>
  </figure>
<?php endforeach ?>
  
</div>