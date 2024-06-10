<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "UserRules".
 *
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 *
 * @property Roles $role
 * @property User $user
 */
class UserRules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'UserRules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id'], 'required'],
            [['user_id', 'role_id'], 'integer'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::class, 'targetAttribute' => ['role_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'role_id' => 'Role ID',
        ];
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::class, ['id' => 'role_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
