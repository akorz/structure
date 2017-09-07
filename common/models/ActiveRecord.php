<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

class ActiveRecord extends \yii\db\ActiveRecord
{
    const DELETED_YES = 1;
    const DELETED_NO  = 0;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className()
            ],
            [
                'class' => SoftDeleteBehavior::className(),
                'softDeleteAttributeValues' => [
                    'deleted' => true
                ],
                'replaceRegularDelete' => true
            ],
        ];
    }

    public function isDeleted()
    {
        return $this->deleted;
    }
}