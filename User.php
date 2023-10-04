<?php 
    class User {
        private string $token;
        private string $org;
        private int $token;
        private Client $client;

        public function __construct($_token, $_org, $_depth){
            $this->token = $_token;
            $this->org = $_org;
            $this->depth = $_depth;
            $this->client = new Client($this->token, $this->org, $this->depth);
        }
        public function get($filters = [], $limit = 100, $page = 1, $sort = null){
            $args = [
                'arguments' => [
                    $filters,
                    $limit,
                    $page,
                    $sort
                ]
            ]
            
            return $this->client->jestorCallFunctions("fetchUsers", $args);

        }
    }
?>