<?php

function kpre($val){
	echo count($val);
	echo "<pre>";
	print_r($val);
}

function sel($o,$t){
	if($o == $t){
		echo "selected";
	}
}

function che($o,$t){
	if($o == $t){
		echo "checked";
	}
}

function chek_array($cvalue,$json){
	if($json != 'null')
	{
		$array = json_decode($json);
		foreach ($array as $key => $value) {
			if($value[0] == $cvalue){
				return ["checked",$value[1]];
				break;
			}
		}

		return ['',''];
	}
}

function deleteDir($path) {
    return is_file($path) ?
            @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
}

function numberTowords($num)
{
    $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    return $f->format($num);
}

?>