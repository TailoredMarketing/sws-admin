<?php
	header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache, must-revalidate');
	
	require( '../inc/config.php' );
	
	$query = "SELECT * FROM client ORDER BY clientName ASC";
	$result = $db->query( $query );
	
	$output = array();
	
	while( $item = $result->fetch_assoc() ) {
		$output[$item['clientID']] = array (
			'clientID' 		=> $item['clientID'],
			'clientName' 	=> $item['clientName'],
			'clientEmail' 	=> $item['clientEmail'],
			'clientActive'	=> $item['clientActive'],
			'clientCreated'	=> $item['clientCreated'],
		);		
	}
	
	echo json_encode( (object) $output );