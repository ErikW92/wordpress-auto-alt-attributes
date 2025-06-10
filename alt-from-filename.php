/*
Plugin Name: Auto ALT from Filename
Description: Automatically adds an ALT from the file name to all <img> elements without an ALT attribute.
Version: 1.0
Author: 14Agency GmbH / https://14agency.de - Erik Waldeck
*/

add_action('wp_footer', function () {
  ?>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll('img:not([alt])');

    images.forEach(img => {
      const src = img.getAttribute('src');
      if (!src) return;

      const filename = src.split('/').pop();              // e.g. “example-image_name-123.png”
      const basename = filename.split('.')[0];            // “example-image_name-123”

      const readable = basename
        .replace(/[-_]/g, ' ')                             // Convert separators to spaces
        .replace(/\b\w/g, char => char.toUpperCase());   // Capitalize each word

      img.setAttribute('alt', readable);
    });
  });
  </script>
  <?php
});
