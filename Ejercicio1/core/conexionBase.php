<?php

    class conexionBase{

        private $hostname = HOST_NAME;
 	    private $database = DATABASE_NAME;
 	    private $user = USER;
 	    private $password = PASSWORD;
        
        private $dbh; 
        private $stmt; //para consultas
        private $error;
   
        public function __construt(){ 
        
            $dbn='mysql:host' .$this->hostmane .';dbname' .$this->database;
        
            $opciones = array(
                PDO::ATTR_PERSISTENT=> true,
                PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION
            );

        
            //crea instancia de PDO
        try{

			$this->dbh= new PDO($dbn, $this->user, $this->password, $opciones);
			$this->dbh->exec('SET NAMES '.$this->charset);

			echo 'Conexión exitosa';


		}catch (PDOException $ex){

			$this->$error= $ex->getMessage();
			echo $this->$error;

		}
	}

}
?>