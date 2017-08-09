<?php
namespace dvizh\promocode\models;

use Yii;


class PromoCodeUsed extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%promocode_used}}';
    }

    public function rules()
    {
        return [
            [['promocode_id', 'order_id', 'date'], 'required'],
            [['promocode_id', 'order_id', 'user'], 'integer'],
            [['sum'],'number'],
            [['date'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('promocode','ID'),
            'promocode_id' => Yii::t('promocode','ID Промокода'),
            'order_id' => Yii::t('promocode','ID Заказа'),
            'date' => Yii::t('promocode','Дата использования'),
            'user' => Yii::t('promocode','Использовано пользователем'),
            'sum' => Yii::t('promocode','Сумма использования'),
        ];
    }
}
