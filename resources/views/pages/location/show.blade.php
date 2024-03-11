<x-vue-layout>
    @if($location)
{{--    @php dd($location) @endphp--}}
        <div>
            @php($current_locale = LaravelLocalization::getCurrentLocale())
            <r-section class="bg-gray-100">
                <r-grid>
                    <r-grid-item class="md:w-8/12">
                        <h1 class="!mb-4 text-h1 text-primary">{{ $location->getTranslatedName($current_locale) }}</h1>
                        <div class="flex flex-col flex-wrap -mx-4 text-lg font-semibold sm:flex-row skew-dividers">
                            <div class="px-4">
                                @if(!is_null($location->organisation_type))
                                    @php($category_color = \App\Constants\CategoryColor::byCode($location->organisation_type->code))
                                    <div>
                                        <r-icon
                                            name="mdiMapMarker"
                                            :fill="'{{ $category_color }}'"
                                            class="mr-1"></r-icon>
                                        <span>
                                            {{ $location->getTranslatedOrganisationType($current_locale) }}
                                        </span>
                                    </div>
                                @else
                                    <r-icon name="mdiMapMarker" fill="'#000000'" class="mr-1"></r-icon>
                                    <span>
                                        {{ trans('pages.detail_organisation_type_unknown') }}
                                    </span>
                                @endif
                            </div>

                            @if(!empty($location->eco_cheques))
                                <div class="font-semibold text-small flex items-center mt-1 px-4">
                                    <x-ecocheque-image/>
                                    <span>{{ $location->getEcoChequesJoinedString() }}</span>
                                </div>
                            @endif
                            @if($location->active_repairers_count)
                            <div class="px-4">
                                <span class="mr-1 text-secondary"> {{ $location->active_repairers_count }} </span>
                                <span> {{ trans('pages.label.active_repairers') }} </span>
                            </div>
                            @endif
                            @if($location->repaired_devices_count)
                            <div class="px-4">
                                <span class="mr-1 text-primary"> {{ $location->repaired_devices_count }} </span>
                                <span> {{ trans('pages.label.repaired_devices') }} </span>
                            </div>
                            @endif
                        </div>
                        @if($location->description)
                            <div class="mt-4 mb-2 text-large">
                                {{ $location->getTranslatedDescription($current_locale) }}
                            </div>
                        @endif
                        <div class="flex items-center mt-6">
                            <r-icon name="mdiMapMarker" class="flex-shrink-0 mr-2 text-primary"></r-icon>
                            @if(isset($location->contacts['google']))
                                <div>
                                    @foreach($location->contacts['google'] as $google)
                                        <span>
                                            <a href="{{ $google->value }}" target="_blank" rel="noopener norefererr" class="hover:no-underline">
                                                {{ $location->address_formatted }}
                                            </a>
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <div>
                                    {{ $location->address_formatted }}
                                </div>
                            @endif
                        </div>
                        @if(isset($location->contacts['phone']))
                            @foreach($location->contacts['phone'] as $contact)
                                <div class="flex items-center mt-1">
                                    <r-icon name="contact_phone" class="flex-shrink-0 mr-2 text-primary"></r-icon>
                                    <a href="tel:{{ $contact->value }}" class="underline truncate hover:no-underline">{{ $contact->name }}</a>
                                </div>
                            @endforeach
                        @endif
                        @if(isset($location->contacts['mobile']))
                            @foreach($location->contacts['mobile'] as $contact)
                            <div class="flex items-center mt-1">
                                <r-icon name="contact_mobile" class="flex-shrink-0 mr-2 text-primary"></r-icon>
                                <a href="tel:{{ $contact->value }}" class="underline truncate hover:no-underline">{{ $contact->name }}</a>
                            </div>
                            @endforeach
                        @endif
                        @if(isset($location->contacts['email']))
                            @foreach($location->contacts['email'] as $contact)
                            <div class="flex items-center mt-1">
                                <r-icon name="contact_email" class="flex-shrink-0 mr-2 text-primary"></r-icon>
                                <a href="mailto:{{ $contact->value }}" class="underline truncate hover:no-underline">{{ $contact->name }}</a>
                            </div>
                            @endforeach
                        @endif
                        @if(isset($location->contacts['website']))
                            @foreach($location->contacts['website'] as $contact)
                            <div class="flex items-center mt-1">
                                <r-icon name="contact_website" class="flex-shrink-0 mr-2 text-primary"></r-icon>
                                <a href="{{ $contact->value }}" class="underline truncate hover:no-underline">{{ $contact->name }}</a>
                            </div>
                            @endforeach
                        @endif
                        @if(isset($location->contacts['facebook']))
                            @foreach($location->contacts['facebook'] as $contact)
                                <div class="flex items-center mt-1">
                                    <r-icon name="contact_facebook" class="flex-shrink-0 mr-2 text-primary"></r-icon>
                                    <a href="{{ $contact->value }}" class="underline truncate hover:no-underline">{{ $contact->name }}</a>
                                </div>
                            @endforeach
                        @endif
                        @if(isset($location->contacts['instagram']))
                            @foreach($location->contacts['instagram'] as $contact)
                                <div class="flex items-center mt-1">
                                    <r-icon name="contact_instagram" class="flex-shrink-0 mr-2 text-primary"></r-icon>
                                    <a href="{{ $contact->value }}" class="underline truncate hover:no-underline">{{ $contact->name }}</a>
                                </div>
                            @endforeach
                        @endif
                        @if(isset($location->contacts['linkedin']))
                            @foreach($location->contacts['linkedin'] as $contact)
                                <div class="flex items-center mt-1">
                                    <r-icon name="contact_linkedin" class="flex-shrink-0 mr-2 text-primary"></r-icon>
                                    <a href="{{ $contact->value }}" class="underline truncate hover:no-underline">{{ $contact->name }}</a>
                                </div>
                            @endforeach
                        @endif
                    </r-grid-item>
                    @if($location->logo)
                        <r-grid-item class="md:w-4/12">
                            <img src="{{ $location->logo->url }}" alt="Logo" class="block w-full">
                        </r-grid-item>
                    @endif
                </r-grid>
            </r-section>
            @if($location->device_types)
                <r-section class="section--default">
                    <r-panel>
                        <h2 class="text-h2 text-primary">{{ trans('pages.label.device_types') }}</h2>
                        <div class="flex flex-wrap -mx-1 -mt-1">
                            @foreach($location->device_types as $type)
                                <div class="px-1 m-1 font-bold bg-white rounded-3xl text-secondary text-tiny">
                                    {{ $type->getTranslatedName($current_locale) }}
                                </div>
                            @endforeach
                        </div>
                    </r-panel>
                </r-section>
            @endif
            @if($location->has_warranty && isset($location->warranty_description['default']))
                <r-section class="section--default">
                    <r-panel>
                        <h2 class="text-h2 text-secondary">
                            {{ trans('pages.location.warranty_title') }}
                        </h2>
                        @if($location->warranty_description)
                            <span>
                                {{ $location->getTranslatedWarrantyDescription($current_locale) }}
                            </span>
                        @endif
                    </r-panel>
                </r-section>
            @endif
            @if(!empty($location->images))
                <r-section class="section--default">
                    <r-gallery :items="{{ json_encode($location->images) }}">
                        <template #thumbnail="{ item }">
                            <img :src="item.url" alt="" class="object-cover w-full" />
                        </template>
                        <template #modal="{ item }">
                            <img :src="item.url" alt="" class="flex object-contain max-w-full mx-auto" />
                        </template>
                    </r-gallery>
                </r-section>
            @endif
            @if($location->active_on_repair_connects && $has_statistics)
                <r-section class="section--default">
                    <r-panel>
                        <h2 class="text-h2 text-primary">{{ trans('pages.label.organisation_statistics') }}</h2>
                        <div class="flex flex-wrap -mx-1 -mt-1">
                            <iframe
                                id="statistics"
                                v-resize="{checkOrigin: false}"
                                src="{{ env('STATISTICS_BASE_URL', 'https://repairconnects.org/api/repair/statistics') }}?lang={{ $current_locale }}&location={{ $location->id }}&view=3"
                                frameborder="0"
                                style="width: 1px; min-width: 100%">
                            </iframe>
                        </div>
                    </r-panel>
                </r-section>
            @endif
            <r-section class="section--default">
                <r-panel>
                    <h2 class="text-h2 text-secondary">
                        {{ trans('pages.location.suggest_correction.title') }}
                    </h2>
                    <p class="mb-6">{{ trans('pages.location.suggest_correction.text') }}</p>
                    <r-button href="{{ route('edit-location', ['id' => $location->getTranslatedSlug($current_locale)]) }}" link color="secondary" icon-after="mdiChevronRight">
                        {{ trans('pages.location.suggest_correction.cta') }}
                    </r-button>
                </r-panel>
            </r-section>
        </div>
    @endif
</x-vue-layout>
