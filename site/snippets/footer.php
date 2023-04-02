
  </div>
  
  <!-- scripts -->
  <?php
    if ( option('environment') == 'local' ) :
      foreach ( option('basic-devkit.assets.scripts', array()) as $style):
        echo js($style.'?version='.md5(uniqid(rand(), true)));
      endforeach;
    else:
      echo js('assets/production/all.min.js');
    endif
  ?>

  <script>
    // import('https://unpkg.com/responsive-image-test@0.0.1/target/index.js').then((module) => {
    //   const image = document.querySelector('.bgcolor img');
    //   image && module.observeSizes(image);
    // });
  </script>

</body>
</html>
