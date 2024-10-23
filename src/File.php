<?php

namespace Jestor;

class File
{
    private $files;
    private $field;
    private $id;
    private $table;
    private $client;

    private $token;
    private $org;
    private $depth;

    public function __construct($_org, $_token, $_depth, $_table, $_field, $_id)
    {
        $this->token = $_token;
        $this->org = $_org;
        $this->depth = $_depth;
        $this->table = $_table;
        $this->field = $_field;
        $this->id = $_id;

        $this->client = new Client($this->org, $this->token, $this->depth);

        if (!empty($this->id) && !empty($this->field)) {
            $this->files = $this->get();
        }
    }

    public function get()
    {
        $args = [
            'arguments' => [
                $this->table,
                $this->id,
                $this->field
            ]
        ];

        $response =  $this->client->jestorCallFunctions("getFiles", $args);
        $arr = json_decode($response);
        $this->files = $arr->data;
        return $this->files;
    }

    public function add($configFile)
    {
        $args = [
            'arguments' => [
                $this->table,
                $configFile,
                $this->id,
                $this->field
            ]
        ];

        $response = $this->client->jestorCallFunctions("addFile", $args);
        $arr = json_decode($response);
        $this->files = $arr->data;
        //return $response;
        //$arr = json_decode($response);
        //$this->appendFiles($arr->data);
        return $this->files;
    }

    public function update($fileId, $configFile)
    {
        $args = [
            'arguments' => [
                $this->table,
                $configFile,
                $fileId,
                $this->id,
                $this->field
            ]
        ];

        $response = $this->client->jestorCallFunctions("updateFile", $args);
        $arr = json_decode($response);
        $this->files = $arr->data;
        return $this->files;
        //$this->removeFiles($fileId);
        //$this->appendFiles($_files);
        //return $this->files;
    }

    public function delete($fileId)
    {
        $args = [
            'arguments' => [
                $this->table,
                $fileId,
                $this->id,
                $this->field
            ]
        ];

        $response = $this->client->jestorCallFunctions("deleteFile", $args);

        $arr = json_decode($response);
        $this->files = $arr->data;
        return $this->files;
    }

    public function appendFiles($_files)
    {
        foreach ($_files as $file) {
            array_push($this->files, json_encode($file));
        }
    }

    public function removeFiles($_id)
    {
        if (($key = array_search($_id, $this->files)) !== false) {
            array_splice($this->files, $key, 1);
        }
    }

    public function toJson()
    {
        return json_encode($this->files);
    }
}
