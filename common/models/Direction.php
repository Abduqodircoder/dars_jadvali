<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "direction".
 *
 * @property int $id
 * @property int|null $fakultet_id
 * @property string $name Fakultet tanlang
 *
 * @property Faculty $fakultet
 */
class Direction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultet_id'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['fakultet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['fakultet_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fakultet_id' => 'Fakultet ID',
            'name' => 'Fakultet tanlang',
        ];
    }

    /**
     * Gets query for [[Fakultet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultet()
    {
        return $this->hasOne(Faculty::className(), ['id' => 'fakultet_id']);
    }
}
