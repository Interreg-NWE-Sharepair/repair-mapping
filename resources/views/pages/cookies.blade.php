<x-vue-layout>
    <x-slot name="slot">
        <div>
            <div class="py-6 sm:py-12 bg-gray-100 sm:py-12">
                <div class="container px-4">
                    <div class="md:w-8/12">
                        <h1 class="text-h1 text-primary">Cookie policy Repair Maps</h1>
                    </div>
                </div>
            </div>
            <div class="py-6 sm:py-12 sm:py-12">
                <div class="container px-4">
                    <div class="md:w-4/5">
                        <div class="wysiwyg">
                            <h2 id="1-general">{{ trans('pages.cookies.general.title') }}</h2>
                            <p>{{ trans('pages.cookies.general.text_1') }}</p>
                            <p>{!! trans('pages.cookies.general.text_2', ['link' => '<a href="'. route('privacy') .'">'. trans('pages.cookies.general.link_to_privacy') .'</a>']) !!}</p>
                            <p>{{ trans('pages.cookies.general.text_3') }}</p>
                            <p>{!! trans('pages.cookies.general.text_4', ['mail_to' => '<a href="mailto:noreply@test.com">noreply@test.com</a>']) !!}</p>
                            <p>{{ trans('pages.cookies.general.text_5') }}</p>

                            <h2 id="2-which-cookies-and-why">{{ trans('pages.cookies.which_and_why.title') }}</h2>
                            <p>{{ trans('pages.cookies.which_and_why.text_1') }}</p>
                            <p><strong>{{ trans('pages.cookies.which_and_why.intertitle_1') }}</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.text_2') }}</p>
                            <p><strong>{{ trans('pages.cookies.which_and_why.intertitle_2') }}</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.text_3') }}</p>
                            <p><strong>{{ trans('pages.cookies.which_and_why.intertitle_3') }}</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.text_4') }}</p>

                            <h3 id="list-of-essential-technical-cookies">{{ trans('pages.cookies.which_and_why.cookie.title.essential') }}</h3>
                            <p><strong>rc::a</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.rc') }}</p>
                            <p><em>{{ trans('pages.cookies.which_and_why.cookie.expiration.never') }}</em></p>
                            <p><strong>rc::b</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.rc') }}</p>
                            <p><em>{{ trans('pages.cookies.which_and_why.cookie.expiration.session') }}</em></p>
                            <p><strong>rc::c</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.rc') }}</p>
                            <p><em>{{ trans('pages.cookies.which_and_why.cookie.expiration.session') }}</em></p>
                            <p><strong>__cookieconsent</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.cookieconsent') }}</p>
                            <p><em>{{ trans_choice('pages.cookies.which_and_why.cookie.expiration.years', 1, ['years' => 1]) }}</em></p>
                            <p><strong>XSRF-TOKEN</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.xsrf') }}</p>
                            <p><em>{{ trans_choice('pages.cookies.which_and_why.cookie.expiration.days', 1, ['days' => 1]) }}</em></p>
                            <p><strong>remember_web</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.remember_web') }}</p>
                            <p><em>{{ trans_choice('pages.cookies.which_and_why.cookie.expiration.years', 5, ['years' => 5]) }}</em></p>
                            <p><strong>I18n_redirected</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.i18n_redirected') }}</p>
                            <p><em>{{ trans_choice('pages.cookies.which_and_why.cookie.expiration.years', 1, ['years' => 1]) }}</em></p>

                            <h3 id="list-of-analytical-cookies">{{ trans('pages.cookies.which_and_why.cookie.title.analytical') }}</h3>
                            <p><strong>_ga</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.ga') }}</p>
                            <p><em>{{ trans_choice('pages.cookies.which_and_why.cookie.expiration.years', 2, ['years' => 2]) }}</em></p>
                            <p><strong>_gat</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.gat') }}</p>
                            <p><em>{{ trans_choice('pages.cookies.which_and_why.cookie.expiration.days', 1, ['days' => 1]) }}</em></p>
                            <p><strong>_gid</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.gid') }}</p>
                            <p><em>{{ trans('pages.cookies.which_and_why.cookie.expiration.session') }}</em></p>
                            <p><strong>collect</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.collect') }}</p>
                            <p><em>{{ trans('pages.cookies.which_and_why.cookie.expiration.session') }}</em></p>

                            <h3 id="list-of-marketing-cookies">{{ trans('pages.cookies.which_and_why.cookie.title.marketing') }}</h3>
                            <p><strong>NID</strong></p>
                            <p>{{ trans('pages.cookies.which_and_why.cookie.description.nid') }}</p>
                            <p><em>{{ trans_choice('pages.cookies.which_and_why.cookie.expiration.months', 6, ['months' => 6]) }}</em></p>
                            <p>{{ trans('pages.cookies.which_and_why.text_5') }}</p>
                            <p>Internet Explorer: <a href="https://support.microsoft.com/en-gb/help/17442/windows-internet-explorer-delete-manage-cookies">https://support.microsoft.com/en-gb/help/17442/windows-internet-explorer-delete-manage-cookies</a></p>
                            <p>Microsoft Edge: <a href="http://windows.microsoft.com/en-gb/windows-10/edge-privacy-faq">http://windows.microsoft.com/en-gb/windows-10/edge-privacy-faq</a></p>
                            <p>Chrome: <a href="https://support.google.com/chrome/answer/95647?hl=en">https://support.google.com/chrome/answer/95647?hl=en</a></p>
                            <p>Firefox: <a href="https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences">https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences</a></p>
                            <p>Safari: <a href="https://support.apple.com/kb/PH21411?locale=en_BE&amp;viewlocale=en_US">https://support.apple.com/kb/PH21411?locale=en_BE&amp;viewlocale=en_US</a></p>

                            <h2 id="3-who-do-we-share-data-with">{{ trans('pages.cookies.who.title') }}</h2>
                            <p>{{ trans('pages.cookies.who.text_1') }}</p>
                            <p>{{ trans('pages.cookies.who.text_2') }}</p>
                            <p>{{ trans('pages.cookies.who.text_3') }}</p>

                            <h2 id="4-where-we-process-data">{{ trans('pages.cookies.where.title') }}</h2>
                            <p>{{ trans('pages.cookies.where.text_1') }}</p>
                            <p>{{ trans('pages.cookies.where.text_2') }}</p>

                            <h2 id="5-how-we-process-data">{{ trans('pages.cookies.how.title') }}</h2>
                            <p>{{ trans('pages.cookies.how.text_1') }}</p>
                            <p>{{ trans('pages.cookies.how.text_2') }}</p>
                            <p>{{ trans('pages.cookies.how.text_3') }}</p>

                            <h2 id="6-your-rights">{{ trans('pages.cookies.your_rights.title') }}</h2>
                            <p>{{ trans('pages.cookies.your_rights.text_1') }}</p>
                            <p>{{ trans('pages.cookies.your_rights.text_2') }}</p>
                            <p>{{ trans('pages.cookies.your_rights.text_3') }}</p>
                            <p>{{ trans('pages.cookies.your_rights.text_4') }}</p>
                            <p>{{ trans('pages.cookies.your_rights.text_5') }}</p>
                            <p>{{ trans('pages.cookies.your_rights.text_6') }}</p>
                            <p>{{ trans('pages.cookies.your_rights.text_7') }}</p>
                            <p>{!! trans('pages.cookies.your_rights.text_8', ['mail_to' => '<a href="mailto:noreply@test.com">noreply@test.com</a>']) !!}</p>
                            <p>{!! trans('pages.cookies.your_rights.text_9', ['mail_to' => '<a href="mailto:noreply@test.com">noreply@test.com</a>', 'link' => '<a href="https://www.privacycommission.be">https://www.privacycommission.be</a>']) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-vue-layout>
