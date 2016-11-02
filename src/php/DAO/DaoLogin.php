<?php 
    require 'connection.php';
    require '../Model/Users.php';
    /**
    * 
    */
    class DaoLogin
    {
        private $con;
        private $user;
        function __construct()
        {
            $this->con= new Connection();
            $this->user=new Users();
        }

        public function Login($user,$password){
            $this->con->OpenConnection();
            $SqlCoon=$this->con->getConnection();
            $ArrayList = array();
            $sql="select * from usuarios where username='$user' AND contrasena='$password'";
            $result=$SqlCoon->query($sql);
            $numrow=mysql_num_rows($result);
            if ($numrow==1) {
                include 'tokengenerate.php'; 
                $token = generateRandomString();
                $update = "update admin set token='$token' WHERE adminName='$user' AND adminPass='$password'";
                $qr=$SqlCoon->query($update);
                if($qr){
                    $st="SELECT username, token FROM usuarios WHERE username='$user' AND contrasena='$password'";
                }
                foreach ($SqlCoon->query($st) as $row) {
                    $ArrayList[]= array(
                        'username' => utf8_encode($row['username']),
                        'token'=>$row['token']
                    );
                }
                return $ArrayList;
            }
            
        }

        public function Login2($user,$password)
        {
            $band = false;
            try 
            {
                $this->con->OpenConnection();
                $SqlConn = $this->con->getConnection();


                if($SqlConn)
                {
                    $SqlStament = $SqlConn->prepare(
                        "SELECT INTO usuarios VALUES
                        (
                        default,
                        :Category,
                        :ProductName,
                        :ProductPrice,
                        :Stock
                        )
                        ");

                    $SqlStament->bindParam(':Category',$Category);
                    $SqlStament->bindParam(':ProductName',$ProductName);
                    $SqlStament->bindParam(':ProductPrice',$ProductPrice);
                    $SqlStament->bindParam(':Stock',$Stock);
                    $SqlStament->execute();

                    $band = true;

                }
            } 
            catch (Exception $e) 
            {
                $band = false;
            }

            return $band;

        }
    }
    /*$obj= new DaoLogin();
    print_r($obj->Read());*/
/*if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }
    $postdata=file_get_contents("php://input");
	if (isset ($postdata)) {
		$request=json_decode($postdata);
		$username=$request->username;
		$password=$request->password;

	}
	else{
		echo "error";
	}*/
?>