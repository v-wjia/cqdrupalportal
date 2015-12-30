<?php
/**
 * Created by PhpStorm.
 * User: RachelWaffle
 * Date: 15/12/23
 * Time: 下午2:40
 */





class ContentData{
    public $output='';
    public $wrapped_tag = array();
    public $close_tag=array();
    public $layer = 0;

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        unset($this->output);
        unset($this->wrapped_tag);
        unset($this->close_tag);
        unset($this->layer);
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




    function query_resource()
    {
        $query = db_select('node', 'n')->fields('n', array('title', 'nid', 'created'))
            ->condition('status', 1)->orderBy('created', 'DESC')->execute();
        return $query;
    }

    public function get_trade_content($data)
    {

        if($data->output!=''){return $data->output;}

        $this->add_wrapped_div($data,'trade','trade');
        $this->add_head($data,'数据资源');
        $output="<ul>";
        $datas = $this->query_resource();
        foreach ($datas as $item) {
            $output .= '<li>' . l($item->title, 'node/' . $item->nid) . '</li><br>';
        }
        $output.='</ul>';
        $this->add_content($data,$output);
        $this->add_wrapped_div($data,'more');
        $this->add_content($data,'<a href="https://www.baidu.com">更多</a>');
        return $this->execute($data);
    }

    public function get_resource_content($data)
    {

        if($data->output!=''){return $data->output;}

        $this->add_wrapped_div($data,'resource','resource');
        $this->add_image($data,'demo.png','不买不是人')->add_br($data);
        $this->add_head($data,'交通引导',4)->add_br($data);
        $this->add_content($data,"<p>&nbsp;&nbsp;可以引导交通到必要的轨道上</p>");
        return $this->execute($data);

    }

    public function get_application_content($data){
        if($data->output!=''){return $data->output;}

        $this->add_wrapped_div($data,'application','application');
        $this->add_image($data,'test_img.png','不买不是人')->add_br($data);
        $this->add_wrapped_div($data,'more');
        $this->add_content($data,'<a href="https://www.baidu.com">更多</a>');
        return $this->execute($data);
    }

    public function get_perception_content($data){
        if($data->output!=''){return $data->output;}

        $this->add_wrapped_div($data,'perception','perception');
        $this->add_image($data,'test_img2.png','不买不是人')->add_br($data);
        $this->add_head($data,'物联感知');
        return $this->execute($data);
    }

    /**
     * 添加h.默认h3
     * @param $data ContentData 源数据
     * @param $header string 标题
     * @param string $head h几
     * @return $this
     */
    function add_head($data, $header, $head='3'){
        $this->add_wrap($data,"<h$head>$header<br></h$head>");
        return $this;
    }

    function add_image($data,$url,$alt=''){
        $url = ' src="'.$url.'"';
        if($alt!=''){$alt=' alt="'.$alt.'"';}
        $output= '<img'.$url.$alt.'>';
        $this->add_wrap($data,$output);
        return $this;
    }

    function add_br($data){
        $this->add_wrap($data,"<br>");
        return $this;
    }

    function add_wrapped_div($data,$id_name='', $class_name=''){
        $this->add_wrap($data,'<div'.($id_name!=''?' id="'.$id_name.'"':'').($class_name!=''?' class="'.$class_name.'"':'').'>','</div>');
        return $this;
    }

    function add_content($data,$content=''){
        $this->add_wrap($data,$content);
        return $this;
    }

    function add_wrap($data,$tag,$close_tag=''){
        $data->wrapped_tag[$data->layer]=$tag;
        $data->close_tag[$data->layer]=$close_tag;
        $data->layer++;
    }

    function execute($data){
        $data->output='';
        for($i = 0 ;$i< $data->layer;$i++){
            $data->output.=$data->wrapped_tag[$i];
        }
        for($i = 0 ;$i< $data->layer;$i++){
            $data->output.=$data->close_tag[$i];
        }
        return $data->output;
    }
}

function get_blocks($info, $cache = DRUPAL_CACHE_PER_ROLE)
{
    return array('info' => $info, $cache);
}
