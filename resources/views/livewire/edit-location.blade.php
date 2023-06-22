<div class="bg-gray-100">
    <div class="container">
        <div class="py-6 sm:py-12">
            <div class="max-w-3xl">
                <h1 class="text-h1 text-primary">{{ trans('pages.location.edit_title') }}</h1>
                <p class="text-lrg">{{ trans('pages.location.edit_intro') }}</p>
            </div>
        </div>
        <form wire:submit.prevent="submit">
            {{ $this->form }}
        </form>
    </div>
</div>
