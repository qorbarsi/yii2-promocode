<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PromoCodesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('promocode','Промокоды');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-codes-index">

    <p>
        <?= Html::a(Yii::t('promocode','Добавить промокод'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php if (isset(yii::$app->getModule('promocode')->orderModel)) { ?>
        <div class="well pull-right">
            <p>
                <?= Html::a(Yii::t('promocode','Статистика по промокодам'), ['statistic'], ['class' => 'btn btn-primary btn-block']) ?>
            </p>
            <p>
                <?= Html::a(Yii::t('promocode','Статистика за период'), ['period-statistic'], ['class' => 'btn btn-primary btn-block']) ?>
            </p>
        </div>
    <?php } ?>
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'title',
                    'description:ntext',
                    'code',
                    'discount',
                    [
                        'attribute' => 'status',
                        'filter' => Html::activeDropDownList(
                            $searchModel,
                            'status',
                            ['0' => Yii::t('promocode','Неактивно'), '1' => Yii::t('promocode','Активно')],
                            ['class' => 'form-control', 'prompt' => Yii::t('promocode','Активность')]
                        ),
                        'value' => function($model) {
                            if($model->status == 0) {
                                return Yii::t('promocode','Неактивно');
                            } else {
                                return Yii::t('promocode','Активно');
                            }
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}']
                ],
            ]); ?>
        </div>
    </div>


</div>
