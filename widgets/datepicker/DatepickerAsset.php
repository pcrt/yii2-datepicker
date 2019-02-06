<?php

namespace pcrt\widgets\datepicker;

use yii\web\AssetBundle;

class DatepickerAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets';

    public $js = [
        'js/moment.min.js',
        'js/daterangepicker.js'
    ];

    public $css = [
        'css/daterangepicker.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
