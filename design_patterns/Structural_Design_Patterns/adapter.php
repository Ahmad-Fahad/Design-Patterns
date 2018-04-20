<?php

	class Book {

		private $author;
		private $title;

		public function __construct($author, $title) {

			$this->author = $author;
			$this->title  = $title;
		}

		public function getAuthor() {

			return $this->author;
		}

		public function getTitle() {

			return $this->title;
		}
	}

    interface BookInfo {

    	public function get_Author_Title();
    }

	class BookAdapter implements BookInfo {

		private $book;

		public function __construct(Book $book) {

			$this->book = $book;
		}

		public function get_Author_Title() {

			echo "<h3>Book name : ".$this->book->getAuthor()."   and <br /><h4> by  </h4><br />".$this->book->getTitle();
		}
	}


	$bk = new Book("Head first design patterns", "By Bert Bates, Kathy Sierra, Eric Freeman, Elisabeth Robson");

	$bkadapter = new BookAdapter($bk);

	$bkadapter->get_Author_Title(); 

?>