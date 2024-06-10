<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $pasword
 * @property string $status
 *
 * @property UserRules[] $userRules
 */
class User extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['name', 'pasword', 'status'], 'required'],
            [['name', 'pasword', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pasword' => 'Pasword',
            'status' => 'Status',
        ];
    }
    /** 
    * добавляет виртуальный атрибут
    */
    public function getRole()
    {
        return $this->role;
    }

    public function setRole($value)
    {
        $this->role = $value;
    }

    /** 
    * добавляет нового пользователя
    */
   public function addNewUser($data)
   {    
            $this->name = $data['name'];
            $this->pasword = Yii::$app->security->generatePasswordHash($data['pasword']);
            $this->status = 'работает';
        if($this->save()){
            $role = Roles::find()->where(['role'=>$data['role']])->scalar();
            $model = new UserRules();
            $model->user_id = $this->id;
            $model->role_id = $role;
            return $model->save(); 
        }else{
            return false;
        }
   }
   /** 
    * проверяет данные пользователя при входе
    */
   public function Login($name)
    {
         $userData = $this::find()
         ->joinWith([
            'userRules'
         ])
         ->where([
            'name'=>$name
         ])
         ->asArray()
         ->all();

        $role = Roles::find()
        ->select([
            'role'
        ])
        ->where([
            'id'=>$userData[0]['userRules'][0]['role_id']
         ])
         ->asArray()
         ->scalar();
         $userData[0]['userRules']=$role;
         return $userData;
    }

    /** 
    * добавляет нового пользователя
    */
    public function editUserData($name)
    {
         $userData = User::find()
         ->where([
            'name'=>$name
         ])
         ->all();
         return $userData;
    }

    /** 
    * добавляет нового пользователя
    */
   public function getAllUser($name)
   {
        $usersData = User::find()->where(['<>','name',$name])->all();
        return $usersData;
   }

    /**
     * Gets query for [[UserRules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserRules()
    {
        return $this->hasMany(UserRules::class, ['user_id' => 'id']);
    }
}
