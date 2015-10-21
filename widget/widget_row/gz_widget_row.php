<?php

/**
* Lib custom by GiaLinh
**/

// Creating the widget 

class gz_widget_row extends WP_Widget {



function __construct() {

parent::__construct(

// Base ID of your widget

'gz_widget_row', 



// Widget name will appear in UI

__('Chia cột cho widget', 'gz'), 



// Widget description

array( 'description' => __( 'Widget chia cột cho widget khác', 'gz' ), ) 

);

}



// Creating widget front-end

// This is where the action happens

public function widget( $args, $instance ) {

 $row = empty($instance['row']) ? '' : $instance['row'];




?>

<?php 

if($row=='span1first')
{
	echo '<div class="row container  "><div class="column span-1 ">';
}
if($row=='span2first')
{
	echo '<div class="row container  "><div class="column span-2 ">';
}
if($row=='span3first')
{
	echo '<div class="row container  "><div class="column span-3">';
}
if($row=='span4first')
{
	echo '<div class="row container  "><div class="column span-4 ">';
}
if($row=='span5first')
{
	echo '<div class="row container  "><div class="column span-5 ">';
}
if($row=='span6first')
{
	echo '<div class="row container  "><div class="column span-6 ">';
}
if($row=='span7first')
{
	echo '<div class="row container  "><div class="column span-7 ">';
}
if($row=='span8first')
{
	echo '<div class="row container  "><div class="column span-8 ">';
}
if($row=='span9first')
{
	echo '<div class="row container  "><div class="column span-9 ">';
}
if($row=='span10first')
{
	echo '<div class="row container  "><div class="column span-10 ">';
}
if($row=='span11first')
{
	echo '<div class="row container  "><div class="column span-11">';
}




if($row=='span1')
{
	echo '</div><div class="column span-1 ">';
}
if($row=='span2')
{
	echo '</div><div class="column span-2 ">';
}
if($row=='span3')
{
	echo '</div><div class="column span-3">';
}
if($row=='span4')
{
	echo '</div><div class="column span-4 ">';
}
if($row=='span5')
{
	echo '</div><div class="column span-5 ">';
}
if($row=='span6')
{
	echo '</div><div class="column span-6 ">';
}
if($row=='span7')
{
	echo '</div><div class="column span-7 ">';
}
if($row=='span8')
{
	echo '</div><div class="column span-8 ">';
}
if($row=='span9')
{
	echo '</div><div class="column span-9 ">';
}
if($row=='span10')
{
	echo '</div><div class="column span-10 ">';
}
if($row=='span11')
{
	echo '</div><div class="column span-11">';
}




if($row=='cuoi')
{
	echo '</div></div>';
}

?>


<?php


}

		

// Widget Backend 

public function form( $instance ) {



if ( isset( $instance[ 'row' ] ) ) {
     $row = esc_attr($instance['row']); 
}
else {
$row = __('', 'gz' );
}






// Widget admin form

?>

<p>Vui lòng chọn một cột tương ứng (12 cột)</p>
 <p>
      <label for="<?php echo $this->get_field_id('text'); ?>">Cột muốn chia: 
        <select class='widefat' id="<?php echo $this->get_field_id('row'); ?>"
                name="<?php echo $this->get_field_name('row'); ?>" type="text">
          <option value='span1first'<?php echo ($row=='span1first')?'selected':''; ?>>
            Span 1 đầu tiên
          </option>
          <option value='span2first'<?php echo ($row=='span2first')?'selected':''; ?>>
            Span 2 đầu tiên
          </option> 
          <option value='span3first'<?php echo ($row=='span3first')?'selected':''; ?>>
            Span 3 đầu tiên
          </option> 
          <option value='span4first'<?php echo ($row=='span4first')?'selected':''; ?>>
            Span 4 đầu tiên
          </option> 
          <option value='span5first'<?php echo ($row=='span5first')?'selected':''; ?>>
            Span 5 đầu tiên
          </option> 
          <option value='span6first'<?php echo ($row=='span6first')?'selected':''; ?>>
            Span 6 đầu tiên
          </option> 
          <option value='span7first'<?php echo ($row=='span7first')?'selected':''; ?>>
            Span 7 đầu tiên
          </option> 
          <option value='span8first'<?php echo ($row=='span8first')?'selected':''; ?>>
            Span 8 đầu tiên
          </option> 
          <option value='span9first'<?php echo ($row=='span9first')?'selected':''; ?>>
            Span 9 đầu tiên
          </option> 
          <option value='span10first'<?php echo ($row=='span10first')?'selected':''; ?>>
            Span 10 đầu tiên
          </option> 
          <option value='span11first'<?php echo ($row=='span11first')?'selected':''; ?>>
            Span 11 đầu tiên
          </option> 


          <option value='span1'<?php echo ($row=='span1')?'selected':''; ?>>
            Span 1
          </option>
          <option value='span2'<?php echo ($row=='span2')?'selected':''; ?>>
            Span 2
          </option> 
          <option value='span3'<?php echo ($row=='span3')?'selected':''; ?>>
            Span 3
          </option> 
          <option value='span4'<?php echo ($row=='span4')?'selected':''; ?>>
            Span 4
          </option> 
          <option value='span5'<?php echo ($row=='span5')?'selected':''; ?>>
            Span 5
          </option> 
          <option value='span6'<?php echo ($row=='span6')?'selected':''; ?>>
            Span 6
          </option> 
          <option value='span7'<?php echo ($row=='span7')?'selected':''; ?>>
            Span 7
          </option> 
          <option value='span8'<?php echo ($row=='span8')?'selected':''; ?>>
            Span 8
          </option> 
          <option value='span9'<?php echo ($row=='span9')?'selected':''; ?>>
            Span 9
          </option> 
          <option value='span10'<?php echo ($row=='span10')?'selected':''; ?>>
            Span 10
          </option> 
          <option value='span11'<?php echo ($row=='span11')?'selected':''; ?>>
            Span 11
          </option> 
        


          <option value='cuoi'<?php echo ($row=='cuoi')?'selected':''; ?>>
            Cuối cùng
          </option>

        </select>                
      </label>
     </p>
<?php 

}

	

// Updating widget replacing old instances with new

public function update( $new_instance, $old_instance ) {

$instance = array();

 $instance['row'] = $new_instance['row'];



return $instance;

}

} // Class gz_widget_row ends here



// Register and load the widget

function gz_load_widget_row() {

	register_widget( 'gz_widget_row' );

}

add_action( 'widgets_init', 'gz_load_widget_row' );



?>
