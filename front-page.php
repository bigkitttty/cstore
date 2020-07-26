<?php 
	
if(is_home()){
	get_template_part('index');
}else{
	get_template_part('templates/homepage');
}