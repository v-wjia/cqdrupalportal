<?php
/**
 * Created by PhpStorm.
 * User: RachelWaffle
 * Date: 16/1/18
 * Time: 下午6:51
 */
?>
<?php
$file_type=$variables['element']['#items'];
?>
<!--<div class="field field-name-field-resource field-type-taxonomy-term-reference field-label-above">-->
    <div class="cd_content_file">
<?php
foreach($file_type as $file){
    echo '<div class="cd_content_file_list">';
    if($variables['element']['#view_mode']=='teaser') {
        echo l(mb_strtoupper(mb_substr($file['filename'], mb_strrpos($file['filename'], '.', -1) + 1)), file_create_url($file['uri']));
    }else{
        echo l($file['filename'],file_create_url($file['uri']));
    }
    echo '</div>';
}
?>
        <div class="clear"></div>
    </div>
<!--</div>-->
