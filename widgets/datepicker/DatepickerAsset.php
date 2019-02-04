<?php

namespace pcrt\widgets\select2;

use yii\web\AssetBundle;

class DatepickerAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets';

    public $js = [
        'js/tempusdominus-bootstrap-4.min.js'
    ];

    public $css = [
        'css/tempusdominus-bootstrap-4.min.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
