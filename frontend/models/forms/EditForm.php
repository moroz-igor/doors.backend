<?php
namespace frontend\models\forms;

use Yii;
use yii\base\Model;
use frontend\models\User;

/**
 * Description of LoginForm
 *
 * @author admin
 */
class EditForm extends Model
{
    public $password;
    public $sellphone;
    public $address;
    public $name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['sellphone', 'trim'],
            ['sellphone', 'string', 'min' => 10, 'max' => 13],

            ['address', 'string', 'min' => 10, 'max' => 250],

            ['name', 'trim'],
            ['name', 'string', 'min' => 2, 'max' => 50],

        ];
    }
    public function beforeValidate()
    {
        $this->sellphone = strip_tags($this->sellphone);
        $this->address = strip_tags($this->address);
        $this->name = strip_tags($this->name);
        return parent::beforeValidate();
    }
        /**
         * Edit user
         * @return User|null
         */
        public function update($id)
        {
            if ($this->validate()) {

                $user =  User::findOne($id);
                $user->created_at = $time = time();
                $user->updated_at = $time;
                $user->sellphone = $this->sellphone;
                $user->address = $this->address;
                $user->name = $this->name;

                if ($user->save()) {
                    return $user;
                }
            }
        }



}
