<?php 
    class Jestor{
        private string $token;
        private string $org;
        private int $depth;

        public function __construct($_token, $_org, $_depth){
            $this->token = $_token;
            $this->org = $_org;
            $this->depth = $_depth;            
        }

        public function table($_tableName) : Table{
            return new Table($this->token, $this->org, $this->depth, $_tableName);
        }
    }
?>