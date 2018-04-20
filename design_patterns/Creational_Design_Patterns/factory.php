<?php
error_reporting(0);

	class A {

		private $attribute_1;
		private $attribute_2;

		public function __construct($attribute_1, $attribute_2) {
			$this->attribute_1 = $attribute_1;
			$this->attribute_2 = $attribute_2;
		}

		public function method() {
			echo "The attributes are : ".$this->attribute_1."   and ".$this->attribute_2;
		}
	}

	class B {

	}

	class C {

	}
/*
===========================================================

Object factory class

===========================================================
*/
	class objectCreator {

		public static $className;

		public static function setClass($className) {
			self::$className = $className;
		}

		public static function createObject($attribute_1, $attribute_2) {

			if(self::$className == "A") {
				return new A($attribute_1, $attribute_2);
			}



			else if(self::$className == "B") {
				return new B($attribute_1, $attribute_2);
			}
			else if(self::$className == "C") {
				return new C($attribute_1, $attribute_2);
			}
			
			
		}
	}

/*
===========================================================

Call the classes

===========================================================
*/
	objectCreator::setClass("A");

	$obj = objectCreator::createObject("Asad", "Putin");

	$obj->method();

?>