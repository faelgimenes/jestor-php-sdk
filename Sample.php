<?php
include_once('Jestor.php');
include_once('Filters/Filter.php');
include_once('Filters/Operator.php');
 //$typ = new Table("belnuovo", "Nzk4NTRkMTMzNjFjMDI48aa1fa7516MTY1NzU0MzkyODc4ZDM5", 0)
$jestor = new Jestor("belnuovo", "Nzk4NTRkMTMzNjFjMDI48aa1fa7516MTY1NzU0MzkyODc4ZDM5", 0);
$filter = new Filter("name", "novo teste", "==");

$filters = [
    $filter->to_array()
];

//$results = $jestor->table("teste")->get($filters);

$obj = [
    "name" => "novo record",
    "inicio" => new Datetime("now")
];

//$results = $jestor->user()->get($filters);

//$results = $jestor->table("teste")->insert($obj);
$arg = [
    "test file content",
    "txt"
];
$results = $jestor->createNewFile([$arg]);

echo json_encode($results);
?>