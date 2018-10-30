<?php
	$db = new mysqli('localhost', 'root', '', 'app');
	
	if($db->connect_error){
		die('Sorry, Site under Maintenance <br/>');
	}else{
	}
?>