<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dj_table".
 *
 * @property int $id
 * @property int $teacher_id O'qituvchi tanlang
 * @property int|null $subject_id guruh tanlang
 *
 * @property BookRoom[] $bookRooms
 * @property SubjectGroup $subject
 * @property Teacher $teacher
 */
class DjTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dj_table';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacher_id'], 'required'],
            [['teacher_id', 'subject_id'], 'integer'],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectGroup::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teacher_id' => 'O\'qituvchi tanlang',
            'subject_id' => 'Fan va guruh tanlang',
        ];
    }

    /**
     * Gets query for [[BookRooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookRooms()
    {
        return $this->hasMany(BookRoom::className(), ['dj_table_id' => 'id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(SubjectGroup::className(), ['id' => 'subject_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }

    public function getGroupSubject()
    {
        return $this->teacher->getFullName().$this->subject->getGroupSubject();
    }
}

