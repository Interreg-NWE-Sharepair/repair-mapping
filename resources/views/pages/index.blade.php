<x-vue-layout>
    <x-slot name="slot">
        <div class="py-6 sm:py-12 bg-gray-100 sm:py-12">
            <div class="container px-4">
                <div class="md:w-8/12">
                    <h1 class="text-h1 text-primary">{{ trans('pages.index.title') }}</h1>
                    <p>{{ trans('pages.index.intro') }}</p>
                </div>
            </div>
        </div>

        <custom-repair-map
            locale="{{ LaravelLocalization::getCurrentLocale() }}"
            mapbox-access-token="{{ config('map.mapbox_access_token') }}"
        >
        </custom-repair-map>
    </x-slot>
</x-vue-layout>
