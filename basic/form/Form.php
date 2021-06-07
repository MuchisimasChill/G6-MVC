<?php
namespace app\basic\form;
use app\basic\Model;

class Form
{
    public static function start($action, $method)
    {
        printf('<form class="border rounded-3 p-3 bg-light" action="%s" method="%s" >', $action, $method);
        return new Form();
    }

    public static function end()
    {
        return '</form>';
    }

    public function field(Model $model, $attr)
    {
        return new Field($model, $attr);
    }
}
