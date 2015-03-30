<?php
	$url 	= explode( '/', $_SERVER['REQUEST_URI'] );
	$page = array();
	if( isset( $url[1] ) && $url[1] != '' ) {
		$page['page'] 		= $url[1];
	} elseif( isset( $url[1] ) && $url[1] == '' ) {
		$page['page'] = 'home';	
	}
	if( isset( $url[2] ) && $url[2] != '' ) $page['action'] 	= $url[2];
	if( isset( $url[3] ) && $url[3] != '' ) $page['action2'] 	= $url[3];
