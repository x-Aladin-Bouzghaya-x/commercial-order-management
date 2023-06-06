<?php
   class connect extends PDO
   {
   	const HOST="localhost";
   	const DB="gestion_commandes";
   	const USER="root";
   	const PW="";

   	public function __construct()
   	{
   		try 
   		{
   			parent::__construct("mysql:dbname=".self::DB.";host=".self::HOST.";user=".self::USER.";password=".self::PW.";");
   			echo "DONE";
   		} 
   		catch (PDOExeption $e) 
   		{
   			echo $e->getMessage()." ".$e->getFile()." ".$e->getLine();
   		}
   	}

   }

?>