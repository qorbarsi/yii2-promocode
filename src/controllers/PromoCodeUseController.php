<?php
namespace dvizh\promocode\controllers;

use yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\helpers\Html;
use yii\filters\VerbFilter;

class PromoCodeUseController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    public function actionEnter()
    {

        $informer = $this->module->informer;
        $informerSettings = $this->module->informerSettings;

        try {
            $promocode = yii::$app->request->post('promocode');

            if(yii::$app->request->post('clear')) {
                yii::$app->promocode->clear();
                $discount = 0;
                $discount_type = null;
                $message = Yii::t('promocode','Промокод удален!');
            } else {
                yii::$app->promocode->enter($promocode);
                $transactions = yii::$app->promocode->get()->promocode->getTransactions()->all();
                $discount_type = yii::$app->promocode->get()->promocode->type;
                if ( $discount_type === 'cumulative' && empty($transactions)) {
                    $discount = 0;
                } else {
                    $discount = yii::$app->promocode->get()->promocode->discount;
                }
                $message = Yii::t('promocode','Промокод применен, скидка ');
                if ($discount_type != 'quantum') {
                    $message .= $discount.'%';
                } else {
                    if(yii::$app->cart) {
                        $message .= ' '.yii::$app->cart->getFormatted($discount);
                    } else {
                        $message .= ' '.$discount.$this->module->currency;
                    }
                }
            }

            if(yii::$app->cart) {
                $newCost = yii::$app->cart->costFormatted;
            } else {
                $newCost = null;
            }

            return json_encode([
                'code'     => Html::encode($promocode),
                'informer' => $informer::widget($informerSettings),
                'result'   => 'success',
                'newCost'  => $newCost,
                'message'  => $message,
                'type'     => $discount_type,
                'discount' => $discount,
                'total'    => Yii::t('cart', 'Total') . ': ' . $newCost,
            ]);
        }
        catch(\Exception $e) {
            return json_encode(['informer' => $informer::widget($informerSettings), 'result' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
