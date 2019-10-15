<?php namespace LincolnBrito\Movies;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'LincolnBrito\Movies\Components\Actors' => 'actors',
            'LincolnBrito\Movies\Components\ActorForm' => 'actorform'
        ];
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
