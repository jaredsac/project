<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $address
 * @property string $city
 * @property string $zipcode
 *
 * @property Car[] $cars
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'address', 'city', 'zipcode'], 'required'],
            [['firstname', 'lastname'], 'string', 'max' => 200],
            [['address', 'city', 'zipcode'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'address' => 'Address',
            'city' => 'City',
            'zipcode' => 'Zipcode',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['customer_id' => 'id']);
    }
}
