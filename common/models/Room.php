<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property int $room_number Xona raqami
 * @property string $position Xona joylashgan joy(B bino 2 qavat)
 *
 * @property BookRoom[] $bookRooms
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_number', 'position'], 'required'],
            [['room_number'], 'integer'],
            [['position'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_number' => 'Xona raqami',
            'position' => 'Xona joylashgan joy(B bino 2 qavat)',
        ];
    }

    /**
     * Gets query for [[BookRooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookRooms()
    {
        return $this->hasMany(BookRoom::className(), ['room_id' => 'id']);
    }

    public function getRoom()
    {
        return $this->room_number."-xona";
    }
}
