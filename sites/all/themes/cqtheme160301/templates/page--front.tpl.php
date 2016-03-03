<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
    <div id="page">


    <!--    <div class="con con0bg">-->
    <!--        <div class="con0">-->
    <!--            <div class="con0_1">-->
    <!--                <div class="con0_logo">-->
    <!--                    <a href="/index.php"><img src="--><?php //echo drupal_get_path('theme','cqtheme160301') ?><!--/img/logo_70x55.png" class="con0_1_1"/>-->
    <!--                    <img src="--><?php //echo drupal_get_path('theme','cqtheme160301') ?><!--/img/logo.jpg" class="con0_1_2"/></a>-->
    <!--                </div>-->
    <!--                <div class="con0_nav">-->
    <!--                    --><?php
//                    $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
//                    print drupal_render($main_menu_tree); ?>
    <!---->
    <!--                </div>-->
    <!--                <ul class="con0_nav">-->
    <!--                  --><?php //if ($page['front_side']): ?>
    <!--                     --><?php //print render($page['front_side']); ?>
    <!--                 --><?php //endif; ?>
    <!--                </ul>-->
    <!--              <!--                <div class="con0_user">-->
    <!--                                  <img src="img/user.png">-->
    <!--                                  <p class="con0_user_p"><span>hi, </span><span>rex</span><span> | 个人中心</span></p>-->
    <!--                              </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <!---->
    <!--  --><?php //if ($is_front): ?>
    <!--  --><?php //if (theme_get_setting('slideshow_display','cqtheme160301')): ?>
    <!--  --><?php
