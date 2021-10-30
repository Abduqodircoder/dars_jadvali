<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "week_day".
 *
 * @property int $id
 * @property string $name Hafta kuni nomi
 *
 * @property BookRoom[] $bookRooms
 */
class WeekDay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'week_day';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Hafta kuni nomi',
        ];
    }

    /**
     * Gets query for [[BookRooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookRooms()
    {
        return $this->hasMany(BookRoom::className(), ['week_id' => 'id']);
    }
}
