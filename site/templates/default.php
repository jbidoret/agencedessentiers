<?php snippet('header') ?>


  <main class="default"  >
    <?php if($page->introduction()->isNotEmpty()):?>
      <div class="intro">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>

    <?php 
      // $title_array = [];
      // $pagetitle_words = explode(' ', $page->title()->value());
      // foreach ($pagetitle_words as $word) {
      //   $title_array []= preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
      // }

      // $classes = ["alt","swh", "til", "zag"];
      // $title = "";
      // $row = 1;
      // $max = 0;
      // foreach($title_array as $word){
      //   $var = 0;
      //   $startcolumn = 0;
      //   $row += 1;
      //   $max = max($max, count($word));
      //   foreach($word as $letter){
      //     $startcolumn += 1;
      //     $var = $var + random_int(-3,3);
      //     $c = $classes[array_rand($classes)];
      //     $title .= "<b class='$c' style='--var:$var; --row:$row; --startcolumn: $startcolumn'>$letter</b>" ;
      //     if( rand(0,100) > 80){
      //       $row += 1;      
      //     }
      //   }
      //   $title .= "  ";
        
      // }

      $title_array = [];
      $max = 0;
      $pagetitle_words = explode(' ', $page->title()->value());
      foreach ($pagetitle_words as $word) {
        $title_array []= preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
      }

      $classes = ["alt","swh", "til", "zag"];
      $title = "";
      foreach($title_array as $idx => $word){
        $var = 0;
        $pad = random_int(0, 3 * $idx) + $idx;
        $title .= "<span style='--pad:$pad' class='" . str_replace('’','', strtolower(implode("", $word))) . "'>";
        foreach($word as $letter){
          $var = $var + random_int(-3,3);
          $c = $classes[array_rand($classes)];
          $title .= "<b class='$c' style='--var:$var'>$letter</b>" ;
        }
        $title .= "</span> ";
      }
    ?>
    <h1 class="gridh1" style="--max:<?= $max ?>"><?= $title ?></h1>

    <?php if($cover = $page->cover()->toFile()):?>
      <figure class="bgcolor">
        <img 
          src="<?= $cover->thumb(['width'=> 400])->url() ?>" 
          sizes="(min-width:960px) calc(0.71 * (100vw - 584px)), 100vw"
          srcset="<?= $cover->srcset('cover') ?>" 
          alt="<?= $cover ->alt() ?>">
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

    <?php if($page->text()->isNotEmpty()):?>
      <div class="text">
        <?= $page->text()->kirbytext() ?>
      </div>
    <?php endif ?>
    <?php foreach ($page->children()->listed() as $sub) :?>
      <?php if($sub->text()->isNotEmpty()):?>
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
