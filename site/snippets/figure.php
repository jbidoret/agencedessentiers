<figure class="bgcolor">
  <img 
    src="<?= $cover->thumb(['width'=> 400])->url() ?>" 
    srcset="<?= $cover->srcset('cover') ?>" 
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