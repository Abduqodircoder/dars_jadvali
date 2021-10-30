<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_group".
 *
 * @property int $id
 * @property int $course_id Kurs
 * @property int|null $faculty_id Fakultet tanlang
 * @property int|null $direction_id Yunalish tanlang
 * @property string $name Guruh nomi
 *
 * @property Course $course
 * @property Direction $direction
 * @property Faculty $faculty
 * @property SubjectGroup[] $subjectGroups
 */
class CourseGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'faculty_id', 'direction_id', 'name'], 'required'],
            [['course_id', 'faculty_id', 'direction_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['direction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Direction::className(), 'targetAttribute' => ['direction_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Kurs',
            'faculty_id' => 'Fakultet tanlang',
            'direction_id' => 'Yunalish tanlang',
            'name' => 'Guruh nomi',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Direction]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDirection()
    {
        return $this->hasOne(Direction::className(), ['id' => 'direction_id']);
    }

    /**
     * Gets query for [[Faculty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['id' => 'faculty_id']);
    }

    /**
     * Gets query for [[SubjectGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectGroups()
    {
        return $this->hasMany(SubjectGroup::className(), ['group_id' => 'id']);
    }

    public function getCourseGroup()
    {
        return $this->course_id."-kurs ".$this->name." guruh";
    }
}
