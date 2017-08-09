<?php
namespace dvizh\promocode\models;

use Yii;

class PromoCodeUse extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%promocode_use}}';
    }

    public function rules()
    {
        return [
            [['user_id', 'promocode_id', 'date'], 'required'],
            [['promocode_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('promocode','ID'),
            'user_id' => Yii::t('promocode','Идентификатор пользователя'),
            'promocode_id' => Yii::t('promocode','Промокод'),
            'user_id' => Yii::t('promocode','Пользователь'),
            'date' => Yii::t('promocode','Дата использования'),
        ];
    }

    public function getPromocode()
    {
        return $this->hasOne(PromoCode::className(), ['id' => 'promocode_id']);
    }
}
