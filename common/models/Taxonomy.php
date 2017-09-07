<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "taxonomy".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $deleted
 *
 * @property Term[] $terms
 */
class Taxonomy extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%taxonomy}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'filter', 'filter' => 'strip_tags'],
            [['name'], 'filter', 'filter' => 'trim'],
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['deleted'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerms()
    {
        return $this->hasMany(Term::className(), ['taxonomy_id' => 'id']);
    }
}
