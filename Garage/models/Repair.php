<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repairs".
 *
 * @property int $id
 * @property int $appointment_id
 * @property int $part_id
 *
 * @property Part $part
 * @property Appointment $appointment
 */
class Repair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repairs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'appointment_id', 'part_id'], 'integer'],
            [['appointment_id', 'part_id'], 'required'],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
            [['appointment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Appointment::className(), 'targetAttribute' => ['appointment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appointment_id' => 'Appointment ID',
            'part_id' => 'Part ID',
        ];
    }

    /**
     * Gets query for [[Part]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPart()
    {
        return $this->hasOne(Part::className(), ['id' => 'part_id']);
    }

    /**
     * Gets query for [[Appointment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppointment()
    {
        return $this->hasOne(Appointment::className(), ['id' => 'appointment_id']);
    }
}
