<?php 
    class Client {
        private string $token;
        private string $org;
        private int $depth;

        public function __construct($_token, $_org, $_depth){
            $this->token = $_token;
            $this->org = $_org;
            $this->depth = $_depth;
        }

        public function jestorCallFunctions($path, $arguments = [], $files = null){
            try{
                $headers = [];
            }catch( Exception $e){

            }
        }
    }
?>