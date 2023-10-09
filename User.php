<?php 
    include_once('Client.php');
    class User {
        private $token;
        private $org;
        private $client;

        public function __construct($_org, $_token, $_depth){
            $this->token = $_token;
            $this->org = $_org;
            $this->depth = $_depth;
            $this->client = new Client($this->org, $this->token, $this->depth);
        }

        public function get($filters = [], $limit = 100, $page = 1, $sort = null){
            $args = [
                'arguments' => [
                    $filters,
                    $limit,
                    $page,
                    $sort
                ]
            ];
            return $this->client->jestorCallFunctions("fetchUsers", $args);
        }

        public function createUser($email, $password, $profileId, $name = "", $sendEmailToValidation = false, $seat = "member"){
            $args = [
                'arguments' => [
                    $email,
                    $password,
                    $profileId,
                    $name,
                    $sendEmailToValidation,
                    $seat
                ]
            ];

            return $this->client->jestorCallFunctions("createUser", $args);
        }

        public function inactiveUser($userId){
            $args = [
                'arguments' => [
                    $userId
                ]
            ];
         
            return $this->client->jestorCallFunctions("InactiveUser", $args);
        }
    }
?>