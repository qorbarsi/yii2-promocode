<?php
namespace dvizh\promocode;

use yii\base\BootstrapInterface;
use yii;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        if(!$app->has('promocode')) {
            $app->set('promocode', ['class' => 'dvizh\promocode\Promocode']);
        }

        if (!isset($app->i18n->translations['promocode']) && !isset($app->i18n->translations['promocode*'])) {
            $app->i18n->translations['promocode'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => __DIR__.'/messages',
                'forceTranslation' => true
            ];
        }        

        return true;
    }
}
