<?php 

class Operator{
    const equal = "Igual";
    const like = "Contém";
    const notEqual = "Diferente";
    const startsWith = "Começa com";
    const notLike = "Não contém";
    const in = "Na lista";
    const notin = "Não está na lista";
    const null = "Nulo";
    const nullOrEmpty = "Nulo ou vazio";
    const notNull = "Não é Nulo";
    const is_not_empty = "Não é vazio";
    const greatherThan = "Maior que";
    const greatherOrEqualThan = "Maior ou igual que";
    const lessThan = "Menor que";
    const lessOrEqualThan = "Menor ou igual que";
    const between = "Entre";
    

    private $value;

    public function __construct(string $_value){
        $this->value = $_value;
    }

    public function value(): string{
        return $this->value;
    }
}
?>