<?php

namespace pcrt\widgets\datepicker;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\widgets\InputWidget;

class Datepicker extends InputWidget
{
    /**
     * @var array the options for the underlying Select2 JS plugin.
     *            Please refer to the plugin Web page for possible options.
     *
     * @see https://select2.github.io/options.html#core-options
     */
    public $clientOptions = [];
    /**
     * @var array the event handlers for the underlying Select2 JS plugin.
     *            Please refer to the corresponding plugin Web page for possible events.
     *
     * @see https://select2.github.io/options.html#events
     */
    public $clientEvents = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        //$this->initPlaceholder();
    }

    protected function initPlaceholder()
    {
        /*$multipleSelection = ArrayHelper::getValue($this->options, 'multiple');

        if (!empty($this->options['prompt']) && empty($this->clientOptions['placeholder'])) {
            $this->clientOptions['placeholder'] = $multipleSelection
                ? ArrayHelper::remove($this->options, 'prompt')
                : $this->options['prompt'];

            return null;
        } elseif (!empty($this->options['placeholder'])) {
            $this->clientOptions['placeholder'] = ArrayHelper::remove($this->options, 'placeholder');
        }
        if (!empty($this->clientOptions['placeholder']) && !$multipleSelection) {
            $this->options['prompt'] = is_string($this->clientOptions['placeholder'])
                ? $this->clientOptions['placeholder']
                : ArrayHelper::getValue((array)$this->clientOptions['placeholder'], 'placeholder', '');
        }*/
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->hasModel()) {
            echo "<div class=\"input-group date\" id=\"#$this->attribute\" data-target-input=\"nearest\">";
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
            echo "<div class=\"input-group-append\" data-target=\"#$this->attribute\" data-toggle=\"datetimepicker\">";
            echo "  <div class=\"input-group-text\"><i class=\"fa fa-calendar\"></i></div>";
            echo "</div>"
        } else {
            echo "<div class=\"input-group date\" id=\"#$this->attribute\" data-target-input=\"nearest\">";
            echo Html::dropDownList($this->name, $this->value, $this->options);
            echo "<div class=\"input-group-append\" data-target=\"#$this->attribute\" data-toggle=\"datetimepicker\">";
            echo "  <div class=\"input-group-text\"><i class=\"fa fa-calendar\"></i></div>";
            echo "</div>"
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

        $js[] = ";jQuery('#$id').datepicker($options);";
        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('#$id').on('$event', $handler);";
            }
        }

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
