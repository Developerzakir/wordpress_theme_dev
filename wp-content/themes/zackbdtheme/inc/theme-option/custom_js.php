<?php

?>
<div class="wrap">
  <h1>Custom JavaScript</h1>
  <form method="post" action="options.php">
  <?php wp_nonce_field('update-options') ?>
    <?php
      settings_fields('zackbth-custom-js-options');
      do_settings_sections('zackbth_custom_js');
      submit_button();
    ?>
  </form>
</div>

<?php 