<?php 
    class Table{
        private string $token;
        private string $org;
        private string $tableName;
        private int $depth;
        private Client $client;

        public function __construct($_token, $_org, $_depth, $_tableName){
            $this->token = $_token;
            $this->org = $_org;
            $this->depth = $_depth;
            $this->tableName = $_tableName;
            $this->client = new Client($this->token, $this->org, $this->depth);
        }

        public function get($filters = [], $limit = 100, $page = 1, $sort = null, $fields_to_select = null, $fetch_type = 'single' ){
            $args = [ 'arguments' => [
                    self.table_name,
                    filters,
                    limit,
                    page,
                    sort,
                    fields_to_select,
                    fetch_type
                ]
            ];

            return $this->client->jestorCallFunctions("fetch", $args);
        }
    }

?>