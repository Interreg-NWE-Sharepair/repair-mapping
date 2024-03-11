<x-vue-layout>
    <r-section>
        @if(session()->has('danger'))
            <h1 class="text-h1 text-primary">{{ trans('pages.error_location.edit.title') }}</h1>
            <p>{{ trans('pages.error_location.edit.text') }}</p>
            <x-messages></x-messages>
{{--            <r-button link href="{{ route('edit-location') }}" color="primary" icon-before="mdiChevronLeft" class="mt-6">--}}
{{--                {{ trans('pages.error_location.edit.cta_form') }}--}}
{{--            </r-button>--}}
            <br />
        @else
            <h1 class="text-h1 text-primary">{{ trans('pages.success.location_edit.title') }}</h1>
            <p>{{ trans('pages.success.location_edit.text') }}</p>
        @endif
        <r-button link href="{{ route('home') }}" color="primary" icon-before="mdiChevronLeft" class="mt-6">
            {{ trans('pages.success.location_edit.cta') }}
        </r-button>
    </r-section>
</x-vue-layout>
