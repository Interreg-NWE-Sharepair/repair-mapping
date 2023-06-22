<x-vue-layout>
    <x-slot name="slot">
        <div>
            <div class="py-6 sm:py-12 bg-gray-100 sm:py-12">
                <div class="container px-4">
                    <div class="md:w-8/12">
                        <h1 class="text-h1 text-primary">{{ trans('pages.privacy.title') }}</h1>
                    </div>
                </div>
            </div>
            <div class="py-6 sm:py-12 sm:py-12">
                <div class="container px-4">
                    <div class="md:w-4/5">
                        <div class="wysiwyg">
                            <h2 id="1-general">{{ trans('pages.privacy.general.title') }}</h2>
                            <ol>
                                <li>{{ trans('pages.privacy.general.text_1') }}</li>
                                <li>{{ trans('pages.privacy.general.text_2') }}</li>
                                <li>{!! trans('pages.privacy.general.text_3', ['mail_to' => '<a href="mailto:noreply@test.com">noreply@test.com</a>']) !!}</li>
                                <li>{!! trans('pages.privacy.general.text_4', ['link' => '<a href="'. route('cookies') .'">'. trans('pages.privacy.general.link_to_cookies') .'</a>']) !!}</li>
                            </ol>
                            <p>{{ trans('pages.privacy.general.text_5') }}</p>
                            <h2 id="2-what--why-we-process-data">{{ trans('pages.privacy.what_and_why.title') }}</h2>
                            <ol>
                                <li>
                                    <p>{{ trans('pages.privacy.what_and_why.text_1') }}</p>
                                    <p><strong>{{ trans('pages.privacy.what_and_why.when_title') }}</strong> {{ trans('pages.privacy.what_and_why.when_text') }}</p>
                                    <p><strong>{{ trans('pages.privacy.what_and_why.which_title') }}</strong> {{ trans('pages.privacy.what_and_why.which_text') }}</p>
                                    <p><strong>{{ trans('pages.privacy.what_and_why.why_title') }}</strong> {{ trans('pages.privacy.what_and_why.why_text') }}</p>
                                    <p><strong>{{ trans('pages.privacy.what_and_why.legal_title') }}</strong> {{ trans('pages.privacy.what_and_why.legal_text') }}</p>
                                </li>
                                <li>
                                    <p>{{ trans('pages.privacy.what_and_why.text_2') }}</p>
                                </li>
                            </ol>
                            <ul>
                                <li>{{ trans('pages.privacy.what_and_why.text_3') }}</li>
                                <li>{{ trans('pages.privacy.what_and_why.text_4') }}</li>
                                <li>{{ trans('pages.privacy.what_and_why.text_5') }}</li>
                                <li>{{ trans('pages.privacy.what_and_why.text_6') }}</li>
                                <li>{{ trans('pages.privacy.what_and_why.text_7') }}</li>
                                <li>{{ trans('pages.privacy.what_and_why.text_8') }}</li>
                                <li>{{ trans('pages.privacy.what_and_why.text_9') }}</li>
                            </ul>
                            <ol start="3">
                                <li>{{ trans('pages.privacy.what_and_why.text_10') }}</li>
                            </ol>
                            <h2 id="3-who-do-we-share-data-with">{{ trans('pages.privacy.who.title') }}</h2>
                            <ol>
                                <li>{{ trans('pages.privacy.who.text_1') }}</li>
                                <li>{{ trans('pages.privacy.who.text_2') }}</li>
                                <li>{{ trans('pages.privacy.who.text_3') }}</li>
                            </ol>
                            <h2 id="4-where-we-process-data">{{ trans('pages.privacy.where.title') }}</h2>
                            <ol>
                                <li>{{ trans('pages.privacy.where.text_1') }}</li>
                                <li>{{ trans('pages.privacy.where.text_2') }}</li>
                            </ol>
                            <h2 id="5-how-we-process-data">{{ trans('pages.privacy.how.title') }}</h2>
                            <ol>
                                <li>{{ trans('pages.privacy.how.text_1') }}</li>
                                <li>{{ trans('pages.privacy.how.text_2') }}</li>
                                <li>{{ trans('pages.privacy.how.text_3') }}</li>
                                <li>{{ trans('pages.privacy.how.text_4') }}</li>
                            </ol>
                            <h2 id="6-your-rights">{{ trans('pages.privacy.your_rights.title') }}</h2>
                            <ol>
                                <li>{{ trans('pages.privacy.your_rights.text_1') }}</li>
                                <li>{{ trans('pages.privacy.your_rights.text_2') }}</li>
                                <li>{!! trans('pages.privacy.your_rights.text_3', ['mail_to' => '<a href="mailto:noreply@test.com">noreply@test.com</a>']) !!}</li>
                                <li>{{ trans('pages.privacy.your_rights.text_4') }}</li>
                                <li>{{ trans('pages.privacy.your_rights.text_5') }}</li>
                                <li>{{ trans('pages.privacy.your_rights.text_6') }}</li>
                                <li>{{ trans('pages.privacy.your_rights.text_7') }}</li>
                                <li>{!! trans('pages.privacy.your_rights.text_8', ['mail_to' => '<a href="mailto:noreply@test.com">noreply@test.com</a>']) !!}</li>
                                <li>{!! trans('pages.privacy.your_rights.text_9', ['mail_to' => '<a href="mailto:noreply@test.com">noreply@test.com</a>', 'link' => '<a href="https://www.privacycommission.be">https://www.privacycommission.be</a>']) !!}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-vue-layout>
