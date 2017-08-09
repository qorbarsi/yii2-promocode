<?php
$this->title = Yii::t('promocode','Статистика по промокодам');
$this->params['breadcrumbs'][] = ['label' => Yii::t('promocode','Промокоды'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-codes-stats">
    <table class="table table-bordered table-hover table-responsive">
        <tbody>
        <tr>
            <th><?= Yii::t('promocode','Название') ?></th>
            <th><?= Yii::t('promocode','С 1 числа') ?></th>
            <th><?= Yii::t('promocode','За 30 дней') ?></th>
            <th><?= Yii::t('promocode','За все время') ?></th>
            <th><?= Yii::t('promocode','Средняя стоимость') ?></th>
            <th><?= Yii::t('promocode','Доля промокода в заказах') ?></th>
        </tr>
        <?php if (isset($promocodes)){ ?>
        <?php foreach ($promocodes as $key => $promocode){ ?>
            <tr>
                <td><?=$promocode['name']?></td>
                <td><?=$promocode['thisMonth']?></td>
                <td><?=$promocode['lastMonth']?></td>
                <td><?=$promocode['allTime']?></td>
                <td><?=$promocode['avgSum']?></td>
                <td><?=$promocode['percent']?> %</td>
            </tr>
        <?php   } ?>
        <?php } ?>
        </tbody>
    </table>
</div>
