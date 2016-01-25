<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>



.con1{ width:1024px; height:710px; margin:0 auto; position:relative}
    .con1bg{ background:url(<?php echo cqtheme_get_path() ?>/img/bg-1.png) no-repeat center center #2e313a}
.con1_logo{ width:200px; float:left; margin-top:12px}
.con1_logo .con1_1_1{ display:block; float:left}
.con1_logo .con1_1_2{ display:block; float:left}
.con1 .con1_nav{ height:40px; color:#fff; float:left; margin-top:10px}
.con1 .con1_nav li{ padding:0 20px; line-height:40px; float:left}
.con1 .con1_nav li a{ color:#fff; text-decoration:none}
.con1 .con1_nav li a.active{ color:#fd5f47; text-decoration:none}
.con1_user{ width:202px; float:right; margin-top:17px}
.con1_user .con1_user_p{ line-height:200%; color:#fff; background:#fd5f47; float:left; padding:0 20px; border-radius:20px; margin-left:10px}
.con1_user img { display:block; float:left; }
.con1_4{ position:absolute; top:220px; right:0;}
.con1_4 .c141{ color:#fff; font-size:30px; border:1px solid #fff; width:190px; text-align:center; float:right; clear:both}
.con1_4 .c142{ color:#fff; font-size:14px; text-align:right; margin-top:25px; clear:both; float:right; color:#c5c5c5}
.con1_4 .c143{ color:#fff; font-size:14px; text-align:right; margin-top:25px; clear:both; float:right; color:#c5c5c5}
.con1_4 .c144{ color:#fff; font-size:18px; border: 1px solid #fff; background:none; padding:5px 30px; border-radius:10px; margin-top:20px; clear:both; float:right; display:block; font-weight:normal;box-shadow:0 0 0 white!important; text-shadow:0 0 0 white!important}



.con3{ width:1024px; height:700px; margin:0 auto; position:relative}
.con3bg{ background:url(<?php echo cqtheme_get_path() ?>/img/c3bg.png) no-repeat center center #f1f2f6}
.con3 .c31{ text-align:center; font-size:26px; color:#4a4a4a; margin-top:20px;}
.con3 .c32{ text-align:center; font-size:14px; color:#acadae; margin-top:15px;}

.con3 .c33{ margin:20px auto 0; width:1000px; overflow:hidden}
.con3 .c33 .c33div{ width:200px; height:250px; float:left;}
.con3 .c33 .c33div .c33divimg{ display:block; margin:10px auto}
.con3 .c33 .c33div .c33divt{ font-size:18px; color:#4a4d51; text-align:center; font-weight:bold; margin-top:20px}
.con3 .c33 .c33div .c33divp{ font-size:14px; color:#9d9d9d; width:85%; margin:0 auto; font-size:12px; line-height:200%; margin-top:10px}
.con3 .more_btn{ text-shadow:none;box-shadow:none; font-weight:normal;color:#4a4a4a; font-size:18px; display:block; margin:0 auto; border: 1px solid #4a4a4a; background:none; padding:5px 30px; border-radius:10px; margin-top:25px; }

.con4{ width:1024px; height:700px; margin:0 auto; position:relative}
.con4bg{ background:#2e3139}
.con4 .arr{ position: absolute; top:0; left:50%; margin-left:-29px}
.con4 .c41{ text-align:center; font-size:26px; color:#d8d8d8; margin-top:50px;}
.con4 .more_btn{ text-shadow:none;box-shadow:none; font-weight:normal;color:#9d9d9d; font-size:18px; display:block; margin:0 auto; border: 1px solid #9d9d9d; background:none; padding:5px 30px; border-radius:10px; margin-top:25px; }
.con4 .c42{ overflow:hidden; margin-top:30px}
.con4 .c42 .c42div{ margin:20px 5px; display:inline-block; position:relative}
.con4 .c42 .c42div:hover .c42p{ display:block}
.con4 .c42 .c42div .c42p{ display:none; position:absolute; bottom:0; left:0; background:#4a4a4a; width:100%; height:46px; line-height:46px; font-size:13px; color:#fff; text-indent:50px}
.con4 .c42 .c42div .c42btn{ text-shadow:none;box-shadow:none; font-weight:normal;display:block; line-height:26px; background:none; border:1px solid #f5a623; border-radius:15px; font-size:12px; padding:0 28px; color:#f5a623; float:right; margin-top:9px; margin-right:20px; text-indent:0}

.con5{ width:1024px; height:660px; margin:0 auto; position:relative}
.con5bg{ background:url(<?php echo cqtheme_get_path() ?>/img/c3bg.png) no-repeat center center #f1f2f6}
.con5 .c51{ text-align:center; font-size:26px; color:#4a4a4a; margin-top:50px;}
.con5 .arr{ position: absolute; top:0; left:50%; margin-left:-29px}
.con5 .c52{ height:500px; margin-top:30px}
.con5 .c52 .c52div{ width:30%; float:left; margin-right:5%; height:500px; font-size:14px; color:#4a4a4a; line-height:250%}
.con5 .c52 .c52div.end{ margin-right:0;}
.con5 .c52 .c52div h3{ background:#fd5f47; font-size:16px; font-weight:bold; color:#fff; line-height:200%; text-align:center}
.con5 .c52 .c52div li span{ color:#fd5f47; padding-right:6px}
.con5 .c52 .c52div li{list-style: outside none none;}
.con5 .c52 .c52div ul{margin:0px;}
.con5 .c52 .c52div .c52div_more_btn{ color:#606060; font-size:16px; display:block; margin:0 auto; border: 1px solid #606060; background:none; padding:5px 25px; line-height:150%; border-radius:10px; margin-top:25px; }
.con5 .c53{ text-align:center; font-size:12px; color:#888888; }
.con5 .c53 span{ color:#fb715c; } 

.con6{ width:1024px; height:360px; margin:0 auto; position:relative}
.con6bg{ background:#fd5f47}
.con6 .c61{ text-align:center; font-size:26px; color:#fff; margin-top:40px;}
.con6 .arr{ position: absolute; top:0; left:50%; margin-left:-29px}
.con6 .c62{ width:90%; margin:0 auto; height:230px; margin-top:40px;}
.con6 .c62 .c62div{ width:33.3%; height:230px; float:left;}
.con6 .c62div .c62img{ display:block; margin:0 auto}
.con6 .c62div .c62h4{ font-size:18px; font-weight:bold; text-align:center; margin-top:20px; color:#fff; }
.con6 .c62div .c62p{ width:60%; margin:10px auto 0; font-size:12px; line-height:180%; text-align:center; color:#fff; }

.confoot{ width:1024px; height:160px; margin:0 auto; position:relative; color:#fff; }
.confootbg{ background:#2e3139}
.confoot .foot1{ float:left; width:590px; font-size:12px; font-family:Tahoma, Geneva, sans-serif; line-height:200%; margin-top:38px}
.confoot .foot1 .foot12{ margin-top:18px}
.confoot .foot2{ float:left; width:140px; margin-top:50px}
.confoot .foot3{ float:right; width:240px; margin-top:18px}
.confoot .foot3 .foot3div{ float:right; text-align:center}
.confoot .foot3 .foot3div p{ margin-top:6px;}

  </style>
  
  <script>
    jQuery(function() {
      jQuery(".c33div").mouseover(function(){
        var index = jQuery(this).index(".c33div");
        index++;
        jQuery(this).find(".c33divimg").attr("src","<?php echo cqtheme_get_path() ?>/img/3-" + index + "-h.png" );
      });
      jQuery(".c33div").mouseout(function(){
        var index = jQuery(this).index(".c33div");
        index++;
        jQuery(this).find(".c33divimg").attr("src","<?php echo cqtheme_get_path() ?>/img/3-" + index + "-n.png" );
      });

      jQuery(".c62div").mouseover(function(){
        var index = jQuery(this).index(".c62div");
        index++;
        jQuery(this).find(".c62img").attr("src","<?php echo cqtheme_get_path() ?>/img/6-" + index + "-h.png" );
      });
      jQuery(".c62div").mouseout(function(){
        var index = jQuery(this).index(".c62div");
        index++;
        jQuery(this).find(".c62img").attr("src","<?php echo cqtheme_get_path() ?>/img/6-" + index + "-n.png" );
      });

    });
  </script>


  <!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'cqtheme') . '/js/html5.js'; ?>"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>