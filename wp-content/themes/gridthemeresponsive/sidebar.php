    <?PHP 
	$data = get_post_custom(); 
	//echo "<pre>";	print_r($data['sidebartitle'][0]);	echo "</pre>";
	?>
	<div id="sidebar">
    
        <?php 
		echo (!empty($data['sidebartitle'][0])? '<div class="side_box"><h3>'.$data['sidebartitle'][0].'</h3></div>' : '');	
		echo (!empty($data['sidebartext'][0])? '<div><p>'.$data['sidebartext'][0].'</p></div>' : '');	
		
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) :  
			
		?>       
                    
           
        <?php endif; ?>                

    </div>