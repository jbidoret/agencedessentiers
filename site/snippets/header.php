<!DOCTYPE html>
<html lang="<?php echo $kirby->language() ?? 'fr' ?>"  class="no-js">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
  <?php snippet("header.metas") ?>

  <?php
    if ( option('environment') == 'local' ) :
      foreach ( option('basic-devkit.assets.styles', array()) as $style):
        echo css($style.'?version='.md5(uniqid(rand(), true)));
      endforeach;
    else:
      echo css('assets/production/all.min.css');
    endif
  ?>

  <?php
    if($page->palette()->isNotEmpty()) {
      $palette  = $page->palette()->yaml();
      $altcolor = $palette["altcolor"];
      $accentcolor = $palette["accentcolor"]; 
    } else {
        $accentcolor = null;
        $altcolor = null;
    }
  ?>
</head>
<body
   data-login="<?php e($kirby->user(),'true', 'false') ?>"
   data-template="<?php echo $page->template() ?>"
   data-intended-template="<?php echo $page->intendedTemplate() ?>"
   style="--accentcolor:<?= $accentcolor ?>; --altcolor:<?= $altcolor ?>; ">


  <div class="page">

    <header id="header">
      <h1>
        <a href="<?= $site->url() ?>">
        <?= $site->title()->blast() ?>
        </a>
      </h1>
    </header>
    
    <nav id="nav">
      <?php
        $items = $pages->listed();
        if($items->isNotEmpty()): ?>
        <ul>
          <?php foreach($items as $item): ?>
          <li class="<?php e($item->isOpen(), ' active') ?> parent">
            <a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
            <?php
              $children = $item->children()->listed();
              if($children->isNotEmpty()): ?>
            <ul>
              <?php foreach($children as $child): ?>
              <li class="<?php e($child->isOpen(), 'active') ?> child"><a href="<?= $child->anchorurl() ?>"><?= $child->title()->html() ?></a></li>
              <?php endforeach ?>
            </ul>
            <?php endif ?>
          </li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
    </nav>