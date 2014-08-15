<?php
class Fenlei_Title extends WP_Widget {
 
    function Fenlei_Title() {
        $widget_ops = array('classname' => 'widget_categories', 'description' => __( "分类目录+文章标题") );
        //classname是页面显示中widget的class名称
        parent::__construct('fenlei-title', __('分类目录+文章标题'), $widget_ops);
        //第一个参数会是页面显示中widget的id名称，第二个参数为小工具在后台显示的名称
        $this->alt_option_name = 'fenlei_title';   
    }

    function form($instance) {        
        $instance = wp_parse_args((array)$instance, array('title' => '文章归类'));
        $title = htmlspecialchars($instance['title']);
        //htmlspecialchars()的作用是将特殊符号转化为html代码
        echo '<p><label for="'.$this->get_field_id('title').'">标题：<input class="widefat" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" /></label></p>';
        //后台表单的html代码
    }


    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags(stripslashes($new_instance['title']));
        //strip_tags()是去掉html标签，stripslashes()是去掉反斜杠
        return $instance;
    }


    function widget($args, $instance) {
        extract($args);
        //让$args中保存的变量在函数中可直接调用
        $title = apply_filters('widget_title', empty($instance['title'])?'文章归类':$instance['title']);
        //类似add_action()，将参数绑定到hook上，不过该函数有返回值
 
        echo $before_widget;
        if($title) echo $before_title . $title . $after_title;
        //调用sidebar区域的变量        
        //echo '<ol></ol><span><a href="#scroll-top" title="顶部">▲</a></span><span><a href="#scroll-bottom" title="底部">▼</a></span>';
        get_template_part('fenlei_title');
        echo $after_widget;
        //需要实际输出的内容
    }
}

register_widget('Fenlei_Title');

