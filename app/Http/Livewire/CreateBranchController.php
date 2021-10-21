<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateBranchController extends Component
{
    public function render()
    {
        return view('livewire.branch.create-branch.create-branch')->extends('layouts.theme.app')
        ->section('content');
    }


    public function edit(){
      return view('livewire.branch.create-branch.create-branch')->extends('layouts.theme.app')
      ->section('content');

    }
}
