<?php
	header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache, must-revalidate');
	
	require( '../inc/config.php' );
	
	$query = "SELECT * FROM report";
	$result = $db->query( $query );
	
	$output = array();
	
	while( $item = $result->fetch_assoc() ) {
		$output[$item['reportID']] = array (
			'reportID' 		=> $item['reportID'],
			'reportClient' 	=> $item['reportClient'],
			'reportWork' 	=> $item['reportWork'],
			'reportContract' 	=> $item['reportContract'],
			'reportDate'		=> $item['reportDate'],
			'reportTime'		=> $item['reportTime'],
			'reportTick'		=> json_decode($item['reportTick']),
			'reportUser'		=> $item['reportUser'],
			'reportClientSig'	=> $item['reportClientSig'],
			'reportUserSig'	=> $item['reportUserSig'],
			'reportCreated'	=> $item['reportCreated'],
			'reportUpdated'	=> $item['reportUpdated'],
			
		);		
	}
	
	echo json_encode( (object) $output );