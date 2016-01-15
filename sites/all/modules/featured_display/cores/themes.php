<?php

/**
 * Created by PhpStorm.
 * User: RachelWaffle
 * Date: 15/12/23
 * Time: 下午2:40
 */
class ContentData {
  public $output = '';
  public $wrapped_tag = array();
  public $close_tag = array();
  public $layer = 0;

  function __destruct() {
    // TODO: Implement __destruct() method.
    unset($this->output);
    unset($this->wrapped_tag);
    unset($this->close_tag);
    unset($this->layer);
  }

  function clear() {
    $this->output = '';
    $this->wrapped_tag = array();
    $this->close_tag = array();
    $this->layer = 0;
  }
}

class ContentGetter
{


  /**
   * Implements hook_action_info().
   */
  function business_fours_add($variables)
  {
    $output = '<div id="resource" class="resource">';
    $items = $variables['#items_b'];
    foreach ($items as $item) {
      $title = $item['#title_b'];
      $data = $item['#data_b'];

      $output .= '<div class="fours-add">';
      $output .= '<h1>' . $title . '</h1>';
      $output .= '<br><h3>' . $data . '</h3><br>';
    }
    $output .= '</div>';
    return $output;

  }


  /**
   * 根据分类名字取得分类tid
   * @param $category_name
   * @return int
   */
  function get_tid($category_name)
  {
    $tag_data = db_select('taxonomy_term_data', 'n')
        ->fields('n', array('tid'))
        ->condition('name', $category_name)
        ->execute();
    $tag_id = -1;
    foreach ($tag_data as $tag) {
      $tag_id = $tag->tid;
    }
    return $tag_id;
  }




  function get_tag_alias_by_tid($tid){
    $query = db_select('url_alias', 'n')
        ->fields('n', array('alias'))
        ->condition('source', 'taxonomy/term/' . $tid)
        ->execute();
    $tag_alias = 'node';
    foreach ($query as $alias) {
      $tag_alias = $alias->alias;
    }
    return $tag_alias;
  }

  function get_tag_alias_by_tag($category_name) {
    $tid = $this->get_tid($category_name);
    return $this->get_tag_alias_by_tid($tid);
  }

  function get_url_by_tid($tid){
    return drupal_get_path_alias('taxonomy/term/' . $tid);
  }

  function get_url_by_tag($category_name){
    return $this->get_url_by_tid($this->get_tid($category_name));
  }

  /**
   * 根据分类名字取得数据
   * @param $category_name
   * @param int $limit
   * @param int $offset
   * @return array|DatabaseStatementInterface|null
   */
  function query_by_tag($category_name, $limit = 10, $offset = 0) {
    $tag_id = $this->get_tid($category_name);
    $nid_data = db_select('taxonomy_index', 'n')
      ->fields('n', array('nid'))
      ->condition('tid', $tag_id)
      ->range($offset, $limit)
      ->orderBy('created', 'DESC')
      ->execute();

    $query = db_select('node', 'n')->fields('n', array(
      'title',
      'nid',
      'created'
    ))->orderBy('created', 'DESC');
    $nids = array();
    foreach ($nid_data as $nid) {
      $nids[] = $nid->nid;
    }

    if (count($nids) < 1) {
      return array();
    }
    $query->condition('nid', $nids, 'IN')
          //只显示推上首页内容
          ->condition('promote',1);


    return $query->execute();
  }

  function query_resource() {
    $query = db_select('node', 'n')->fields('n', array(
      'title',
      'nid',
      'created'
    ))
      ->condition('status', 1)->orderBy('created', 'DESC')->execute();
    return $query;
  }


  /**
   * 根据nid获得对应node的image的url
   * @param $nid
   * @param string $image_style
   * @return bool|string
   */
  function get_node_image_url($nid, $image_style = 'application_display') {
    $image_url = '';
    $query = db_select('file_managed', 'fm');
    $query->join('file_usage', 'fu', 'fu.fid = fm.fid');
    $query->condition('fu.id', $nid, '=');
    $query->fields('fm', array('uri'));
    $query->range(0, 1);
    $result = $query->execute();
    foreach ($result as $uri) {
      $image_url = image_style_url($image_style, $uri->uri);
    }

    return $image_url;
  }

