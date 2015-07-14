<?php
	header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache, must-revalidate');
	
	require( '../inc/config.php' );
	
	$query = "SELECT * FROM contract";
	$result = $db->query( $query );
	
	$output = array();
	
	while( $item = $result->fetch_assoc() ) {
		$output[$item['contractID']] = array (
			'contractID' 		=> $item['contractID'],
			'contractClient' 	=> $item['contractClient'],
			'contractNumber' 	=> $item['contractNumber'],
			'contractLocation' 	=> $item['contractLocation'],
			'contractActive'	=> $item['contractActive'],
			'contractCreated'	=> $item['contractCreated'],
			'contractUpdated'	=> $item['contractUpdated'],
			
		);		
	}
	
	echo json_encode( (object) $output );