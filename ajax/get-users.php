<?php
	header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache, must-revalidate');
	
	require( '../inc/config.php' );
	
	$query = "SELECT * FROM user ORDER BY userName ASC";
	$result = $db->query( $query );
	
	$output = array();
	
	while( $item = $result->fetch_assoc() ) {
		$output[$item['userID']] = array (
			'userID' 		=> $item['userID'],
			'userName' 		=> $item['userName'],
			'userEmail' 	=> $item['userEmail'],
			'userPass' 		=> $item['userPass'],
			'userType' 		=> $item['userType'],
		);		
	}
	
	echo json_encode( (object) $output );