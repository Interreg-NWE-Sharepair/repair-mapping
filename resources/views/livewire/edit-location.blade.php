<div class="bg-gray-100">
    <div class="container py-12 space-y-6">
        <div>
            <div class="max-w-3xl">
                <h1 class="text-h1 text-primary">{{ trans('pages.location.edit_title') }}</h1>
                <p class="text-lrg">{{ trans('pages.location.edit_intro') }}</p>
            </div>
        </div>
        <form wire:submit="submit">
            {{ $this->form }}
        </form>
    </div>
</div>
