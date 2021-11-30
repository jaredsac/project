<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "children".
 *
 * @property int $ID
 * @property string $First_name
 * @property string $Last_name
 * @property string $Day_of_birth
 */
class Children extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'children';
    }


    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['ID' => 'team_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['First_name', 'Last_name', 'Day_of_birth'], 'required'],
            [['Day_of_birth'], 'safe'],
            [['First_name', 'Last_name'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'First_name' => 'First Name',
            'Last_name' => 'Last Name',
            'Day_of_birth' => 'Day Of Birth',
        ];
    }
}
