<?php
namespace frontend\models\forms;

use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use frontend\models\User;

class ResetPasswordForm extends Model
{
    public $password;
    private $_user;

    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => 'Пароль'
        ];
    }

    public function __construct($key, $config = [])
    {
        if(empty($key) || !is_string($key))
        {
            throw new InvalidParamException('Ключ не может быть пустым.');
            echo 'empty';die;

        }
        $this->_user = User::findByPasswordResetToken($key);
        if(!$this->_user)
        {
            echo 'error!';
            throw new InvalidParamException('Не верный ключ.');
        }

        parent::__construct($config);
    }

    public function resetPassword()
    {
        /* @var $user User */
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
        return $user->save();
    }
    public static function timeLimit($key)
    {
        $timeQuery = substr($key, strlen($key)-10, strlen($key));
        $delta =  time() - intval($timeQuery);
        if( $delta > 600 )
        {
            return true;
        }
        return false;
    }


}
