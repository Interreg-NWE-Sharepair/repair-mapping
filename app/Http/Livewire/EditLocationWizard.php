<?php

namespace App\Http\Livewire;

use App\Http\Saloon\Requests\PostChangeSuggestionRequest;
use App\Traits\GetsLocation;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class EditLocationWizard extends AbstractLocationWizard
{
    use GetsLocation;

    public function mount(string $id = null): void
    {
        if(is_null($id)) response(status: 404)->send();
        $this->location_id = $id;

        $data = $this->getLocationForForm($this->location_id);
        if(empty($data)) response(status: 404)->send();

        if(Session::exists('previous-data')) {
            parent::mount();
        }
        else {
            $this->form->fill($data);
        }
    }

    public function submit(): void
    {
        $this->handleForm(new PostChangeSuggestionRequest($this->location_id), route('edit-result'));
    }

    public function render(): View
    {
        return view('livewire.edit-location');
    }
}
