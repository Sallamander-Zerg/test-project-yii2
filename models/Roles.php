<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property int $id
 * @property string $role
 *
 * @property UserRules[] $userRules
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role'], 'required'],
            [['role'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[UserRules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserRules()
    {
        return $this->hasMany(UserRules::class, ['role_id' => 'id']);
    }
}
