<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointments".
 *
 * @property int $id
 * @property string $name
 * @property string $comment
 * @property string $datetime
 * @property string $status
 * @property int $car_id
 *
 * @property Car $car
 * @property Repair[] $repairs
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appointments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'comment', 'datetime', 'status', 'car_id'], 'required'],
            [['comment', 'status'], 'string'],
            [['datetime'], 'safe'],
            [['car_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
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

    /**
     * Gets query for [[Repairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepairs()
    {
        return $this->hasMany(Repair::className(), ['appointment_id' => 'id']);
    }

    
}
