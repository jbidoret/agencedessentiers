<?php snippet('header') ?>


  <main class="default"  >
    <?php if($page->introduction()->isNotEmpty()):?>
      <div class="intro">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>

    <h1 class="gridh1"><?= $page->title()->blast() ?></h1>

    <?php if($cover = $page->cover()->toFile()):?>
      <?php snippet('figure', ["cover" => $cover]) ?>
    <?php endif ?>

    <?php if($page->text()->isNotEmpty()):?>
      <div class="text">
        <?= $page->text()->kirbytext() ?>
      </div>
    <?php endif ?>

    <?php foreach ($page->children()->listed() as $sub) :?>
      <?php if($sub->text()->isNotEmpty()):?>
        <?php if($cover = $sub->cover()->toFile()):?>
          <?php snippet('figure', ["cover" => $cover]) ?>
        <?php endif ?>
        <div class="text"id="<?=$sub->slug() ?>">
          <?= $sub->text()->kirbytext() ?>
        </div>
      <?php endif ?>
    <?php endforeach ?>

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
