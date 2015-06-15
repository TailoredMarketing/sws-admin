<?php
	
	if( isset( $_REQUEST['msg'] ) ) {
			
	}
	
	function add_query_args( $key, $value, $url ) {
		$output = array();
		$str = parse_url( $url ); 
		parse_str($str['query'], $output);
		$ret = $str['scheme'].'://'.$str['host'];
		if( isset( $str['path'] ) ) 
			$ret .= $str['path'];
		
		$ret .= '?';
		$output[$key] = $value;
		$i = 0;
		foreach( $output as $key=>$value ) {
			if( $i == 0 ) {
				$ret .= $key.'='.$value;
			} else {
				$ret .= '&'.$key.'='.$value;
			}
			$i++;
		}
		return $ret;
	}