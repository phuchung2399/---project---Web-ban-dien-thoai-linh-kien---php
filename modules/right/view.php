<?php
<br />
&lt;?php<br />
/*<br />
 Plugin Name: PostView<br />
 Plugin Author: ThachPham<br />
 Description: Plugin đếm lượt xem bài viết và hiển thị top bài xem nhiều<br />
 Version: 1.0<br />
 Author URI: https://thachpham.com<br />
 */</p>
<p>// Set post view<br />
function postview_set($postID) {<br />
    $count_key = 'postview_number';<br />
    $count = get_post_meta($postID, $count_key, true);<br />
    if($count==''){<br />
        $count = 0;<br />
        delete_post_meta($postID, $count_key);<br />
        add_post_meta($postID, $count_key, '0');<br />
    }else{<br />
        $count++;<br />
        update_post_meta($postID, $count_key, $count);<br />
    }<br />
}<br />
// Get post view<br />
function postview_get($postID){<br />
    $count_key = 'postview_number';<br />
    $count = get_post_meta($postID, $count_key, true);<br />
    if($count==''){<br />
        delete_post_meta($postID, $count_key);<br />
        add_post_meta($postID, $count_key, '0');<br />
        return &quot;0 lượt xem&quot;;<br />
    }<br />
    return $count.' lượt xem';<br />
}</p>
<p>remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);</p>
<p>/* Tạo widget hiển thị bài xem nhiều<br />
 * @tham khảo tại http://bit.ly/1tY8TFn<br />
 */</p>
<p>function create_topview_widget() {<br />
    register_widget( 'TopView_Widget' );<br />
}<br />
add_action( 'widgets_init', 'create_topview_widget' );</p>
<p>class TopView_Widget extends WP_Widget {</p>
<p>    /*<br />
     * Thiết lập tên widget và description của nó (Appearance -&gt; Widgets)<br />
     */<br />
    function TopView_Widget() {<br />
        $options = array(<br />
           'classname' =&gt; 'topview',<br />
            'description' =&gt; 'Xem bài viết xem nhiều nhất'<br />
        );<br />
        $this-&gt;WP_Widget('topview', 'Top View', $options);<br />
    }</p>
<p>    /*<br />
     * Tạo form điền tham số cho widget<br />
     * ở đây ta có 3 form là title, postnum (số lượng bài) và postdate (tuổi của bài<br />
     */<br />
    function form($instance) {<br />
        $default = array(<br />
            'title' =&gt; 'Bài xem nhiều nhất',<br />
            'postnum' =&gt; 5,<br />
            'postdate' =&gt; 30<br />
        );<br />
        $instance = wp_parse_args( (array) $instance, $default );<br />
        $title = esc_attr( $instance['title'] );<br />
        $postnum = esc_attr( $instance['postnum'] );<br />
        $postdate = esc_attr( $instance['postdate'] );</p>
<p>        echo &quot;&lt;label&gt;Tiêu đề:&lt;/label&gt; &lt;input class='widefat' type='text' name='&quot;.$this-&gt;get_field_name('title').&quot;' value='&quot;.$title.&quot;' /&gt;&quot;;<br />
        echo &quot;&lt;label&gt;Số lượng bài viết:&lt;/label&gt; &lt;input class='widefat' type='number' name='&quot;.$this-&gt;get_field_name('postnum').&quot;' value='&quot;.$postnum.&quot;' /&gt;&quot;;<br />
        echo &quot;&lt;label&gt;Độ tuổi của bài viết (ngày)&lt;/label&gt; &lt;input class='widefat' type='number' name='&quot;.$this-&gt;get_field_name('postdate').&quot;' value='&quot;.$postdate.&quot;' /&gt;&quot;;<br />
    }</p>
<p>    /*<br />
     * Cập nhật dữ liệu nhập vào form tùy chọn trong database<br />
     */<br />
    function update($new_instance, $old_instance) {<br />
        $instance = $old_instance;<br />
        $instance['title'] = strip_tags($new_instance['title']);<br />
        $instance['postnum'] = strip_tags($new_instance['postnum']);<br />
        $instance['postdate'] = strip_tags($new_instance['postdate']);<br />
        return $instance;<br />
    }</p>
<p>    function widget($args, $instance) {<br />
        global $postdate; // Thiết lập biến $postdate là biến toàn cục để dùng ở hàm filter_where<br />
        extract( $args );<br />
        $title = apply_filters( 'widget_title', $instance['title'] );<br />
        $postnum = $instance['postnum'];<br />
        $postdate = $instance['postdate'];</p>
<p>        echo $before_widget;<br />
        echo $before_title.$title.$after_title;</p>
<p>        $query_args = array(<br />
            'posts_per_page' =&gt; $postnum,<br />
            'meta_key' =&gt; 'postview_number',<br />
            'orderby' =&gt; 'meta_value_num',<br />
            'order' =&gt; 'DESC',<br />
            'ignore_sticky_posts' =&gt; -1<br />
        );</p>
<p>        /*<br />
         * Cách lấy bài viết theo độ tuổi (-30 days = lấy bài được 30 ngày tuổi)<br />
         * @tham khảo tại http://bit.ly/1y7WXFp<br />
         */<br />
        function filter_where( $where = '' ) {<br />
            global $postdate;<br />
            $where .= &quot; AND post_date &gt; '&quot; . date('Y-m-d', strtotime('-'.$postdate.' days')) . &quot;'&quot;;<br />
            return $where;<br />
        }<br />
        add_filter( 'posts_where', 'filter_where' );</p>
<p>        $postview_query = new WP_Query( $query_args );</p>
<p>        remove_filter( 'posts_where', 'filter_where' ); // Xóa filter để tránh ảnh hưởng đến query khác</p>
<p>        if ($postview_query-&gt;have_posts() ) :<br />
            echo &quot;&lt;ul&gt;&quot;;<br />
            while ( $postview_query-&gt;have_posts() ) :<br />
                $postview_query-&gt;the_post(); ?&gt;</p>
<p>                    &lt;li&gt;<br />
                        &lt;?php /* Bỏ comment nếu muốn hiện thumbnail<br />
                            if ( has_post_thumbnail() )<br />
                                the_post_thumbnail( 'thumbnail' );<br />
                            else<br />
                                echo &quot;&lt;/br&gt;&lt;img src='https://dummyimage.com/50/000/fff&amp;text=thach'&gt;&quot;;<br />
                            */<br />
                        ?&gt;<br />
                        &lt;a href=&quot;&lt;?php the_permalink(); ?&gt;&quot;&gt;&lt;?php the_title(); ?&gt;&lt;/a&gt;<br />
                    &lt;/li&gt;</p>
<p>            &lt;?php endwhile;<br />
            echo &quot;&lt;/ul&gt;&quot;;<br />
            endif;<br />
            echo $after_widget;<br />
    }<br />
}</p>
<p>/*<br />
 * Chèn CSS của plugin vào theme<br />
 */<br />
function custom_styles() {</p>
<p>       wp_register_style( 'topview-css', plugins_url( 'styles.css', __FILE__ ) , false, false, 'all' );<br />
        wp_enqueue_style( 'topview-css' );</p>
<p>}<br />
add_action( 'wp_enqueue_scripts', 'custom_styles' );<br />
?>