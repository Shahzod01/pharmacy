<?php

namespace App\Core\Form;

use App\Core\Model;

class Field
{
    public Model $model;
    public $attribute;

    public function _construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
            <div class="form-group">
            <label>%s</label>
            <input type="text" name="%s" class="form-control%s">
            <div class="invalid-feedback">
            %s
            </div>
            </div>
        ',  $this->attribute, 
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is_invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }
}