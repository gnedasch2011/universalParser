<?php

namespace frontend\modules\tasks\models;

use frontend\modules\admin\traits\CreateAdmitTrait;
use Yii;
use frontend\modules\admin\behaviors\AdminCommonMethodsBehavior;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property int $course_id
 */
class Tasks extends \yii\db\ActiveRecord
{
    use CreateAdmitTrait;
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'class' => AdminCommonMethodsBehavior::className()
        ];
    }


    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'course_id'], 'required'],
            [['id', 'course_id'], 'integer'],
            [['name'], 'string', 'max' => 450],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'course_id' => 'Course ID',
        ];
    }


//    public static function allType()
//    {
//        $allType = self::find()->all();
//        return ArrayHelper::map($allType, 'id', 'name');
//    }


    public function getExercises()
    {
        return $this->hasMany(Exercises::className(), ['id' => 'tasks_id']);
    }

}

