<?php

namespace App\Core\Form;

use App\Core\Model;

class Field
{
    const TYPE_TEXT = 'text';
    const TYPE_EMAIL = 'email';
    const TYPE_PASSWORD = 'password';

    public string $type;
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
            <div class="form-group">
            <label>%s</label>
            <input type="%s" name="%s" value="%s" class="form-control%s">
            <div class="invalid-feedback">
            %s
            </div>
            </div>
        ',  $this->attribute,
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is_invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }

    public function passwordField(): Field
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}