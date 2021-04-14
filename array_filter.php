<?php

function array_filter($array) {
	if( empty($array) || count($array) <= 0 ) 
		return;
	else {
		$arr = [];

		foreach ($array as $key => $value) {
			if( !empty($value) ) {
				$arr[$key] = $value;
			}
		}
		return $arr;
	}
}