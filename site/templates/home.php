<?php snippet('header') ?>

  <div class="homeintro">
    <?php if($page->introduction()->isNotEmpty()):?>
      <div class="intro">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>
    <a href="#par-ici" id="paricilink"><span>↓</span></a>
    <?php if($cover = $page->cover()->toFile()):?>
      <figure class="bgcolor">
        <img src="<?= $cover ->url() ?>" alt="<?= $cover ->alt() ?>">
        <?php if($cover->caption()->isNotEmpty()):?>
          <figcaption>
            <details>
              <summary><span>?</span></summary>
              <?= $cover->caption()->kirbytext() ?>
            </details>
          </figcaption>
        <?php endif ?>
      </figure>
    <?php endif ?>
  </div>

  <main class="home default" id="par-ici">
    <?php if($page->text()->isNotEmpty()):?>
      <div class="text">
        <?= $page->text()->kirbytext() ?>
      </div>
    <?php endif ?>

    <footer>
      <p>
        <?php
          $clsses = array( "aaa", "alt", "shw", "til");
          shuffle( $clsses );
          foreach($clsses as $c){ 
            echo "<span class='$c'>—</span>";
          }
        ?>
      </p>
      <?=$site->footer()->kt() ?>
    </footer>

  </main>
<?php snippet('footer') ?>
