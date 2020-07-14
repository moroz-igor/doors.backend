<?php

namespace frontend\models;

use Yii;
use yii\web\IdentityInterface;
use common\components\EmailService;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const USER_REGISTERED = 'user_registered';
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }
    public static function findByUsername($username)
    {
        return self::find()->where(['username' => $username])->one();
    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    /**
    * Finds an identity by the given ID.
    *
    * @param string|int $id the ID to be looked for
    * @return IdentityInterface|null the identity object that matches the given ID.
    */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
    * Finds an identity by the given token.
    *
    * @param string $token the token to be looked for
    * @return IdentityInterface|null the identity object that matches the given token.
    */

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    /**
    * @return int|string current user ID
    */
    public function getId()
    {
        return $this->id;
    }
    /**
    * @return string current user auth key
    */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    /**
    * @param string $authKey
    * @return bool if auth key is valid for current user
    */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function userRegisteredEventOn()
    {
        $this->on(User::USER_REGISTERED, function($event){
            EmailService::noticeUserRegiser($event->data);
            EmailService::noticeAdminRegiser($event->data);
        }, ['username' => $this->username,
            'email' => $this->email ]);

    }
    public function userRegisteredEventRun()
    {
        $this->trigger(User::USER_REGISTERED);
    }
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
        return $this->password_reset_token;
    }
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function findByPasswordResetToken($key)
    {

    // if (!static::isSecretKeyExpire($key))
    // {
    //     return null;
    // }
    return static::findOne([
        'password_reset_token' => $key,
    ]);
    }
    /**
    * Генерирует хеш из введенного пароля и присваивает (при записи) полученное значение полю   password_hash таблицы user для
    * нового пользователя.
    * Вызываеться из модели RegForm.
    */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }



}
