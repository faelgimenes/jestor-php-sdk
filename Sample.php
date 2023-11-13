<?php
include_once('Jestor.php');
include_once('Filters/Filter.php');
include_once('Filters/Operator.php');

$jestor = new Jestor("", "", 0);

//Exemplo GET
//  $filter = new Filter("name", "novo record", "==");

//  $filters = [
//      $filter->to_array()
//  ];
//$results = $jestor->table("teste")->get($filters);
//Exemplo GET

//Exemplo INSERT
//$obj = [
//    "name" => "novo record",
//    "inicio" => new Datetime("now")
//];
//$results = $jestor->table("teste")->insert($obj);
//Exemplo INSERT

//EXEMPLO GET USER
// $filter = new Filter("email", "vinicius.belnuovo@jestor.com", "==");

// $filters = [
//      $filter->to_array()
// ];
//$results = $jestor->user()->get($filters);
//EXEMPLO GET USER

//EXEMPLO CREATE USER
//$results = $jestor->user()->createUser("john.doe@sample.com","Test123", 18001, "John Doe", false, "member");
//EXEMPLO CREATE USER

//EXEMPLO INACTIVE USER
//$results = $jestor->user()->inactiveUser(35);
//EXEMPLO INACTIVE USER

//EXEMPLO Métodos dinâmicos
/*
$arg = [
    "test file content",
    "txt"
];
$results = $jestor->createNewFileB( "test file content", "txt");
*/
//EXEMPLO Métodos dinâmicos

//echo json_encode($results);

/*
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
//$jsonobj = json_decode($jsonobj);
$obj = json_decode($jsonobj);


echo is_string($obj) == false;
*/
$file = $jestor->file('aq6ksc3ewhwzc2js_ct21', 'arquivo', 1);
//$results = $file->get();
$_file = [
    "name" => "teste",
    "content" => "teste 123",
    "contentType" => "txt"
];
$file->add($_file);
//$results = $jestor->table("aq6ksc3ewhwzc2js_ct21")->update(1, ["arquivo" => $file->toJson()]);

$idFile = '65525377a0201';
//$results = $file->update($idFile, ["name" => "nome alterado"]);
//$results = $jestor->table("aq6ksc3ewhwzc2js_ct21")->update(1, ["arquivo" => $file->toJson()]);
$results = $file->delete($idFile);
echo json_encode($results);
?>