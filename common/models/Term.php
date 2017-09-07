<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "term".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $taxonomy_id
 * @property string $name
 * @property integer $order
 * @property string $created_at
 * @property string $updated_at
 * @property integer $deleted
 *
 * @property ItemTerm[] $itemTerms
 * @property Term $parent
 * @property Taxonomy $taxonomy
 */
class Term extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%term}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'taxonomy_id', 'order', 'deleted'], 'integer'],
            [['taxonomy_id', 'name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['taxonomy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Taxonomy::className(), 'targetAttribute' => ['taxonomy_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'taxonomy_id' => 'Taxonomy ID',
            'name' => 'Name',
            'order' => 'Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemTerms()
    {
        return $this->hasMany(ItemTerm::className(), ['term_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxonomy()
    {
        return $this->hasOne(Taxonomy::className(), ['id' => 'taxonomy_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Term::className(), ['id' => 'parent_id']);
    }
}
