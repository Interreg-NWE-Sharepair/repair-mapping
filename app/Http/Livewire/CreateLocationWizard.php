<?php

namespace App\Http\Livewire;

use App\Http\Saloon\Requests\PostLocationSuggestionRequest;
use Illuminate\Contracts\View\View;

class CreateLocationWizard extends AbstractLocationWizard
{
    public function submit(): void
    {
        $this->handleForm(new PostLocationSuggestionRequest(), route('create-result'));
    }

    public function render(): View
    {
        return view('livewire.create-location');
    }
}
