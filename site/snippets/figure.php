<figure class="bgcolor">
  <?php $thumb = $cover->thumb(['width'=> 400]) ?>
  <img 
    src="<?= $thumb->url() ?>" 
    srcset="<?= $cover->srcset('cover') ?>" 
    width="<?= $thumb->width() ?>"
    height="<?= $thumb->height() ?>"
    sizes="(min-width: 1260px) calc(69.48vw - 333px), (min-width: 920px) calc(99.38vw - 422px), (min-width: 660px) calc(100vw - 162px), calc(100vw - 30px)"
    alt="<?= $cover->alt() ?>">
  <?php if($cover->caption()->isNotEmpty()):?>
    <figcaption>
      <details>
        <summary><span>?</span></summary>
        <?= $cover->caption()->kirbytext() ?>
      </details>
    </figcaption>
  <?php endif ?>
</figure>