<?php


/**
____________________________________________

Push : Observer to subject

	   Spy to Cmap
___________________________________________

*/

	interface Subject {

		public function add(Observer $observer);
		public function notify($value);

	}

	class Subject_1 implements Subject {

		private $observers = array();

		public function add(Observer $observer) {

			array_push($this->observers, $observer);

		}

		public function updateValue($parameter) {   // this will done in different situations in program

			if($parameter == 1) {

				$this->notify(rand(23.99, 199.42));
			}
			else {
				echo "Nothing is updated in Target <br />";
			}

			
		}

		public function notify($value) {

			foreach ($this->observers as $observer) {

				$observer->update($value + rand(23.99, 199.42));
			}
		}
	}

	interface Observer {

		public function update($value);

	}

	class Observer_1 implements Observer {

		private $value;

		public function __construct($value) {

			$this->value = $value;

			echo "<pre>Initial value (In Subject_1) = ".$this->value."</pre>";
		}

		public function update($value) {

			$this->value = $value;

			echo "<pre>(Subject_1)....updated Value = ".$this->value."</pre>";
		}
	}

	class Observer_2 implements Observer {

		private $value;

		public function __construct($value) {

			$this->value = $value;

			echo "<pre>Initial value (In Subject_2) ".$this->value."</pre>";
		}

		public function update($value) {

			$this->value = $value;

			echo "<pre>(Subject_2)....updated Value = ".$this->value."</pre>";

		}
	}


	$subject_1 = new Subject_1();


	$observer_1 = new Observer_1(100.99);

	$observer_2 = new Observer_2(200.99);

	$subject_1->add($observer_1);

	$subject_1->add($observer_2);

	echo "<hr>";

	$subject_1->updateValue(1);

	echo "<hr>";

	$subject_1->updateValue(0);


	echo "<hr>";

	$subject_1->updateValue(1);

?>