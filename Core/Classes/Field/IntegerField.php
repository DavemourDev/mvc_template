<?php

class IntegerField extends Field
{
    public function __construct($fieldName, $value=0)
    {
        $this->fieldName=$fieldName;
        $this->value=$value;
        $this->constraint=self::FIELD_INTEGER;
    }
    
    public function isUnsigned()
    {
        return $this->value >= 0;
    }
    
}
