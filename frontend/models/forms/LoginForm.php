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
class LoginForm extends Model
{

    public $username;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' =>10],

            ['password', 'required' ],
            ['password', 'validatePassword' ],
        ];
    }
    public function login()
    {
        if ($this->validate()) {
            // getting an instance of the user by the User::findByUsername
            $user = User::findByUsername($this->username);
            // and pass this instance to this method
            return Yii::$app->user->login($user);
        }
        return false;
    }
    public function validatePassword($attribute, $params)
    {
        $user = User::findByUsername($this->username);
        if(!$user || !$user->validatePassword($this->password))
        {
            $this->addError($attribute, 'INCORRECT PASSWORD');

        }
    }

}
