<?php
    // require_once 'sendemail.php';
    // session_start();
    
    class Database{
        private $mysqli    = null;

        private $host      = 'localhost';

        private $name      = 'root';
        
        private $pass      = null; 
        
        private $database  = 'shoproyal';

        public function __construct()
        {
            $this->mysqli = new mysqli($this->host,$this->name,$this->pass,$this->database);

            $this->mysqli->set_charset("utf-8");

            if($this->mysqli->connect_error){

                echo "Faild: " . $this->mysqli->connect_error;

            }
        }

        public function get_data($sql){
            
            $result = [];

            $query = $this->mysqli->query($sql);

            if(!$query)
            
                die("Câu truy vấn sai!");

            while( $row = $query->fetch_assoc() )
            {
                $result[] = $row;
            }

            return $result;
        }

        public function getAll($table,$where){

            if ($where === null) {

                $sql = "SELECT * FROM $table ORDER BY id ASC";

            }else{

                $sql = "SELECT * FROM $table WHERE id='$where'";

            }

            return $this->mysqli->query($sql);
        }

        public function Insert($table, $params = []){
            
            $table_colums = implode(",",array_keys($params));

            $table_values = "";

            foreach($params as $param){

                $table_values.="'".$param."',";

            }

            $table_values = substr($table_values,0,strlen($table_values)-1);

            $sql = "INSERT INTO $table($table_colums) VALUES ($table_values);";

            return $this->mysqli->query($sql);
        }

        public function connect($sql){
            return $this->mysqli->query($sql);
        }

        public function Update($table, $data, $where){

            $field_list = '';

            foreach ($data as $key => $value) {

                $field_list .= "$key =" . "'".$this->mysqli->real_escape_string($value) ."'". ", ";

            }

            $field_list = trim($field_list, ', ');

            $sql = "UPDATE $table SET $field_list WHERE id = '$where' ;";

            return $this->mysqli->query($sql);
        }

        public function Delete($table, $id){

            if($id !== ''){
                
                $sql = "DELETE FROM $table WHERE id = '$id'";

            }else{

                $sql = "DELETE FROM $table";

            }

            return $this->mysqli->query($sql);
        }

        public function login($account,$password){
            
            $sql = "SELECT users.id,users.account,users.password,users.avatar,users.roles_id FROM users WHERE account = '$account'";

            $result = $this->get_data($sql);

            
            if(!count($result)){
                echo 'Tài khoản không tồn tại';
                return false;
            }

            if(!password_verify($password, $result[0]['password'])){
                echo 'Sai mật khẩu';
                return false;
            }

            if(empty($result[0]['account'])){
                echo 'Tài khoản không được để trống';
                return false;
            }

            if($result[0]['roles_id']==1){

                session_start();

                $_SESSION['id'] = $result[0]['id'];
    
                $_SESSION['account'] = $result[0]['account'];
    
                $_SESSION['password'] = $result[0]['password'];

                header('Location: ./admin/index.php');


            }else{
                session_start();

                $_SESSION['id'] = $result[0]['id'];
    
                $_SESSION['account'] = $result[0]['account'];
    
                $_SESSION['password'] = $result[0]['password'];
                
                header('Location: ./index.php');

            }

            if(isset($_POST['btnLogin'])){

                $_SESSION['id'] = $result[0]['id'];
    
                $_SESSION['account'] = $result[0]['account'];
    
                $_SESSION['password'] = $result[0]['password'];

                setcookie("account",$result[0]['account'],time()+86400);

                setcookie("password",$result[0]['password'],time()+86400);

            }
            
        }

        public function upLoadFile($dir,$file){

            $extension = explode('.',$_FILES[$file]['name']);

            $extension = $extension[count($extension)-1];

            $path = $dir.uniqid(rand()).'.'.$extension;

            if(in_array($extension,array('jpg','png','jpeg'))){
                if(is_uploaded_file($_FILES[$file]['tmp_name'])){
                    if(move_uploaded_file($_FILES[$file]['tmp_name'],$path)){
                        return $path;
                    };
                }
            }else{
                die('<h1>Loại tệp này không được hỗ trợ</h1>');
            }
        }

        public function getAvatarByID($id){

            $sql = "SELECT users.avatar FROM users WHERE id='$id'";

            $result = $this->get_data($sql);

            return $result;

        }

        public function getProductLimit(){

            $sql = "SELECT * FROM products limit 0,3";

            return $this->get_data($sql);
        }

        public function getProductAll(){

            $sql = "SELECT * FROM products";

            return $this->get_data($sql);


            // return $this->mysqli->query($sql);
        }

        public function getByIdProducts($id){

            $sql = "SELECT * FROM products WHERE id='$id'";

            return $this->mysqli->query($sql);

        }

        public function __destruct(){

            if($this->mysqli){

                $this->mysqli->close();

            }
        }

    }