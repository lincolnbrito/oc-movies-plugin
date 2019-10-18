<?php namespace LincolnBrito\Movies\Components;

use Cms\Classes\ComponentBase;
use Input;
use LincolnBrito\Movies\Models\Actor;
use Flash;
use Validator;
use Redirect;

class ActorForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Actor form',
            'description' => 'Enter actors'
        ];
    }

    public function onSave()
    {
        $actor = new Actor();
        $actor->name = Input::get('name');
        $actor->lastname = Input::get('lastname');
        $actor->actorimage = Input::file('actorimage');
        $actor->save();

        Flash::success('Actor added');

        return Redirect::back();
    }
}