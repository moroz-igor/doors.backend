<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "isotope_filters".
 *
 * @property int $num
 * @property string|null $class
 * @property string|null $category
 */
class Isotopefilters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'isotope_filters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class', 'category'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'num' => 'Num',
            'class' => 'Class',
            'category' => 'Category',
        ];
    }
}
