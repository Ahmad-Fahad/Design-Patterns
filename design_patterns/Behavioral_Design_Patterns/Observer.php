<?php


/*
____________________________________________

Push : Observer to subject

	   Spy to Cmap
___________________________________________

*/


	class Observer {

		private $subjectes = array();

		public function add(Subject $subject) {

			array_push($this->subjectes, $subject);

		}

		public function updateValue($parameter) {   // this will done in different situations in program

			if($parameter == 1) {

				$this->notify(rand(23.99, 199.42));
			}
			else {
				echo "Nothing is updated in Observer <br />";
			}

			
		}

		public function notify($value) {

			foreach ($this->subjectes as $subject) {

				$subject->update($value + rand(23.99, 199.42));
			}
		}
	}

	interface Subject {

		public function update($value);

	}

	class Subject_1 implements Subject {

		private $value;

		public function __construct($value) {

			$this->value = $value;

			echo "<pre>Initial value (In Subject_1) = ".$value."</pre>";
		}

		public function update($value) {

			$this->value = $value;

			echo "<pre>(Subject_1)....updated Value = ".$this->value."</pre>";
		}
	}

	class Subject_2 implements Subject {

		private $value;

		public function __construct($value) {

			$this->value = $value;

			echo "<pre>Initial value (In Subject_2) ".$value."</pre>";
		}

		public function update($value) {

			$this->value = $value;

			echo "<pre>(Subject_2)....updated Value = ".$this->value."</pre>";

		}
	}


	$observer = new Observer();


	$subject_1 = new Subject_1(100.99);

	$subject_2 = new Subject_2(200.99);


	$observer->add($subject_1);

	$observer->add($subject_2);

	echo "<hr>";

	$observer->updateValue(1);

	echo "<hr>";

	$observer->updateValue(0);


	echo "<hr>";

	$observer->updateValue(1);

?>