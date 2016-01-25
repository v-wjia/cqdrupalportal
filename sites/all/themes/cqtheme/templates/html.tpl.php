<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<!--  <script src="js/jquery-1.11.3.js"></script>-->
  <script>
jQuery(document).ready(function(){


  var strParent = jQuery("nav.breadcrumb").find("a").eq(1).text();
  jQuery(".con0_nav li a").each(function(){
    if(this.text==strParent) {
      jQuery(".con0_nav li a").removeClass("active");
      jQuery(this).addClass("active");
    }
  })

});
//    jQuery(function() {
//      jQuery(".cd_nav li").click(function(){
//        jQuery(".cd_nav li").removeClass("active");
//        jQuery(this).addClass("active");
//      })
//    });
  </script>
<!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'cqtheme') . '/js/html5.js'; ?>"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>