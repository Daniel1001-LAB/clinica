<?php

namespace App\Http\Livewire\Social;

use Livewire\Component;

class SocialList extends Component
{
    protected $listeners=['reloadSocial'=>'reloadSocial'];

    public function reloadSocial(){
        $this->render();
    }

    public function render()
    {
        return view('livewire.social.social-list');
    }
}
