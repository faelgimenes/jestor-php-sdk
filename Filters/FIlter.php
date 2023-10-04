<?php 
    class Filter{
        private string $field;
        private string $value;
        private Operator $operator;

        public function __construct(string $_field, string $_value, Operator $_operator){
            $this->field = $_field;
            $this->value = $_value
            $this->operator = $_operator            
        }

        public function toArray(): array{
            return [
                'field' => $this->field,
                'type' => $this->type,
                'value' => $this->value,
                'operator' => $this->operator
            ];
        }
    }
?>