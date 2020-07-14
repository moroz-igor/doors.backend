<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "contacts".
 *
 * @property string|null $title
 * @property string|null $adress
 * @property string|null $adress_des
 * @property string|null $sub_title
 * @property string|null $description
 */
class Contacts extends ActiveRecord
{
    public static function getContactsContent()
    {
        return  Contacts::find()->all();
    }

}
