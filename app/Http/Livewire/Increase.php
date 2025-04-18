<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Increase extends Component
{
   public $age=0;

   public function increase(){
       $this->age++;
   }

    public function render()
    {
        return view('livewire.increase');
    }
}
