<?php

namespace dvizh\promocode\models;


class PromoCodeCondition extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%promocode_condition}}';
    }

    public function rules()
    {
        return [
            [['sum_start', 'sum_stop', 'value'], 'required'],
            [['sum_start', 'sum_stop', 'value'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('promocode','ID'),
            'sum_start' => Yii::t('promocode','Начальная сумма'),
            'sum_stop' => Yii::t('promocode','Конечная сумма'),
            'value' => Yii::t('promocode','% скидки'),
        ];
    }
}
