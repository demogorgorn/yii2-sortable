<?php

/**
 * @copyright Copyright &copy; Oleg Martemjanov, foreign.by, 2015
 * @package yii2-sortable
 * @version 1.0
 */

namespace demogorgorn\sortable;

/**
 * Sortable bundle for \demogorgorn\sortable\Sortable
 *
 * @author Oleg Martemjanov <demogorgorn@gmail.com>
 * @since 1.0
 */
class SortableAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@demogorgorn/sortable/assets';
    public $js = [
        'sortable.js'
    ];
	
	public $css = [
        'app.css'
    ];
}