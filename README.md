yii2-sortable
=====================
Yii2 wrapper for Sortable (https://github.com/RubaXa/Sortable), a minimalist JavaScript library for reorderable drag-and-drop lists on modern browsers and touch devices. 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist demogorgorn/yii2-sortable "*"
```

or add

```
"demogorgorn/yii2-sortable": "*"
```

to the require section of your `composer.json` file.


How to use
----------

On your view file.

```php

// items data example
<?php 
	$items = [
		[
        	'content' => 'item-1',
            'options' => ['data-id' => 'optional data attribute'],
        ],
        [
        	'content' => 'item-name',
        ]
    ];

?>


<?php echo \demogorgorn\sortable\Sortable::widget([
		'varName' => 'editable',
		'editable' => true,
		'options' => [
			'class' => 'block__list',
			'id' => 'currencylist',
		],
		'items'=> $items,
		'clientOptions' => [
		'animation' => 150,
		'filter' => '.js-remove',
		'onFilter' => new \yii\web\JsExpression('function (evt) {
			var code = evt.item.getAttribute("data-id");
			evt.item.parentNode.removeChild(evt.item);
		}'),
		'onUpdate' => new \yii\web\JsExpression('function (evt) {
			// do something with js
		}'),
	],
]); ?>

```
