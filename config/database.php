<?php
    require_once './config/general.php';
    
    class conexion {
        protected function connect(){
            $server = ".\SQLEXPRESS";
            $user = "SA";
            $pass = "v4!".'$'."NZr6qt";
            $db = "MontiacBD";
            try {
                $enlace = new PDO("sqlsrv:server=$server;database=$db", $user, $pass);
                if ($enlace) {
                    return $enlace;
                }
            } catch (Exception $ex) {
                echo "<h1>Ocurrió un error con la base de datos: " . $ex->getMessage().'</h1>';
            }
        }
        protected function RunSimpleQuery($query){
            $respuesta = self::connect()->prepare($query);
            $respuesta->execute();
            return $respuesta;
        }

        public function encryption($string){ //encriptar contraseña
            $output = false;
            $key = hash('sha256', SECRET_KEY);
            $iv = substr(hash('sha256', SECRET_IV),0,16);
            $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
            $output = base64_encode($output);
            return $output;
        }
    
        protected function decryption($string){ //desencryptar
            $key = hash('sha256', SECRET_KEY);
            $iv = substr(hash('sha256', SECRET_IV), 0, 16);
            $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
            return $output;
        }
    }
        
    
