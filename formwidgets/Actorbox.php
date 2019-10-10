<?php namespace LincolnBrito\Movies\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Config;

class Actorbox extends FormWidgetBase
{

    public function widgetDetails()
    {
        return [
            'name' => 'Actorbox',
            'description' => 'Field for adding actors'
        ];
    }

    public function render()
    {
        return $this->makePartial('widget');
    }

    public function loadAssets()
    {
        $this->addCss('css/select2.min.css');
        $this->addCss('css/custom.css');
        $this->addJs('js/select2.full.min.js');
        $this->addJs('js/select2.custom.js');
    }
}