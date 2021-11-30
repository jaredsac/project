<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parts".
 *
 * @property int $id
 * @property string $name
 * @property string $brand
 * @property string $type
 *
 * @property Repair[] $repairs
 */
class Part extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'brand', 'type'], 'required'],
            [['name', 'brand', 'type'], 'string', 'max' => 100],
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
            'brand' => 'Brand',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Repairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepairs()
    {
        return $this->hasMany(Repair::className(), ['part_id' => 'id']);
    }
}
