<?php
    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $dbname = DB_NAME;

        private $dbh;
        private $statement;
        private $error;

        public function __construct(){
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //Instantiate PDO
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //Prepared statment
        public function query($sql){
            $this->statement = $this->dbh->prepare($sql);
        }

        //Bind parameters
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->statement->bindValue($param, $value, $type);
        }
          

            //get multiple records as the result set
            public function resultSet(){
                $this->execute();
                return $this->statement->fetchAll(PDO::FETCH_OBJ);
            }

            //get single record as the result set
            public function single(){
                $this->execute();
                return $this->statement->fetch(PDO::FETCH_OBJ);
            }

            //checking the row count
            public function rowCount(){
                return $this->statement->rowCount();
            }

            //Insert Id
            public function insertId() {
                return $this->dbh->lastInsertId();
            }
            
        }

    


    

?>