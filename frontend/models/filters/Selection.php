<?php

namespace frontend\models\filters;

use yii\base\Model;

class Selection extends Model
{
    public $first;
    public $second;
    public $third;

    public $brand;
    public $color;

    public function rules()
    {
        return [
            [['first', 'second', 'third'], 'string', 'max' => 1],
            [['brand', 'color'], 'string'],
        ];
    }
}
