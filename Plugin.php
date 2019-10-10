<?php namespace LincolnBrito\Movies;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function registerFormWidgets()
    {
        return [
            'LincolnBrito\Movies\FormWidgets\Actorbox' => 'actorbox'
        ];
    }
}
