<?php
namespace app\basic\form;

use app\basic\Model;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';

    public Model $model;
    public string $attr;
    public string $type;

    public function __construct(Model $model, string $attr) {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attr = $attr;
        
    }

    public function __toString()
    {
        return sprintf('
            <div class="mb-3">
                <label>%s</label>
                <input name="%s" value="%s" type="%s" class="form-control%s" >
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
        ',  $this->attr,
            $this->attr,
            $this->model->{$this->attr},
            $this->type,
            $this-> model->hasError($this->attr) ? ' is-invalid' : '',
            $this->model->getFirstError($this->attr)
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}
