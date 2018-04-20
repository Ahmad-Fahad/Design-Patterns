<?php
	
	function A() {

		static $a = 0;

		$a++;

		echo $a."<br />";
	}
	function B() {

			$a = 0;

			$a++;

			echo $a."<br />";
		}

	A();
	A();
	A();
	A();
	A();
	A();
	echo "=================<br />";
	B();
	B();
	B();
	B();
	B();
	B();
	B();
	B();


?>