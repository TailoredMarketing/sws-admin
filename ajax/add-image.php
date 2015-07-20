<?php
	header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache, must-revalidate');
	
	require( '../inc/config.php' );
	
	$output = array();   
	
	$imageID 		= $db->real_escape_string( $_POST['imageID'] );
	$imageObs 		= $db->real_escape_string( $_POST['imageObs'] );
	$imageData 		= $db->real_escape_string( $_POST['imageData'] );
	
	$query = "INSERT INTO image ( imageID, imageObs, imageData ) VALUES ( '$imageID', '$imageObs', '$imageData' )";
	//echo $query;
	if( $db->query( $query ) ) {
		$output = array(
			'status' => 1
		);
	} else {
		$output = array(
			'status' => 0
		);
	}
		
	echo json_encode( (object) $output );