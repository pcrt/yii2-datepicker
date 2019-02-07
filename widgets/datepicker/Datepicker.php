<?php

/**
 * @link http://www.protocollicreativi.it
 * @copyright Copyright (c) 2017 Protocolli Creativi s.n.c.
 * @license LICENSE.md
 */

namespace pcrt\widgets\datepicker;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\widgets\InputWidget;

/**
 * Yii2 implementation of flatpicker library (https://flatpickr.js.org/)
 * @author Marco Petrini <marco@bhima.eu>
 */

class Datepicker extends InputWidget
{

    /**
     * @var array the options for the underlying flatpicker JS plugin.
     *            Please refer to the plugin Web page for possible options.
     *
     * @see https://select2.github.io/options.html#core-options
     */
    public $clientOptions = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::TextInput($this->name, $this->value, $this->options);
        }
        $this->registerClientScript();
    }

    /**
     * @inheritdoc
     */
    public function registerClientScript()
    {
        $view = $this->getView();

        $this->registerBundle($view);

        $options = !empty($this->clientOptions)
            ? Json::encode($this->clientOptions)
            : '';

        $id = $this->options['id'];

        $js[] = ";jQuery('#$id').flatpickr($options);";

        $view->registerJs(implode("\n", $js));
    }

    /**
     * Registers asset bundle
     *
     * @param View $view
     */
    protected function registerBundle(View $view)
    {
        DatepickerAsset::register($view);
    }
}
