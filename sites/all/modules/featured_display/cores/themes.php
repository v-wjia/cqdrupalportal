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

class ContentGetter {


  /**
   * Implements hook_action_info().
   */
  function business_fours_add($variables) {
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
  function get_tid($category_name) {
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


  function get_tag_alias($category_name) {
    $tag_id = $this->get_tid($category_name);
    $query = db_select('url_alias', 'n')
      ->fields('n', array('alias'))
      ->condition('source', 'taxonomy/term/' . $tag_id)
      ->execute();
    $tag_alias = 'node';
    foreach ($query as $alias) {
      $tag_alias = $alias->alias;
    }
    return $tag_alias;
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
    ));
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
   * 获取数据交易的内容
   */
  public function get_trade_content($data) {

    if ($data->output != '') {
      $data->clear();
    }

    $this->add_wrapped_div($data, 'trade', 'trade');
    $this->add_head($data, '数据交易');
    $output = "<ul>";
    $datas = $this->query_by_tag('数据交易');
    foreach ($datas as $item) {
      $output .= '<li>' . l($item->title, 'node/' . $item->nid) . '</li><br>';
    }
    $output .= '</ul>';
    $this->add_content($data, $output);
    $this->add_wrapped_div($data, 'more');
    $this->add_content($data, '<a href=/'.drupal_get_path_alias('taxonomy/term/' . $this->get_tid('数据交易')) . '>更多</a>');
    return $this->execute($data);
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
  public function get_resource_content($data) {

    if ($data->output != '') {
      $data->clear();
    }

    $result = "";
    $datas = $this->query_by_tag('数据资源',3);
    foreach ($datas as $item) {
      $temp_data = new ContentData();

      $this->add_wrapped_div($temp_data, 'resource', 'resource');

      $output = '<img src="' . $this->get_node_image_url($item->nid) . '"><br>';
      $output .= l($item->title, 'node/' . $item->nid) . '<br>';
      $this->add_content($temp_data, $output);
      $result .= $this->execute($temp_data);
      unset($temp_data);
    }
    $this->add_content($data, $result);
    return $this->execute($data);


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
    foreach ($datas as $item) {
      $temp_data = new ContentData();

      $this->add_wrapped_div($temp_data, 'application', 'application');

      $output = '<img src="' . $this->get_node_image_url($item->nid) . '"><br>';
      $output .= l($item->title, 'node/' . $item->nid) . '<br>';
      $this->add_content($temp_data, $output);
      $result .= $this->execute($temp_data);
      unset($temp_data);
    }
    $this->add_content($data, $result);
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

      $output = '<img src="' . $this->get_node_image_url($item->nid) . '"><br>';
      $output .= l($item->title, 'node/' . $item->nid) . '<br>';
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
  function add_head($data, $header, $head = '3') {
    $this->add_wrap($data, "<h$head>$header<br></h$head>");
    return $this;
  }

  function add_image($data, $url, $alt = '') {
    $url = ' src="' . $url . '"';
    if ($alt != '') {
      $alt = ' alt="' . $alt . '"';
    }
    $output = '<img' . $url . $alt . '>';
    $this->add_wrap($data, $output);
    return $this;
  }

  function add_br($data) {
    $this->add_wrap($data, "<br>");
    return $this;
  }

  function add_wrapped_div($data, $id_name = '', $class_name = '') {
    $this->add_wrap($data, '<div' . ($id_name != '' ? ' id="' . $id_name . '"' : '') . ($class_name != '' ? ' class="' . $class_name . '"' : '') . '>', '</div>');
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

  function execute($data) {
    $data->output = '';
    for ($i = 0; $i < $data->layer; $i++) {
      $data->output .= $data->wrapped_tag[$i];
    }
    for ($i = 0; $i < $data->layer; $i++) {
      $data->output .= $data->close_tag[$i];
    }
    return $data->output;
  }
}

function get_blocks($info, $cache = DRUPAL_CACHE_PER_ROLE) {
  return array('info' => $info, $cache);
}
