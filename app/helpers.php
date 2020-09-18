<?php
if (! function_exists('numhash')) {
	function numhash($n) {
		return (((0x0000FFFF & $n) << 16) + ((0xFFFF0000 & $n) >> 16));
	}
}
if (! function_exists('excerpt')) {
	function excerpt($s, $length = 200) {
		return substr($s, 0, $length);
	}
}
if (! function_exists('shortDateTime')) {
	function shortDateTime($d = null) {
		$date = new DateTime($d);
		$now = new DateTime("now");
		$diff = $date->diff($now);
	    if($diff->y)
	    	return $date->format("M Y");
	    elseif($diff->m)
	    	return $date->format("jS M");
	    elseif($diff->d>7)
	    	return $date->format("jS M");
	    elseif($diff->d)
	    	return $date->format("l, h:iA");
	    elseif($diff->m)
	    	return $date->format("h:iA");
	    return $date->format("h:i:sA");
	}
}