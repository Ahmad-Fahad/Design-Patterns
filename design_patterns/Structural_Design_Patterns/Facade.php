<?php

	class Validation {

		public function validate() {
			$sqi = new SqlInjection();
			$bf  = new BruteForce();

			// calculations.......

			return 1;
		}
	}

	class SqlInjection {

	}

	class BruteForce {

	}

	class Database {

		public function getId($user, $pass) {

			$id = 66;

			return $id;
		}
	}

	class BackendCode {

		private function sessionStart() {
			echo "Session is started<br/>";
		}
		public function getData($id) {
			$this->sessionStart();
			$data = array(
				'skill'            => 'Hacker',
				'portfolioProject' => 'Logic Bonb',
				'achievement'      => 'Confidence'
			);
			return $data;
		}
	}

	class HtmlPage {

		public function displayData($data) {
			echo "<center><h3><pre></pre>".print_r($data)."</h3></center>";
			return 1;
		}
	}

	/*...................Object creation in backend.............................*/
	class Facade {

		public function login($user, $pass) {

			$flag = 0;

			$vdFlag = 0;
			$vd = new Validation();
			$vdflag = $vd->validate($user, $pass);

			if($vdflag == 1) {

				$id = 0;
				$db = new Database();
				$id = $db->getId($user, $pass);
				if($id > 0) {

					$getData = array();
					$beCode  = new BackendCode();
					$getData = $beCode->getData($id);

					if(count($getData) > 0) {
						$success = 0;
						$hp = new HtmlPage();
						$success = $hp->displayData($getData);

						if($success == 1) {

							$flag = 1;
						}
						else {

							$flag = 0;

						}
					}
				}
			}

			return $flag;
		}

	}

	/*...................Client Engineer Interface.............................*/

	$username = "xyz";   // found from post method
	$password = "abc";   // found from post method

	$object = new Facade();

	$flag = $object->login($username, $password);

	if($flag == 1) {

		echo "<center><h1>Loged In Successful</h1></center><br />";
	}
	else {

		echo "<center><h1>Log In fail </h1></center><br />";
	}



?>