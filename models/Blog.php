<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property string $title
 * @property string $anons
 * @property string $content
 * @property integer $user_id
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'anons', 'content', 'user_id', 'category_id', 'created_at', 'updated_at'], 'required'],
            [['anons', 'content'], 'string'],
            [['user_id', 'category_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['title'], 'string', 'max' => 250],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'anons' => 'Anons',
            'content' => 'Content',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }
}
