<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

        <!-- Fonts -->
        <link data-n-head="1" data-hid="gf-preload" rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,400;0,700;0,900;1,400&amp;display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,400;0,700;0,900;1,400&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @filamentStyles

        <!-- Scripts -->
{{--        <script src="{{ mix('js/manifest.js') }}" defer></script>--}}
{{--        <script src="{{ mix('js/vendor.js') }}" defer></script>--}}
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">
        @filamentScripts
    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-white">
            @php
                $currentLocale = LaravelLocalization::getCurrentLocale();
                $currentRoute = Route::currentRouteName();
            @endphp
                <!-- Page Heading -->
            <header>
                <div class="py-6 sm:py-12 bg-gray-100 !py-2">
                    <div class="container px-4">
                        <div class="container px-4 text-right text-small">
                            <a href="{{ LaravelLocalization::getLocalizedURL('de') }}"
                               class="ml-2 no-underline {{ $currentLocale == 'de' ? 'font-bold' : '' }}">DE</a>
                            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                               aria-current="page"
                               class="ml-2 no-underline {{ $currentLocale == 'en' ? 'font-bold' : '' }}">EN</a>
                            <a href="{{ LaravelLocalization::getLocalizedURL('fr') }}"
                               class="ml-2 no-underline {{ $currentLocale == 'fr' ? 'font-bold' : '' }}">FR</a>
                            <a href="{{ LaravelLocalization::getLocalizedURL('nl') }}"
                               class="ml-2 no-underline {{ $currentLocale == 'nl' ? 'font-bold' : '' }}">NL</a>
                        </div>
                    </div>
                </div>
                <div class="py-6 sm:py-12 bg-white !py-4">
                    <div class="container px-4">
                        <div class="flex items-center">
                            <a href="{{ route('home') }}" class="text-[45px] font-black leading-10 no-underline nuxt-link-exact-active nuxt-link-active" aria-current="page">
                                <div class="text-primary">REPAIR</div>
                                <div class="text-secondary">MAPS</div>
                            </a>
                            <ul class="flex flex-col justify-end flex-grow space-x-8 text-right align-self-stretch md:flex-row nav-main">
                                <li>
                                    <a href="{{ route('home') }}"
                                       class="nav__item hover:underline hover:text-primary hover:text-bold {{ str_contains('home', $currentRoute) ? 'font-bold text-primary' : '' }}"
                                       data-text="{{ __('pages.index.nav') }}"
                                       aria-current="page">{{ trans('pages.index.nav') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}" class="nav__item hover:underline hover:text-primary hover:text-bold {{ str_contains('about', $currentRoute) ? 'font-bold text-primary' : '' }}"
                                       data-text="{{ trans('pages.about.nav') }}">{{ trans('pages.about.nav') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            <footer>
                <div class="py-6 sm:py-12 sm:py-8 bg-primary text-primary-contrast">
                    <div class="container px-4">
                        <div class="flex items-center">
                            <div class="text-[45px] font-black leading-10">
                                <div>REPAIR</div>
                                <div>MAPS</div>
                            </div>
                            <ul class="flex flex-col justify-end flex-grow space-x-8 text-right align-self-stretch md:flex-row nav-main">
                                <li>
                                    <a  href="{{ route('home') }}"
                                        class="nav__item hover:underline hover:text-primary-contrast hover:text-bold {{ str_contains('home', $currentRoute) ? 'font-bold' : '' }}"
                                        data-text="Repair map" aria-current="page">
                                        {{ trans('pages.index.nav') }}
                                    </a>
                                </li>
                                <li>
                                    <a  href="{{ route('about') }}"
                                        class="nav__item hover:underline hover:text-primary-contrast hover:text-bold {{ str_contains('about', $currentRoute) ? 'font-bold' : '' }}"
                                        data-text="About this project">
                                        {{ trans('pages.about.nav') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div  class="py-6 sm:py-12">
                    <div class="container px-4">
                        <div
                            class="mb-6 text-center text-lrg">{{ trans('pages.label.our_partners') }}</div>
                        <div  class="flex flex-wrap items-center justify-center -mx-4 -mt-4">
                            <div  class="w-1/3 px-4 mt-4 sm:w-1/4 md:w-1/6">
                                <a href="https://repairtogether.be/" target="_blank" rel="noopener noreferrer" class="block text-center">
                                    <img  src="{{ asset('/img/logo_repair_together.4309459.png') }}" loading="lazy" alt="" width="80" height="80" class="inline-block">
                                </a>
                            </div>
                            <div  class="w-1/3 px-4 mt-4 sm:w-1/4 md:w-1/6">
                                <a href="https://www.wallonie.be/fr/" target="_blank" rel="noopener noreferrer" class="block text-center">
                                    <img  src="{{ asset('/img/logo_wallonie.b35c5ee.png') }}" loading="lazy" alt="" width="80" height="80" class="inline-block">
                                </a>
                            </div>
                            <div  class="w-1/3 px-4 mt-4 sm:w-1/4 md:w-1/6">
                                <a href="https://www.nweurope.eu/projects/project-search/sharepair-digital-support-infrastructure-for-citizens-in-the-repair-economy/" target="_blank" rel="noopener noreferrer" class="block text-center">
                                    <img  src="{{ asset('/img/logo_interreg.8ddba57.png') }}" loading="lazy" alt="" width="95" height="80" class="inline-block">
                                </a>
                            </div>
                            <div class="w-1/3 px-4 mt-4 sm:w-1/4 md:w-1/6">
                                <a href="https://repairshare.be/" target="_blank" rel="noopener noreferrer" class="block text-center">
                                    <img src="{{ asset('/img/logo_repair_and_share.3203543.png') }}"
                                         loading="lazy" alt="" width="80" height="80" class="inline-block">
                                </a>
                            </div>
                            <div class="w-1/3 px-4 mt-4 sm:w-1/4 md:w-1/6">
                                <a href="https://www.smarthubvlaamsbrabant.be/" target="_blank" rel="noopener noreferrer" class="block text-center">
                                    <img src="{{ asset('/img/logo_shvb.cac0f6d.png') }}" loading="lazy" alt="" width="80" height="80" class="inline-block">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-6 sm:py-12 !pt-0">
                    <div class="container px-4">
                        <div class="items-center justify-center md:flex">
                            <div class="text-primary md:bg-primary md:text-primary-contrast font-semibold md:max-w-[200px] py-3 px-9 text-center md:rounded-l-full md:text-right text-sml leading-tight">
                                {{ trans('pages.footer_tagline') }}
                            </div>
                            <div class="md:ml-6">
                                <div class="mb-2 text-center md:text-left">
                                    © Sharepair, 2023 - Made with <span class="text-primary">♥</span> by <a class="no-underline" href="https://www.statik.be/" target="_blank" rel="noopener noreferrer">Statik.be</a>
                                </div>
                                <div class="flex justify-center leading-none md:justify-start">
                                    <a href="{{ route('privacy') }}" class="no-underline">{{ trans('pages.privacy.nav') }}</a>
                                    <a href="{{ route('cookies') }}" class="pl-3 ml-3 border-gray-600 border-solid border-l-1 no-underline">{{ trans('pages.cookies.nav') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
