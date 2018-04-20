<?php
error_reporting(0);

	class person{
		
		public $name,$age;
		public function __construct($name,$age){
		 	$this->name = $name;
		 	$this->age  = $age;
		}
		public function personinfo(){
			echo " Nmae is = {$this->name}  age is = {$this->age}  <br/>";
		}
	}

	$person1 = new person("Rahat",123);
	$person1->personinfo();

	$person2 = new person("Sajjad",223);
	$person2->personinfo();

	$person3 = new person("Kamal",1323);
	$person3->personinfo();

	$person4 = new person("Jamal",1423);
	$person4->personinfo();
?>