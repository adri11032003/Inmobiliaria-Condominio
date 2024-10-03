<?php 

	namespace config\connect;
	use \PDO;

	class connectDB{

		public $conex;
		private $puerto;
		private $usuario;
		private $password;
		private $local;
		private $nameDB;

		public function __construct(){
			$this->usuario = 'root';
			$this->password = '';
			$this->local = 'localhost';
			$this->nameDB = 'condominio';
			$this->conectarDB();
		}

		protected function conectarDB(){
			try{
				$this->conex = new \PDO("mysql:host={$this->local};dbname={$this->nameDB}", $this->usuario , $this->password);
			}catch (PDOException $e) {
				print "¡Error!: " . $e->getMessage() . "<br/>";
				die();
			}
		}
 	}
 ?>
 
