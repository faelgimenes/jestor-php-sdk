<?php

namespace Jestor;

class Table
{
    private $token;
    private $org;
    private $tableName;
    private $depth;
    private $client;

    public function __construct($_org, $_token, $_depth, $_tableName)
    {
        $this->token = $_token;
        $this->org = $_org;
        $this->depth = $_depth;
        $this->tableName = $_tableName;
        $this->client = new Client($this->org, $this->token, $this->depth);
    }

    public function get($filters = [], $limit = 100, $page = 1, $sort = null, $fields_to_select = null, $fetch_type = 'single', $operator = 'AND')
    {
        $args = [
            'arguments' => [
                $this->tableName,
                $filters,
                $limit,
                $page,
                $sort,
                $fields_to_select,
                $fetch_type,
                $operator
            ]
        ];

        return $this->client->jestorCallFunctions("fetch", $args);
    }

    public function insert($data)
    {
        $args = [
            'arguments' => [
                $this->tableName,
                $data
            ]
        ];

        return $this->client->jestorCallFunctions("createObject", $args);
    }

    public function update($recordId, $data)
    {
        $data["id_" . $this->tableName] = $recordId;
        //array_push($data, ["id_". $this->tableName => $recordId ]);
        $args = [
            'arguments' => [
                $this->tableName,
                $data,
                null
            ]
        ];
        //return $args;
        return $this->client->jestorCallFunctions("updateObject", $args);
    }

    public function delete($recordId)
    {
        $args = [
            'arguments' => [
                $this->tableName,
                $recordId
            ]
        ];

        return $this->client->jestorCallFunctions("removeObject", $args);
    }
}
