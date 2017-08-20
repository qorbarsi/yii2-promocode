<?php
namespace dvizh\promocode\widgets;

use yii\helpers\Html;
use yii\helpers\Url;
use dvizh\promocode\models\PromoCodeUse;
use yii;

class Enter extends \yii\base\Widget
{
    public $currency = '';
    public $ok_button = '<i class="glyphicon glyphicon-ok"></i>';
    public $del_button = '<i class="glyphicon glyphicon-remove"></i>';
    public $view = 'enter_form';
    public $cssClass = '';

    public function init()
    {
        parent::init();
        \dvizh\promocode\assets\WidgetAsset::register($this->getView());
        $this->currency = empty($this->currency) ? Yii::$app->getModule('promocode')->currency : $this->currency;
    }

    public function run()
    {
        $model = new PromoCodeUse;

        return $this->render($this->view, [
            'model'    => $model,
            'currency' => $this->currency,
            'ok'       => $this->ok_button,
            'del'      => $this->del_button,
            'cssClass' => $this->cssClass,
        ]);
    }
}
