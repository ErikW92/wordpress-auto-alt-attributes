<?php
/*
Plugin Name: Auto ALT from Filename
Description: Automatically adds an ALT from the file name to all <img> elements without an ALT attribute.
Version: 1.0
Author: https://14agency.de
*/

add_action('wp_footer', function () {
  ?>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll('img:not([alt])');

    images.forEach(img => {
      const src = img.getAttribute('src');
      if (!src) return;

      const filename = src.split('/').pop();     
      const basename = filename.split('.')[0];  

      const readable = basename
        .replace(/[-_]/g, ' ')                    
        .replace(/\b\w/g, char => char.toUpperCase());

      img.setAttribute('alt', readable);
    });
  });
  </script>
  <?php
});
