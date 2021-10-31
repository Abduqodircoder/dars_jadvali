<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $f_name O'qituvchi ismi
 * @property string $s_name O'qituvchi familyasi
 * @property string|null $l_name O'qituvchi Sharifi(Otchestvo)
 * @property string|null $description O'qituvchi haqida
 *
 * @property DjTable[] $djTables
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['f_name', 's_name'], 'required'],
            [['description'], 'string'],
            [['f_name', 's_name', 'l_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'f_name' => 'O\'qituvchi ismi',
            's_name' => 'O\'qituvchi familyasi',
            'l_name' => 'O\'qituvchi Sharifi(Otchestvo)',
            'description' => 'O\'qituvchi haqida',
        ];
    }

    /**
     * Gets query for [[DjTables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDjTables()
    {
        return $this->hasMany(DjTable::className(), ['teacher_id' => 'id']);
    }

    public function getFullName()
    {
        return $this->l_name[0].".".$this->s_name.".".$this->f_name;
    }

}
