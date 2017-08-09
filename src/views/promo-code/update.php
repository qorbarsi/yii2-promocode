<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PromoCodes */

$this->title = Yii::t('promocode','Изменить промокод: {name}', ['name' => $model->title] );
$this->params['breadcrumbs'][] = ['label' => Yii::t('promocode','Промокоды'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('promocode','Изменить промокод: {name}', ['name' => $model->title] );
?>
<div class="promo-codes-update">

    <?= $this->render('_form', [
        'model' => $model,
        'targetModelList' => $targetModelList,
        'items' => $items,
        'conditions' => $conditions,
        //'usesModelMap' => $clientsModelMap,
    ]) ?>

</div>