  /**
   * 获取数据资源的内容
   * @param $data
   * @return string
   */
  public function get_resource_content($data,$attr) {

    if ($data->output != '') {
      $data->clear();
    }

      $result = "";
    $temp_data = new ContentData();
    $this->add_wrapped_div($temp_data,'',$attr['div_class']);
    $tid = $this->get_tid($attr['category']);
    $this->add_wrap($temp_data,'<a href='.$this->get_tag_alias_by_tid($tid).'>','</a>');
    $this->add_image($temp_data,$attr['img'],$attr['name'],'class="'.$attr['img_class'].'"');
    $this->add_head($temp_data,$attr['name'],4,$attr['head_class']);
    $term = taxonomy_term_load($tid);
    $this->add_content($temp_data,'<p class="'.$attr['des_class'].'">'.$term->description.'</p>');

//    print_r($term);

    $this->add_content($data,$this->execute($temp_data));
//    return $this->execute($data);
  }

  /**
   * 获得数据应用的内容
   * @param $data
   * @return string
   */
  public function get_application_content($data) {
    if ($data->output != '') {
      $data->clear();
    }

    $result = "";
    $datas = $this->query_by_tag('数据应用',6);
    $this->add_wrapped_div($data,'','c42');
    foreach ($datas as $item) {
      $temp_data = new ContentData();

      $url =drupal_get_path_alias('node/'.$item->nid);

      $this->add_wrapped_div($temp_data, '', 'c42div');
      $this->add_content($temp_data,'<a href="'.$url.'">');
      $this->add_image($temp_data,$this->get_node_image_url($item->nid) ,'','class="c42img"');
      $this->add_content($temp_data,'</a>');
      $this->add_content($temp_data,'<p class="c42p">'.$item->title.$this->get_button('详细',$url,'c42btn').'</p>');
      $result .= $this->execute($temp_data);
      unset($temp_data);
    }
    $this->add_content($data, $result);
    return $this->execute($data);
  }

  /**
   * 获取数据交易的内容
   */
  public function get_trade_content($data,$head,$attr,$wrapped_class='c52div',$more='') {
    if($more==''){
      $more=$head;
    }
    if ($data->output != '') {
      $data->clear();
    }

    $this->add_wrapped_div($data, '', $wrapped_class);
    $this->add_head($data, $head);
    $datas = $this->query_by_tag($head);
    $output = '';
    $output.=RenderFactory::render_query($datas,$attr);

    $this->add_content($data, $output);
    $this->add_content($data, $this->get_button('更多',$this->get_url_by_tag($more),'c52div_more_btn'));
    return $this->execute($data);
  }

  /**
   * 获得物联感知的内容
   * @param $data
   * @return string
   */
  public function get_perception_content($data) {
    $result = "";
    $datas = $this->query_by_tag('物联感知',3);
    foreach ($datas as $item) {
      $temp_data = new ContentData();

      $this->add_wrapped_div($temp_data, 'perception', 'perception');

      $output = '<img src="' . $this->get_node_image_url($item->nid) . '">';
      $output .= l($item->title, 'node/' . $item->nid) . '';
      $this->add_content($temp_data, $output);
      $result .= $this->execute($temp_data);
      unset($temp_data);
    }
    $this->add_content($data, $result);
    return $this->execute($data);
  }

  /**
   * 添加h.默认h3
   * @param $data ContentData 源数据
   * @param $header string 标题
   * @param string $head h几
   * @return $this
   */
  function add_head($data, $header, $head = '3',$class='') {
    if($class!=''){
      $class = ' class='.$class;
    }
    $this->add_wrap($data, "<h$head".$class.">$header</h$head>");
    return $this;
  }

  function add_image($data, $url, $alt = '',$option='') {
    $url = ' src="' . $url . '"';
    $option=' '.$option;
    if ($alt != '') {
      $alt = ' alt="' . $alt . '"';
    }
    $output = '<img' . $url . $alt . $option.'>';
    $this->add_wrap($data, $output);
    return $this;
  }

  function add_br($data) {
    $this->add_wrap($data, "<br>");
    return $this;
  }

  function add_wrapped_div($data, $id_name = '', $class_name = '',$option='') {
    $this->add_wrap($data, '<div' . ($id_name != '' ? ' id="' . $id_name . '"' : '') . ($class_name != '' ? ' class="' . $class_name . '"' : '') .' '.$option. '>', '</div>');
    return $this;
  }

  function add_content($data, $content = '') {
    $this->add_wrap($data, $content);
    return $this;
  }

