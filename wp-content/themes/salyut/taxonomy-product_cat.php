<?php

get_header();

echo "fhwhfuwheuf";

add_action('template_redirect', 'bc_010101_redirect_woo_pages');
function bc_010101_redirect_woo_pages()
{


 if (is_shop())
 {

  wp_redirect('your_shop_url_here');
  exit;
 }
}

?>



<?php get_footer(); ?>