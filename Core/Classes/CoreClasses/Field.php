<?php

/**NO IMPLEMENTADO AÚN*/

/**
 * Representa a un campo de una entidad y la lógica inherente a éste.
 * Puedes extender esta clase haciendo nuevas clases que ya porten valores predeterminados para
 * diferentes tipos de campos.
 *
 * @author David
 */
class Field {
    
    /**
     * Nombre del campo.
     * @var string
     */
    protected $fieldName;
    
    /**
     * Valor del campo.
     * @var mixed
     */
    protected $value;
    
    /**
     * Clave de restricción del campo. Determina las condiciones específicas para considerar si
     * el valor del campo es válido o no.
     * @var int
     */
    protected $constraint;
    
    /**
     * Argumentos de la restricción del campo. Algunas condiciones pueden utilizar ciertos valores.
     * @var type 
     */
    protected $args=[];
    
    const FIELD_INTEGER=1;
    const FIELD_STRING=2;
    const FIELD_DECIMAL=3;
    const FIELD_BOOLEAN=4;
    const FIELD_DATE=5;
    const FIELD_CLASS=6;
    
    public function isValid()
    {
        switch($this->constraint)
        {
            case FIELD_INTEGER:
                return is_int($this->value);
            case FIELD_STRING:
                return is_string($this->value);
            case FIELD_DECIMAL:
                return is_numeric($this->value);
            case FIELD_BOOLEAN:
                return is_bool($this->value);
            case FIELD_DATE:
                //Formatea la fecha---
                //return date_format($object, $format);
                break;
            case FIELD_INSTANCE:
                //Require un nombre de clase como valor del argumento 'instanceof'.
                return $this->value instanceof $this->args['instanceof'];
        }
    }
    
    
}