////      $slide1_head = check_plain(theme_get_setting('slide1_head','cqtheme160301'));
//    $slide1_head = theme_get_setting('slide1_head','cqtheme160301');   $slide1_desc = theme_get_setting('slide1_desc','cqtheme160301'); $slide1_url = check_plain(theme_get_setting('slide1_url','cqtheme160301'));
//    $slide2_head = theme_get_setting('slide2_head','cqtheme160301');   $slide2_desc = theme_get_setting('slide2_desc','cqtheme160301'); $slide2_url = check_plain(theme_get_setting('slide2_url','cqtheme160301'));
//    $slide3_head = theme_get_setting('slide3_head','cqtheme160301');   $slide3_desc = theme_get_setting('slide3_desc','cqtheme160301'); $slide3_url = check_plain(theme_get_setting('slide3_url','cqtheme160301'));
//  ?>

    <!--    <div id="slidebox" class="flexslider">-->
    <!--    <ul class="slides">-->
    <!--        <div id="slidebox" class="flexslider">-->
    <!--    <ul class="slides">-->
    <!--      -->
    <!--      <li>-->
    <!--      --><?php //if($slide1_head || $slide1_desc) : ?>
    <!--        <img src="--><?php //print base_path() . drupal_get_path('theme', 'cqtheme160301') . '/images/slide-image-1.jpg'; ?><!--"/>-->
    <!--        <div class="con " style="position: absolute; top: 0px; left: 0px;">-->
    <!--          <div class="con1">-->
    <!--            <div class="con1_1">-->
    <!--              <div class="con1_4">-->
    <!--                --><?php //print $slide1_head; ?>
    <!--                --><?php //print $slide1_desc; ?>
    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!---->
    <!--            <a class="frmore" href="--><?php //print url($slide1_url); ?><!--"> --><?php //print t('READ MORE'); ?><!-- </a>-->
    <!--        --><?php //endif; ?>
    <!---->
    <!---->
    <!---->
    <!--      </li>      -->
    <!--      <li>-->
    <!--        <img src="--><?php //print base_path() . drupal_get_path('theme', 'cqtheme160301') . '/images/slide-image-2.jpg'; ?><!--"/>-->
    <!--    --><?php //if($slide2_head || $slide2_desc) : ?>
    <!--      <div class="con " style="position: absolute; top: 0px; left: 0px;">-->
    <!--        <div class="con1">-->
    <!--          <div class="con1_1">-->
    <!--            <div class="con1_4">-->
    <!--              --><?php //print $slide2_head; ?>
    <!--              --><?php //print $slide2_desc; ?>
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    --><?php //endif; ?>
    <!---->
    <!--      </li>-->
    <!--      <li>-->
    <!--        <img src="--><?php //print base_path() . drupal_get_path('theme', 'cqtheme160301') . '/images/slide-image-3.jpg'; ?><!--"/>-->
    <!--        --><?php //if($slide3_head || $slide3_desc) : ?>
    <!--          <div class="con " style="position: absolute; top: 0px; left: 0px;">-->
    <!--            <div class="con1">-->
    <!--              <div class="con1_1">-->
    <!--                <div class="con1_4">-->
    <!--                  --><?php //print $slide3_head; ?>
    <!--                  --><?php //print $slide3_desc; ?>
    <!--                </div>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        --><?php //endif; ?>
    <!--      </li>-->
    <!--    </ul><!-- /slides -->
    <!--    <div class="doverlay"></div>-->
    <!--  </div>-->
    <!--  --><?php //endif; ?>
    <!--  --><?php //endif; ?>
    <!---->
    <!--  --><?php //if($page['preface_first'] || $page['preface_middle'] || $page['preface_last']) : ?>
    <!--    --><?php //$preface_col = ( 12 / ( (bool) $page['preface_first'] + (bool) $page['preface_middle'] + (bool) $page['preface_last'] ) ); ?>
    <!--    <div id="preface-area">-->
    <!--      <div class="container">-->
    <!--        <div class="row">-->
    <!--          --><?php //if($page['preface_first']): ?><!--<div class="preface-block col-sm---><?php //print $preface_col; ?><!--">-->
    <!--            --><?php //print render ($page['preface_first']); ?>
    <!--          </div>--><?php //endif; ?>
    <!--          --><?php //if($page['preface_middle']): ?><!--<div class="preface-block col-sm---><?php //print $preface_col; ?><!--">-->
    <!--            --><?php //print render ($page['preface_middle']); ?>
    <!--          </div>--><?php //endif; ?>
    <!--          --><?php //if($page['preface_last']): ?><!--<div class="preface-block col-sm---><?php //print $preface_col; ?><!--">-->
    <!--            --><?php //print render ($page['preface_last']); ?>
    <!--          </div>--><?php //endif; ?>
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  --><?php //endif; ?>
    <!---->
    <!--  --><?php //if($page['header']) : ?>
    <!--    <div id="header-block">-->
    <!--      <div class="container">-->
    <!--        <div class="row">-->
    <!--          <div class="col-sm-12">-->
    <!--            --><?php //print render($page['header']); ?>
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  --><?php //endif; ?>

    <div class="header-container">
        <div class="header">
            <div class="header-logo"><a href="/index.php">
                    <img src="<?php echo cqtheme160301_get_path() ?>/img/logo_cq.png"/>
                    <img src="<?php echo cqtheme160301_get_path() ?>/img/logo_bigdata.png" alt=""/></a>
            </div>
            <div class="header-nav">
                <div class="header-list">
                    <?php
                    $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
                    print drupal_render($main_menu_tree); ?>
                </div>


                <!--        <ul>-->
                <!--          <li><a href="" class="active">首页</a></li>-->
                <!--          <li><a href="">数据资源</a></li>-->
                <!--          <li><a href="">数据应用</a></li>-->
                <!--          <li><a href="">数据交易</a></li>-->
                <!--          <li><a href="">物联感知</a></li>-->
                <!--          <li><a href="">机构</a></li>-->
                <!--          <li><a href="">群组</a></li>-->
                <!--        </ul>-->
            </div>
            <div class="login-info">

                <?php if ($page['front_side']): ?>
                    <?php print render($page['front_side']); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div id="slidebox" class="flexslider">
        <ul class="slides">
            <li>
                <div class="banner-container" style="background: url(<?php echo cqtheme160301_get_path(); ?>/images/banner_1.png)">
                    <div class="banner">
                        <h3>BIG DATA MATCH</h3>
                        <h4>重庆开放数据创新应用大赛</h4>
                        <p>发掘数据之智，引领巅峰对决，梦想之战一触即发。</p>
                        <button class="index-btn">查看详情&nbsp;&nbsp;&nbsp;&gt;</button>
                    </div>
                </div>

            </li>
            <li>
                <div class="banner-container" style="background: url(<?php echo cqtheme160301_get_path(); ?>/images/banner_2.jpg)">
                    <div class="banner">
                        <h3>应用</h3>
                        <h4>交通大数据</h4>
                        <p>大数据时代，政府部门通过监测和分析实时交通数据，再通过交通大数据简洁、直观的图形化界面展示出来，便可轻松、即时地获知优化交通的一切可能，并及时制定相应的疏通、导流方案。</p>
                        <button  class="index-btn">查看详情&nbsp;&nbsp;&nbsp;&gt;</button>
                    </div>
                </div>

            </li>
            <li>
                <div class="banner-container" style="background: url(<?php echo cqtheme160301_get_path(); ?>/images/banner_3.jpg)">
                    <div class="banner">
                        <h3>签约</h3>
                        <h4>渝北区政府携手微软共建重庆大数据平台</h4>
                        <p>渝北区政府与微软（中国）有限公司、微软亚太科技有限公司签署战略合作备忘录，三方将在大数据平台、大数据学院、创新孵化加速器平台、大数据体验中心领域方面展开全面合作。</p>
                        <button  class="index-btn">查看详情&nbsp;&nbsp;&nbsp;&gt;</button>
                    </div>
                </div>

            </li>
        </ul>
    </div>
    <!--  --><?php //if($page['search']) : ?>
    <!--    <div class="con con2bg">-->
    <!--    	<div class="con2">-->
    <!--            <img src="--><?php //echo cqtheme160301_get_path(); ?><!--/img/arrow_search.png" class="arr">-->
    <!--            <div style="height:0px; overflow:hidden;">&nbsp;</div>-->
    <!--            <div class="c21">-->
    <!--    --><?php //print render($page['search']); ?>
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--  --><?php //endif; ?>
    <!--    -->
