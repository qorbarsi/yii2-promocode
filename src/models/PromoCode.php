<?php
namespace dvizh\promocode\models;

use Yii;


class PromoCode extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%promocode}}';
    }

    public function rules()
    {
        return [
            [['title', 'code', 'discount', 'status'], 'required'],
            [['description','type'], 'string'],
            [['discount', 'status','amount'], 'integer'],
            [['date_elapsed'], 'safe'],
            [['title'], 'string', 'max' => 256],
            [['code'], 'unique'],
            [['code'], 'string', 'max' => 14]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('promocode','ID'),
            'title' => Yii::t('promocode','Название кода(акции)'),
            'description' => Yii::t('promocode','Описание'),
            'code' => Yii::t('promocode','Код'),
            'type' => Yii::t('promocode','Тип скидки промокода'),
            'discount' => Yii::t('promocode','Значение скидки'),
            'status' => Yii::t('promocode','Статус'),
            'date_elapsed' => Yii::t('promocode','Срок истечения'),
            'amount' => Yii::t('promocode','Количество использований'),
        ];
    }

    public function getTargetModels()
    {
        return $this->hasMany(PromocodeToItem::className(), ['promocode_id' => 'id']);
    }

    public function getTransactions()
    {
        return $this->hasMany(PromoCodeUsed::className(),['promocode_id' => 'id']);
    }

    public function getConditions()
    {
        return $this->hasMany(PromoCodeToCondition::className(),['promocode_id' => 'id']);
    }
}
