<?php
error_reporting(0);

interface Strategy {

	public function calculate($a, $b);

}

class GcdCalc implements Strategy {

	public function calculate($a, $b) {

	    while($a != 0)
	    {
	        $d = $a;
	        $a = $b % $a;
	        $b = $d;
	    }
	    echo "<h1>".$b."</h1><br />";
	}
}

class LcmCalc implements Strategy {

	public function calculate($a, $b) {

	    $number1 = $a;
	    $number2 = $b;
	    while($a != 0)
	    {
	        $d = $a;
	        $a = $b % $a;
	        $b = $d;
	    }

	    $lcm = ($number1 * $number2) / $b;

	    echo "<h1>".$lcm."</h1><br /.>";
	}
}

/*
---------------------------------------------------------------------------

Appropriate Object Creation 

---------------------------------------------------------------------------
*/

static $calc = 0;

function calculationType($calcType, $a, $b) {

	if($calcType == "gcd") {

		$calc = new GcdCalc();
	}
	else if($calcType == "lcm") {

		$calc = new LcmCalc();
	}

	$calc->calculate($a, $b);
}

/*
---------------------------------------------------------------------------

Client Interface

---------------------------------------------------------------------------
*/

	calculationType("lcm", 3, 89);

	

/*
---------------------------------------------------------------------------
http://localhost/Design-Patterns/Raw_Codes/strategy.php
---------------------------------------------------------------------------
*/


?>