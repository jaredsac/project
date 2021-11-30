<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bestelling".
 *
 * @property int $id
 * @property string $naam
 * @property int $medewerker_id
 * @property int $menu_id
 * @property string $status
 * @property string $timestamp
 */
class Bestelling extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bestelling';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['naam', 'medewerker_id', 'menu_id', 'status'], 'required'],
            [['medewerker_id', 'menu_id'], 'integer'],
            [['status'], 'string'],
            [['timestamp'], 'safe'],
            [['naam'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'naam' => 'Naam',
            'medewerker_id' => 'Medewerker ID',
            'menu_id' => 'Menu ID',
            'status' => 'Status',
            'timestamp' => 'Timestamp',
        ];
    }

    public function getMedewerker()
    {
        return $this->hasOne(medewerker::className(), ['id' => 'medewerker_id']);
    }

    public function getMenu()
    {
        return $this->hasOne(menu::className(), ['id' => 'menu_id']);
    }
}