<?php if ($page['search']) : ?>
    <div class="search-container">
        <div class="search">
            <div class="search-input">
<!--                <div class="search-icon"></div>-->
                <?php print render($page['search']); ?>
            </div>
        </div>
    </div>
    </div>
<?php endif; ?>


<?php if ($page['data_resource']) : ?>
    <?php print render($page['data_resource']); ?>
<?php endif; ?>

<?php if ($page['data_application']) : ?>
    <?php print render($page['data_application']); ?>
<?php endif; ?>

<?php if ($page['data_trade']) : ?>
    <?php print render($page['data_trade']); ?>
<?php endif; ?>

<?php if ($page['data_perception']) : ?>
    <?php print render($page['data_perception']); ?>
<?php endif; ?>


<?php if ($page['footer']) : ?>
    <div id="footer-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php print render($page['footer']); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_fourth']): ?>
    <?php $footer_col = (12 / ((bool)$page['footer_first'] + (bool)$page['footer_second'] + (bool)$page['footer_third'] + (bool)$page['footer_fourth'])); ?>
    <div id="bottom">
        <div class="container">
            <div class="row">
                <?php if ($page['footer_first']): ?>
                    <div class="footer-block col-sm-<?php print $footer_col; ?>">
                    <?php print render($page['footer_first']); ?>
                    </div><?php endif; ?>
                <?php if ($page['footer_second']): ?>
                    <div class="footer-block col-sm-<?php print $footer_col; ?>">
                    <?php print render($page['footer_second']); ?>
                    </div><?php endif; ?>
                <?php if ($page['footer_third']): ?>
                    <div class="footer-block col-sm-<?php print $footer_col; ?>">
                    <?php print render($page['footer_third']); ?>
                    </div><?php endif; ?>
                <?php if ($page['footer_fourth']): ?>
                    <div class="footer-block col-sm-<?php print $footer_col; ?>">
                    <?php print render($page['footer_fourth']); ?>
                    </div><?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

    <!--  <footer id="colophon" class="site-footer" role="contentinfo">-->
    <!--    <div class="container">-->
    <!--      <div class="row">-->
    <!--        <div class="fcred col-sm-12">-->
    <!--          --><?php //print t('Copyright'); ?><!-- &copy; --><?php //echo date("Y"); ?><!-- <a href="--><?php //print $front_page; ?><!--">--><?php //print $site_name; ?><!--</a>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    </div>

    <div class="footer-container">
        <div class="footer">
            <div class="footer-logo">
                <img src="/<?php echo cqtheme160301_get_path(); ?>/img/chinacqlogo_1.png" alt=""/>
                <img src="/<?php echo cqtheme160301_get_path(); ?>/img/MSFT_logo_rgb.png" alt=""/>
            </div>
            <div class="copy-info">
                <p>Copyright 2015 www.cq.gov.cn All Rights Reserved.</p>
                <p>重庆市人民政府版权所有 重庆市人民政府办公厅主办</p>
                <p>ICP备案：渝ICP备05003300号</p>
                <p>国际联网备案：渝公网备500000012-00013</p>
            </div>
            <div class="wecode">
                <ul>
                    <li>
                        <img src="/<?php echo cqtheme160301_get_path(); ?>/img/2-D_1.png" alt=""/>
                        <p>重庆市政府网<br/>新浪微博</p>
                    </li>
                    <li>
                        <img src="/<?php echo cqtheme160301_get_path(); ?>/img/2-D_2.png" alt=""/>
                        <p>重庆市政府网<br/>腾讯微博</p>
                    </li>
                    <li>
                        <img src="/<?php echo cqtheme160301_get_path(); ?>/img/2-D_3.png" alt=""/>
                        <p>Microsoft云科技<br/>官方微信</p>
                    </li>
                    <li>
                        <img src="/<?php echo cqtheme160301_get_path(); ?>/img/2-D_4.png" alt=""/>
                        <p>Microsoft<br/>亚太云生态</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<?php

//module_load_include('inc','phpexcel');
//$data = phpexcel_import('test-data.xlsx',TRUE,TRUE);
//print_r($data);
//$ddd= drupal_get_path_alias('taxonomy/term/11');
//echo $ddd;
?>