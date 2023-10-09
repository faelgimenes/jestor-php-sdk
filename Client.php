<?php 
    include_once('Exceptions/JestorException.php');
    class Client {
        private $token;
        private $org;
        private $depth;

        public function __construct($_org, $_token, $_depth){
            $this->token = $_token;
            $this->org = $_org;
            $this->depth = $_depth;
        }

        public function jestorCallFunctions($path, $arguments = [], $files = null){
            try{
                $headers = [
                    "Accept: application/json",
                    "Authorization: Bearer ". $this->token,
                    "x-low-code-trigger-depth: " . $this->depth,
                    "User-Agent: jestor-php-sdk"
                ];

                $url = "https://" . $this->org . ".api.jestor.com/v3/low-code-execution/" . $path;

                $ch = curl_init();
                
                //grab URL and pass it to the variable.
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arguments));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);  
                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
                
                if ($httpcode > 299){
                    throw new JestorException($response);
                }
                
                return $response; 
                //return json_encode($headers);
            }catch( Exception $e){
                return $e;
            }catch( JestorException $e){
                return $e;
            }
        }
    }
?>