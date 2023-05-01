<?php

namespace App\Http\Livewire\Social;

use App\Models\Social;
use Livewire\Component;

class SocialCreate extends Component
{

    public $openModal = false;
    public $socials=[];
    public $url;
    public $social_id, $user;
    protected $rules = ['url' => 'required', 'social_id' => 'required'];

    public function render()
    {

        $this->socials = Social::orderBy('name', 'ASC')->get();
        return view('livewire.social.social-create');
    }


    public function addSocial(){
        $data = $this->validate();
        $this->openModal = false;
        //dd($data);
        $user = auth()->user();
        $user->socials()->attach([$this->social_id=>['url'=>$this->url]]);
        $this->emitTo('social.social-delete', 'reloadSocial');
    }
}
