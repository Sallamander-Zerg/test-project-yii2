<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $pasword
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
            [['name', 'pasword'], 'required'],
            [['name', 'pasword'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Записывает данные в таблицу report_stock_history
     * @return int Количество сохраненных строк
     */
    public function addNewUser($data)
    {
        $data['password'] = Yii::$app->security->generatePasswordHash(  $data['password']);
        $model = new static();
        $model->setAttributes($data);
        
        return $model->save();
        
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
