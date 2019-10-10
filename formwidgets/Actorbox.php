<?php namespace LincolnBrito\Movies\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Config;
use LincolnBrito\Movies\Models\Actor;

class Actorbox extends FormWidgetBase
{

    public function widgetDetails()
    {
        return [
            'name' => 'Actorbox',
            'description' => 'Field for adding actors'
        ];
    }

    public function prepareVars() {
        $this->vars['id'] = $this->model->id;
        $this->vars['actors'] = Actor::all()->lists('full_name','id');
        $this->vars['name'] = $this->getFieldName()."[]";
        $this->vars['selectedValues'] = $this->getLoadValue();
    }

    public function render()
    {
        $this->prepareVars();        
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