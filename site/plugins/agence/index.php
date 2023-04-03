<?php

Kirby::plugin('agence/ktags', [
    'tags' => [
        'audio' => [
            'html' => function($tag) {
                if ($audioFile = $tag->file($tag->value())) {
                    return '<audio controls class="audio"><source src="' . $audioFile->url()  . '" type="audio/mpeg"></source></audio>';
                }
            }
          ], 
          'gallery' => [
            'html' => function($tag) {
              
              $rawimages = explode(' ', $tag->value());
              $images = [];
              foreach ($rawimages as $image) {
                $images []= $tag->file($image);
              }
              $gallery = snippet('gallery', ['images' => $images], true);
              return $gallery;
      
            }
          ]
    ],
    'pageMethods' => [
        'getTemplateName' => function(){
            $str =  $this->blueprint()->title();
            return $str;      
        },        
    ],
    'fieldMethods' => [
        'blast' => function ($text) {
          $zigzags = ["alt","swh", "til", "zag"];
          $title_array = [];
          $max = 0;
          $title = "";

          // split a string in words (spaces)
          $pagetitle_words = explode(' ', $text->value());
          foreach ($pagetitle_words as $word) {
            $title_array []= preg_split('//u', $word, 0, PREG_SPLIT_NO_EMPTY);
          }
          
          foreach($title_array as $idx => $word){
            
            $wordvalue = implode("", $word); 
            // set random pad
            $pad = random_int(0, 3 * $idx) + $idx;
            $title .= "<span aria-label='$wordvalue' style='--pad:$pad' class='" . str_replace('’','', strtolower($wordvalue)) . "'>";
            
            // glue punctuation with prev letter 
            $toremove = [];
            foreach($word as $letter_idx => $letter){              
              if($letter_idx > 0){
                $prev = $word[$letter_idx - 1];
                if(in_array($letter, [",",";","’","'", "."]) ){
                  $word[$letter_idx - 1]= $prev . $letter;
                  $toremove []= $letter_idx;
                }
              }
            }
            foreach ($toremove as $key) {              
              array_splice($word, $key, 1);
            }
            // set random zigzag value for each letter
            foreach($word as $letter_idx => $letter){
              $var = random_int(-3,3);
              $zigzag = $zigzags[array_rand($zigzags)];
              $title .= "<b aria-hidden='true' class='$zigzag' style='--var:$var'>$letter</b>" ;
            }
            $title .= "</span> ";
          }
          return $title;
        }
    ],
    'templates' => [
       
    ],
    'hooks' => [
        
    ]
]);