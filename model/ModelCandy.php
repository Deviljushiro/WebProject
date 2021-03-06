<?php


	require_once 'Model.php';

	class ModelCandy extends Model{



		/**
		*Param: array containing the inputed infos for the new candy
		*Return: Nothing
		**/
		public static function addCandy($candy) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('INSERT INTO bonbon (nomBonbon, saveur, marque, prixUnit, description) VALUES (:name, :flavor, :brand, :price, :descr)');

			$req->execute($candy);

			$req->closeCursor();

		}


		/**
		*Param: array containing the id of the candy we want to remove
		*Return: Nothing
		**/
		public static function deleteCandy($candy) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('DELETE FROM bonbon WHERE idBonbon = :id');	//Delete the candy from the DB

			$req->execute($candy);

			$req->closeCursor();

		}


		/**
		* Param: None
		* Return: all the candies in the DB
		**/
		public static function getAllCandies() {

			$bd = self::getDB(); //Connection

			$req = $bd->query('SELECT * FROM bonbon ORDER BY nomBonbon'); //Selection of the total candies counting

			$data = $req->fetchAll(); //List result in array

			$req->closeCursor();

			return $data; //Return the first value of the list

			

		}

		/**
	    *Param: the name of the candy
	    *Return: the number of DB candies with the same name than the candy in parameter
	    **/
	    public static function checkCandyname($name)
	    {
	        $bd = self::getDB(); //Connection

	        $user=array( 'name' => $name ); //Array parameter for the query

	        $req=$bd->prepare('SELECT COUNT(*) FROM bonbon WHERE nomBonbon = :name'); //Count the users with the same username

	        $req->execute($user);

	        $data = $req->fetch();  //Array with the result

	        return $data;
	    }


		/**
		*Param: name used to search in the DB
		*Return: Array with all the datas about target candies
		**/
		public static function SearchByName($search) {

			$bd = self::getDB(); //Conneciton

			$req = $bd->prepare('SELECT * FROM bonbon WHERE nomBonbon LIKE "%":name"%" '); //Prepare the selection

			$req->execute($search); //Execution of the request

			$data = $req->fetchAll(); //List all the result in array

			return $data; //Return the array

			$req->closeCursor();
		}

		/**
		*Param: brand used to search in the DB
		*Return: Array with all the datas about target candies
		**/
		public static function SearchByBrand($search) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('SELECT * FROM bonbon WHERE marque LIKE "%":brand"%" '); //Preparation of the selection

			$req->execute($search); //Execution

			$data = $req->fetchAll(); //List result in array

			return $data; //Return the array

			$req->closeCursor();
		}

		/**
		*Param: flavor used to search in the DB
		*Return: Array with all the datas about target candies
		**/
		public static function SearchByFlavor($search) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('SELECT * FROM bonbon WHERE saveur LIKE "%":flavor"%" '); //Preparation of the selection

			$req->execute($search); //Execution

			$data = $req->fetchAll(); //List result in array

			return $data; //Return the array

			$req->closeCursor();
		}


		/*****************************************
		*****************GETTERS******************
		*****************************************/


		public static function getCandyName($id) {

			try
        	{	
        		//Array containing the ID parameter, will be used for the execution as a parameter
        		$tab=array(
            	'id' => $id
        		); 

				$bd = self::getDB();

				$req = $bd->prepare('SELECT nomBonbon FROM bonbon WHERE idBonbon = :id'); //Preparation of the selection

				$req->execute($tab); //Exection of the request
				$data = $req->fetch();

				return $data;

				$req->closeCursor(); 

			}
        	catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}

		public static function getCandyFlavor($id) {

			try
        	{	
        		//Array containing the ID parameter, will be used for the execution as a parameter
        		$tab=array(
            	'id' => $id
        		);

				$bd = self::getDB(); 

				$req = $bd->prepare('SELECT saveur FROM bonbon WHERE idBonbon = :id'); //Preparation of the selection

				$req->execute($tab); //Execution of the request
				$data = $req->fetch();

				return $data;

				$req->closeCursor(); 

			}
        	catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}

		public static function getCandyBrand($id) {

			try
        	{	
        		//Array containing the ID parameter, will be used for the execution as a parameter
        		$tab=array(
            	'id' => $id
        		); 

				$bd = self::getDB();

				$req = $bd->prepare('SELECT marque FROM bonbon WHERE idBonbon = :id'); //Preparation of the selection 

				$req->execute($tab); //Exection of the request
				$data = $req->fetch();

				return $data;

				$req->closeCursor(); 

			}
        	catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}

		public static function getCandyPrice($id) {

			try
        	{	
        		//Array containing the ID parameter, will be used for the execution as a parameter
        		$tab=array(
            	'id' => $id
        		);

				$bd = self::getDB();

				$req = $bd->prepare('SELECT prixUnit FROM bonbon WHERE idBonbon = :id'); //Preparation of the selection

				$req->execute($tab); //Exection of the request

				$data = $req->fetch();

				return $data;

				$req->closeCursor(); 

			}
        	catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}

		public static function getCandyDesc($id) {

			try
        	{	

        		$tab=array(
            	'id' => $id
        		); //Array containing the ID parameter, will be used for the execution as a parameter

				$bd = self::getDB();

				$req = $bd->prepare('SELECT description FROM bonbon WHERE idBonbon = :id'); //Preparation of the selection

				$req->execute($tab); //Exection of the request
				$data = $req->fetch();

				return $data;

				$req->closeCursor(); 

			}
        	catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}

	}