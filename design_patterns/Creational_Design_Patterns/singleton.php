<?php
error_reporting(0);

   class Singleton {

      public static function getInstance() {

         static $instance = null;

         if(null === $instance) {

            $instance = new static();

            echo "First time instantiation<br />";
         }
         else {
            echo "Returning the Old instance<br />";
         }
         return $instance;

      }
   }

   Singleton::getInstance();
   Singleton::getInstance();
   Singleton::getInstance();
   Singleton::getInstance();
   Singleton::getInstance();

?>