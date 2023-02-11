<?php
	$lowerCase = 'abcdefghijklmnopqrstuvwxyz';
	$upperCase = strtoupper($lowerCase);
	$number = '0123456789';
	$special = '!@#$%^&*()_+,.<>/?;:"[]{}\|';
	function checkPasswordSecurity($chars){
        $a = false;
        $b = false; 
        $c = false;
        $d = false;
        global $lowerCase, $upperCase, $number, $special;
		if(strlen($chars)<8){
			return "Too short";
		}
		$length = strlen($lowerCase);
		for ($index = 0; $index < $length; $index++) {
			if(strpos($chars, $lowerCase[$index]) !== false){
                $a = true;
				break;
			}
		}
		$length = strlen($upperCase);
		for ($index = 0; $index < $length; $index++) {
			if(strpos($chars, $upperCase[$index]) !== false){
                $b = true;
				break;
            }
		}
		$length = strlen($number);
		for ($index = 0; $index < $length; $index++) {
			if(strpos($chars, $number[$index]) !== false){
                $c = true;
				break;
			}
		}
		$length = strlen($special);
		for ($index = 0; $index < $length; $index++) {
			if(strpos($chars, $special[$index]) !== false){
                $d = true;
				break;
			}
		}
		if($a && $b && $c && $d){
            return "Secure";
        } else{
            return "Unsecure";
        }
	}
?>