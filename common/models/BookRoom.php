<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book_room".
 *
 * @property int $id
 * @property int $week_id Hafta kunini tanlang
 * @property int $room_id Xona tanlang
 * @property int $dj_table_id Guruhga o'tiluvchi darsni tanlang
 * @property int $para Para
 *
 * @property DjTable $djTable
 * @property Room $room
 * @property WeekDay $week
 */
class BookRoom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['week_id', 'room_id', 'dj_table_id', 'para'], 'required'],
            [['week_id', 'room_id', 'dj_table_id', 'para'], 'integer'],
            [['week_id'], 'exist', 'skipOnError' => true, 'targetClass' => WeekDay::className(), 'targetAttribute' => ['week_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['dj_table_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjTable::className(), 'targetAttribute' => ['dj_table_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'week_id' => 'Hafta kunini tanlang',
            'room_id' => 'Xona tanlang',
            'dj_table_id' => 'Guruhga o\'tiluvchi darsni tanlang',
            'para' => 'Para',
        ];
    }

    /**
     * Gets query for [[DjTable]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDjTable()
    {
        return $this->hasOne(DjTable::className(), ['id' => 'dj_table_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * Gets query for [[Week]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWeek()
    {
        return $this->hasOne(WeekDay::className(), ['id' => 'week_id']);
    }
}
