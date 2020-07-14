<?php
namespace frontend\models\forms;
use Yii;
use yii\base\Model;
use frontend\models\User;
/**
 * Description of RegisterForm
 *
 * @author I.Moroz
 */
class RegisterForm extends Model
{
    public $username;
    public $email;
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
            [['username'], 'unique', 'targetClass' => User::className()],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 80],
            [['email'], 'unique', 'targetClass' => User::className()],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    public function beforeValidate()
    {
        $this->username = strip_tags($this->username);
        return parent::beforeValidate();
    }
    /**
     * Save user
     * @return User|null
     */
    public function save()
    {
        if ($this->validate()) {
            $user = new User();
            $user->email = $this->email;
            $user->username = $this->username;
            $user->created_at = $time = time();
            $user->updated_at = $time;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);

            if ($user->save()) {
                // methods from model\User
                $user->userRegisteredEventOn();
                $user->userRegisteredEventRun();
                return $user;
            }
        }
    }
}