  function add_wrap($data, $tag, $close_tag = '') {
    $data->wrapped_tag[$data->layer] = $tag;
    $data->close_tag[$data->layer] = $close_tag;
    $data->layer++;
  }

  function add_long_link($data,$url){
    $this->add_wrap($data,'<a href="'.$url.'">','</a>');
    return $this;
  }

  function execute($data) {
    $data->output = '';
    for ($i = 0; $i < $data->layer; $i++) {
      $data->output .= $data->wrapped_tag[$i];
    }
    for ($i = $data->layer-1; $i >=0 ; $i--) {
      $data->output .= $data->close_tag[$i];
    }
    return $data->output;
  }

  /**
   * 根据分类名称获得more输出
   * @param $category_name
   * @param string $text
   * @return string
   */
  function get_more_links($category_name,$text='更多') {
    return '<div class="more">'.l($text,drupal_get_path_alias('taxonomy/term/' . $this->get_tid($category_name))).'</div>';
  }

  /**
   * 根据分类名称获得more按钮
   * @param $category_name
   * @param string $text
   * @return string
   */
  function get_more_button($category_name,$text='更多',$class='more_btn') {
    return $this->get_button($text,drupal_get_path_alias(drupal_get_path_alias('taxonomy/term/' . $this->get_tid($category_name))),$class);
  }

  function get_button($text,$url,$class=''){
    if($class!=''){
      $class = ' class="'.$class.'"';
    }
    return '<button '.$class.' onclick="javascript:window.location.href=\''.$url.'\';">'.$text.'</button>';
  }


}

class RenderFactory{
  static function render_query($query,$attr){
    switch($attr['theme']){
      case '2':
      case 'simple_ol':
            return self::format_li_simple($query,$attr['max_length'],'ol');
      case '3':
      case 'simple_ul':
            return self::format_li_simple($query,$attr['max_length']);
      case '4':
      case 'time_ul':
            return self::format_li_time($query,$attr['max_length']);
      case '5':
      case 'ordered_ul':
            return self::format_li_order($query,$attr['max_length']);
      default :
            return self::format_simple($query,$attr['max_length']);
    }

  }


  /**
   * 简单的列表
   * @param $query
   * @return string
   */
  static function format_li_simple($query,$max_length, $format='ul'){
    $output = '<'.$format.'>';
    foreach ($query as $item) {
      $output .='<li>'.l(substring_dot($item->title,$max_length), drupal_get_path_alias('node/' . $item->nid)).'</li>';
    }
    $output .='</'.$format.'>';
    return $output;
  }

  /**
   * 简单的排序表
   * @param $query
   * @return string
   */
  static function format_li_order($query,$max_length, $format='ul'){
    $output = '<'.$format.'>';
    $counter = 1;
    foreach ($query as $item) {
      $output .='<li>'.l($counter.'、'.substring_dot($item->title,$max_length), drupal_get_path_alias('node/' . $item->nid)).'</li>';
      $counter++;
    }
    $output .='</'.$format.'>';
    return $output;
  }

  /**
   * 简单的列表
   * @param $query
   * @return string
   */
  static function format_li_time($query,$max_length, $format='ul'){
    $output = '<'.$format.'>';
    foreach ($query as $item) {
      $output .='<li><span>'.date("[Y-m-d]", $item->created).'</span>'.l(substring_dot($item->title,$max_length), drupal_get_path_alias('node/' . $item->nid)).'</li>';
    }
    $output .='</'.$format.'>';
    return $output;
  }


  /**
   * 简单的把数据取出来
   * @param $query
   * @return string 返回HTML
   */
  static function format_simple($query,$max_length){
    $output = '';
    foreach ($query as $item) {
      $output .='<br>'.l(substring_dot($item->title,$max_length), drupal_get_path_alias('node/' . $item->nid));
    }
    return $output;
  }

}

/**
 * 截取字符串并且用剩余长度补全
 * @param $string
 * @param int $count
 * @param string $fill
 * @return string
 */
function substring_dot($string,$count=15,$fill='...'){
  if($count<1){
    return $string;
  }
  if(mb_strlen($string)>$count){
    return mb_substr($string,0,$count,'utf-8').$fill;
  }
  return $string;
}

function get_blocks($info, $cache = DRUPAL_CACHE_PER_ROLE) {
  return array('info' => $info, $cache);
}

