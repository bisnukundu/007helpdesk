<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Promot_users;

class Buttoncontrol extends Component {
    public $data = [];
    public function mount(){
        $data[] =Promot_users::all();
    }
    public function render() {
        return view( 'livewire.buttoncontrol');
    }
}
