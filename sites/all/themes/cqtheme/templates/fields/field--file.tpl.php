<?php
/**
 * Created by PhpStorm.
 * User: RachelWaffle
 * Date: 16/1/18
 * Time: 下午6:51
 */
$variables=get_defined_vars();
//?>
<?php
//dsm($variables);
$file_type=$variables['element']['#items'];
foreach($file_type as $file){
    echo '<div class="cd_content_file_list">';
    echo l(mb_strtoupper(mb_substr($file['filename'],mb_strrpos($file['filename'],'.',-1)+1)),file_create_url($file['uri']));
    echo '</div>';
}