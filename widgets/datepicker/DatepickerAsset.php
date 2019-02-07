<?php

namespace pcrt\widgets\datepicker;

use yii\web\AssetBundle;

class DatepickerAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets';

    public $js = [
        'js/moment.min.js',
        'js/flatpickr.min.js',
        'js/flatpickr.it.min.js'
    ];

    public $css = [
        'css/flatpickr.min.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
