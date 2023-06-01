
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

  <script defer data-domain="agencedessentiers.org" src="https://plausible.io/js/script.js"></script>

</body>
</html>
