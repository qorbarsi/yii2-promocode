<?php

namespace dvizh\promocode\models;

use Yii;

class PromoCodeToCondition extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%promocode_to_condition}}';
    }

    public function rules()
    {
        return [
            [['promocode_id', 'condition_id'], 'required'],
            [['promocode_id', 'condition_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('promocode','ID'),
            'promocode_id' => Yii::t('promocode','ID Помокода'),
            'condition_id' => Yii::t('promocode','ID Экземпляра условия'),
        ];
    }

    public function getCondition()
    {
        return $this->hasOne(PromoCodeCondition::className(),['condition_id' => 'condition_id']);
    }
}
