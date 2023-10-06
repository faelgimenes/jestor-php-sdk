<?php 
    class Filter{
        private $field;
        private $value;
        private $operator;

        public function __construct ($_field, $_value, $_operator){
            $this->field = $_field;
            $this->value = $_value;
            $this->operator = $_operator;
        }

        public function to_array(): array{
            return [
                'field' => $this->field,               
                'value' => $this->value,
                'operator' => $this->operator
            ];
        }
    }
?>