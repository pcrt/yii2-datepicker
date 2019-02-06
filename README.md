Yii2-Datepicker
========

[Daterangepicker](http://www.daterangepicker.com/) gives you a customizable daterangepicker with support for multidate, time, localization and many other highly used options.

##Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require pcrt/yii2-datepicker "*"
```

or add

```
"pcrt/yii2-datepicker": "*"
```

to the require section of your `composer.json` file.

## Usage

Once the extension is installed, modify your application configuration to include:

```php
use pcrt\widgets\datepicker\Datepicker:


// with \yii\bootstrap\ActiveForm;
echo $form
    ->field($model, 'attribute')
    ->widget(
        Datepicker::class,
        [
          'clientOptions' => [
            'singleDatePicker' => true,
            'showDropdowns' => true,
          ]
        ]
    );

// as widget
echo Datepicker::widget([
    'clientOptions' => [
      'showDropdowns' => true,
    ]
]);
```

## License

Yii2-Datepicker is released under the BSD-3 License. See the bundled `LICENSE.md` for details.

Enjoy!
