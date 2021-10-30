<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string $name Fan nomi
 * @property string|null $description Guruh tanlang
 *
 * @property DjTable[] $djTables
 * @property SubjectGroup[] $subjectGroups
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
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
            'name' => 'Fan nomi',
            'description' => 'Fan haqida',
        ];
    }

    /**
     * Gets query for [[DjTables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDjTables()
    {
        return $this->hasMany(DjTable::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[SubjectGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectGroups()
    {
        return $this->hasMany(SubjectGroup::className(), ['subject_id' => 'id']);
    }
}
