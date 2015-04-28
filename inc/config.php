<?php
	require( 'class.php' );
	
	$db = array(
			"db_user" => "tailored_sws",
			"db_name" => "tailored_sws",
			"db_host" => "localhost",
			"db_pass" => "Ie*n5xTU??b)");
	
	$db = new mysqli( $db['db_host'], $db['db_user'], $db['db_pass'], $db['db_name'] );
	
	if ($db->connect_errno) {
		echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		die;
	}
	//echo dirname( $_SERVER['REQUEST_URI'] ) ;
	if( dirname( $_SERVER['REQUEST_URI'] ) != '/ajax' ) {
		require( './inc/functions.php' );
		
		$url 	= explode( '/', $_SERVER['REQUEST_URI'] );
		$page = array();
		
		if( isset( $url[1] ) && $url[1] != '' ) {
			$page['page'] 		= $url[1];
		} elseif( isset( $url[1] ) && $url[1] == '' ) {
			$page['page'] = 'home';	
		}
		
		if( isset( $url[2] ) && $url[2] != '' ) $page['action'] 	= $url[2];
		if( isset( $url[3] ) && $url[3] != '' ) $page['action2'] 	= $url[3];
	}