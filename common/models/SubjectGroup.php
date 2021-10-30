<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subject_group".
 *
 * @property int $id
 * @property int $subject_id
 * @property int $group_id
 *
 * @property CourseGroup $group
 * @property Subject $subject
 */
class SubjectGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'group_id'], 'required'],
            [['subject_id', 'group_id'], 'integer'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_id' => 'Fan nomi',
            'group_id' => 'Guruh nomi',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(CourseGroup::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }
}
