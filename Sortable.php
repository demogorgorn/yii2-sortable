<?php

/**
 * @copyright Copyright &copy; Oleg Martemjanov, foreign.by, 2015
 * @package yii2-sortable
 * @version 1.0
 */

namespace demogorgorn\sortable;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * Create sortable lists and grids using HTML5 drag and drop API for Yii 2.0.
 * Based on html5sortable plugin.
 *
 * @see http://rubaxa.github.io/Sortable/
 * @author Oleg Martemjanov <demogorgorn@gmail.com>
 * @since 1.0
 */
class Sortable extends \yii\base\Widget
{
    /**
     * @var string, variable name of js object
     */
    public $varName = null;

    public $options = [];
    
    public $clientOptions = [];

    /**
     * @var array the sortable items configuration for rendering elements within the sortable
     * list / grid. You can set the following properties:
     * - content: string, the list item content (this is not HTML encoded)
     * - disabled: bool, whether the list item is disabled
     * - options: array, the HTML attributes for the list item.
     */
    public $items = [];

    /**
     * Initializes the widget
     */
    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) 
            $this->options['id'] = $this->getId();

        $this->registerAssets();
        
        echo Html::beginTag('ul', $this->options);
    }

    /**
     * Runs the widget
     *
     * @return string|void
     */
    public function run()
    {
        echo $this->renderItems();
        echo Html::endTag('ul');
    }

    /**
     * Render the list items for the sortable widget
     *
     * @return string
     */
    protected function renderItems()
    {
        $items = '';
        $disabled = false;
        
        foreach ($this->items as $item) {
            $options = ArrayHelper::getValue($item, 'options', []);
           
            $content = ArrayHelper::getValue($item, 'content', '');
            $items .= Html::tag('li', $content, $options) . PHP_EOL;
        }
        return $items;
    }

    /**
     * Register client assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        SortableAsset::register($view);
        
        $id = $this->options['id'];
        
        $js = '';

        if ($varName !== null)
            $js = "var {$varName} = ";

        $js .= "Sortable.create({$id}, ";
        
        $clientOptions = Json::encode($this->clientOptions);

        $js .= $clientOptions;

        $js .= ");";

        $view->registerJs($js);
    }
}