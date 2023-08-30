<?php

/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage NUS
 * @since 0.1.0
 */
?>

<?php
    $footer_data = ThemeComponents\Shared\Footer::get_data();
    sample_theme_render( 'templates/content', 'footer', $footer_data );
?>

</body>
</html>