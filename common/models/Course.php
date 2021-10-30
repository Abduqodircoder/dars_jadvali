<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 *
 * @property CourseGroup[] $courseGroups
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[CourseGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourseGroups()
    {
        return $this->hasMany(CourseGroup::className(), ['course_id' => 'id']);
    }

    public function getCourse()
    {
        return $this->id."-kurs";
    }
}
