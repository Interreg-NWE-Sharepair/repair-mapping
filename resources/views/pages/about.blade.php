<x-vue-layout>
    <x-slot name="slot" class="flex-grow">
            <div>
                <div class="py-6 sm:py-12 bg-gray-100 sm:py-12">
                    <div class="container px-4">
                        <div class="md:w-8/12">
                            <h1 class="text-h1 text-primary">{{ trans('pages.about.title') }}</h1>
                            <p>{{ trans('pages.about.intro') }}</p>
                        </div>
                    </div>
                </div>
                <div class="py-6 sm:py-12 sm:py-12">
                    <div class="container px-4">
                        <div class="md:w-4/5">
                            <div class="wysiwyg">
                                <h2 id="mapping-repair-actors">{{ trans('pages.about.actors.title') }}</h2>
                                <p>{{ trans('pages.about.actors.overview') }}</p>
                                <ul>
                                    <li>{{ trans('pages.about.actors.goal_1') }}</li>
                                    <li>{{ trans('pages.about.actors.goal_2') }}</li>
                                    <li>{{ trans('pages.about.actors.goal_3') }}</li>
                                    <li>{!! trans('pages.about.actors.goal_4', ['link' => '<a href="https://www.repairconnects.org/">Repair Connects</a>']) !!}</li>
                                </ul>
                                <h2 id="how-does-it-work">{{ trans('pages.about.how.title') }}</h2>
                                <h3 id="initial-data-entry">{{ trans('pages.about.how.initial_data_entry_title') }}</h3>
                                <p>{!! trans('pages.about.how.initial_data_entry_text', ['links' => '<a href="https://repairtogether.be/repair-connects-nouvelle-plateforme-pour-reparer-a-distance/">Repair Together</a>, <a href="https://repairshare.be/">Repair & Share</a>, <a href="https://restarters.net/dashboard">Restarters</a>, cities of <a href="https://leuven.be/">Leuven</a>, <a href="https://roeselare.be/">Roeselare</a>, <a href="https://www.apeldoorn.nl/">Apeldoorn</a>, <a href="https://www.olln.be/fr">Ottignies-Louvain-la-Neuve</a>']) !!}</p>
                                <h3 id="crowdsourcing-repair-data">{{ trans('pages.about.how.crowdsourcing_title') }}</h3>
                                <p>{{ trans('pages.about.how.crowdsourcing_text') }}</p>
                                <h2 id="sharepair-digital-support-infrastructure-for-citizens-in-the-repair-economy">{{ trans('pages.about.sharepair_title') }}</h2>
                                <p>{!! trans('pages.about.sharepair_text', ['link' => '<a href="https://www.nweurope.eu/projects/project-search/sharepair-digital-support-infrastructure-for-citizens-in-the-repair-economy/">Sharepair</a>']) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </x-slot>
</x-vue-layout>
