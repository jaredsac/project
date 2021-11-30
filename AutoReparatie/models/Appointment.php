<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property int $id
 * @property string $name
 * @property string $comment
 * @property string $datetime
 * @property string $status
 * @property int $car_id
 *
 * @property Car $car
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'comment', 'datetime', 'status', 'car_id'], 'required'],
            [['datetime'], 'safe'],
            [['status'], 'string'],
            [['car_id'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 60],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_id' => 'id']],
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
            'comment' => 'Comment',
            'datetime' => 'Datetime',
            'status' => 'Status',
            'car_id' => 'Car ID',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['id' => 'car_id']);
    }
}
