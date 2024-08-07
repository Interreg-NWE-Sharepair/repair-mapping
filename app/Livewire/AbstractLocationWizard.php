<?php

namespace App\Livewire;

use App\Http\Saloon\ReplogConnector;
use App\Http\Saloon\Requests\JsonPostRequest;
use App\Traits\GetsDeviceTypes;
use App\Traits\GetsOrganisationTypes;
use Closure;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use App\Livewire\Forms\ExtendedFileUpload;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;

abstract class AbstractLocationWizard extends Component implements HasForms
{
    use InteractsWithForms;
    use GetsOrganisationTypes;
    use GetsDeviceTypes;

    protected const PREVIOUS_LOCATION_DATA = 'previous-location-data';

    public ?string $location_id;

    public $data;

    public function mount(string $id = null): void
    {
        $this->form->fill(Session::get(self::PREVIOUS_LOCATION_DATA));
        Session::forget(self::PREVIOUS_LOCATION_DATA);
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    protected function getFormSchema(): array
    {
        $locale = LaravelLocalization::getCurrentLocale();

        $available_organisation_types = [];
        $organisation_types = $this->getOrganisationTypes();
        foreach ($organisation_types as $type) {
            $available_organisation_types[$type->uuid] = $type->getTranslatedName($locale);
        }

        return [
            Wizard::make([
                Wizard\Step::make(trans('pages.form.step_1_title'))
                    ->extraAttributes(['class' => 'max-w-2xl'])
                    ->schema([
                        Placeholder::make('step_1_title')
                            ->label('')
                            ->content(new HtmlString('<h2 class="text-primary text-h2">' . trans('pages.form.step_1_text') . '</h2>')),
                        Grid::make(4)
                            ->schema([
                                TextInput::make('street')
                                    ->label(trans('pages.form.address.street_label'))
                                    ->statePath('address.street')
                                    ->columnSpan(2)
                                    ->nullable(),
                                TextInput::make('number')
                                    ->label(trans('pages.form.address.number_label'))
                                    ->statePath('address.number')
                                    ->columnSpan(1)
                                    ->nullable(),
                                TextInput::make('bus')
                                    ->label(trans('pages.form.address.bus_label'))
                                    ->statePath('address.bus')
                                    ->columnSpan(1)
                                    ->nullable(),
                                TextInput::make('zip')
                                    ->label(trans('pages.form.address.postal_code_label'))
                                    ->statePath('address.postal_code')
                                    ->columnSpan(1)
                                    ->nullable(),
                                TextInput::make('city')
                                    ->label(trans('pages.form.address.city_label'))
                                    ->statePath('address.city')
                                    ->columnSpan(2)
                                    ->nullable(),
                                TextInput::make('country')
                                    ->label(trans('pages.form.address.country_label'))
                                    ->statePath('address.country')
                                    ->columnSpan(2)
                                    ->nullable(),
                            ]),
                        Repeater::make('contacts.email')
                            ->label(trans('pages.form.contacts.email.label'))
                            ->addActionLabel(trans('pages.form.contacts.email.add_label'))
                            ->reorderable(false)
                            ->addAction(
                                fn(Action $action) => $action
                                    ->link()
                                    ->icon('heroicon-o-plus'),
                            )
                            ->schema([
                                TextInput::make('value')
                                    ->label('')
                                    ->email()
                                    ->nullable(),
                            ]),
                        Repeater::make('contacts.mobile')
                            ->label(trans('pages.form.contacts.mobile.label'))
                            ->addActionLabel(trans('pages.form.contacts.mobile.add_label'))
                            ->reorderable(false)
                            ->addAction(
                                fn(Action $action) => $action
                                    ->link()
                                    ->icon('heroicon-o-plus'),
                            )
                            ->schema([
                                TextInput::make('value')
                                    ->label('')
                                    ->nullable(),
                            ]),
                        Repeater::make('contacts.phone')
                            ->label(trans('pages.form.contacts.phone.label'))
                            ->addActionLabel(trans('pages.form.contacts.phone.add_label'))
                            ->reorderable(false)
                            ->addAction(
                                fn(Action $action) => $action
                                    ->link()
                                    ->icon('heroicon-o-plus'),
                            )
                            ->schema([
                                TextInput::make('value')
                                    ->label('')
                                    ->nullable(),
                            ]),
                        Repeater::make('contacts.website')
                            ->label(trans('pages.form.contacts.website.label'))
                            ->addActionLabel(trans('pages.form.contacts.website.add_label'))
                            ->helperText(trans('pages.form.contacts.website.info'))
                            ->reorderable(false)
                            ->addAction(
                                fn(Action $action) => $action
                                    ->link()
                                    ->icon('heroicon-o-plus'),
                            )
                            ->schema([
                                TextInput::make('value')
                                    ->placeholder(trans('pages.form.contacts.website.placeholder'))
                                    ->label('')
                                    ->url()
                                    ->nullable()
                            ]),
                        Repeater::make('contacts.facebook')
                            ->label(trans('pages.form.contacts.facebook.label'))
                            ->addActionLabel(trans('pages.form.contacts.facebook.add_label'))
                            ->reorderable(false)
                            ->addAction(
                                fn(Action $action) => $action
                                    ->link()
                                    ->icon('heroicon-o-plus'),
                            )
                            ->schema([
                                TextInput::make('value')
                                    ->label('')
                                    ->nullable(),
                            ]),
                        Repeater::make('contacts.instagram')
                            ->label(trans('pages.form.contacts.instagram.label'))
                            ->addActionLabel(trans('pages.form.contacts.instagram.add_label'))
                            ->reorderable(false)
                            ->addAction(
                                fn(Action $action) => $action
                                    ->link()
                                    ->icon('heroicon-o-plus'),
                            )
                            ->schema([
                                TextInput::make('value')
                                    ->label('')
                                    ->nullable(),
                            ]),
                        Repeater::make('contacts.linkedin')
                            ->label(trans('pages.form.contacts.linkedin.label'))
                            ->addActionLabel(trans('pages.form.contacts.linkedin.add_label'))
                            ->reorderable(false)
                            ->addAction(
                                fn(Action $action) => $action
                                    ->link()
                                    ->icon('heroicon-o-plus'),
                            )
                            ->schema([
                                TextInput::make('value')
                                    ->label('')
                                    ->nullable(),
                            ]),

                    ]),
                Wizard\Step::make(trans('pages.form.step_2_title'))
                    ->schema([
                        Placeholder::make('step_2_title')
                            ->label('')
                            ->content(new HtmlString('<h2 class="text-primary text-h2">' . trans('pages.form.step_2_text') . '</h2>')),
                        Group::make([
                            CheckboxList::make('locales')
                                ->label(trans('pages.form.language_label'))
                                ->helperText(trans('pages.form.language_info'))
                                ->columns(4)
                                ->required()
                                ->options([
                                    'de' => 'DE',
                                    'en' => 'EN',
                                    'fr' => 'FR',
                                    'nl' => 'NL'
                                ])
                                ->default(['en'])
                                ->lazy()
                        ])->extraAttributes(['class' => 'mr-2 text-base font-bold']),
                        Tabs::make('')
                            ->tabs([
                                Tabs\Tab::make('DE')
                                    ->schema([
                                        TextInput::make('initiative_name_de')
                                            ->label(trans('pages.form.name_label'))
                                            ->statePath('name.de')
                                            ->nullable(),
                                        TextInput::make('description_de')
                                            ->label(trans('pages.form.description_label'))
                                            ->statePath('description.de')
                                            ->placeholder(trans('pages.form.description_placeholder'))
                                            ->nullable()
                                    ])
                                    ->visible(fn(\Filament\Forms\Get $get): bool => in_array('de', $get('locales'))),
                                Tabs\Tab::make('EN')
                                    ->schema([
                                        TextInput::make('initiative_name_en')
                                            ->label(trans('pages.form.name_label'))
                                            ->statePath('name.en')
                                            ->nullable(),
                                        TextInput::make('description_en')
                                            ->label(trans('pages.form.description_label'))
                                            ->statePath('description.en')
                                            ->placeholder(trans('pages.form.description_placeholder'))
                                            ->nullable()
                                    ])
                                    ->visible(fn(\Filament\Forms\Get $get): bool => in_array('en', $get('locales'))),
                                Tabs\Tab::make('FR')
                                    ->schema([
                                        TextInput::make('initiative_name_fr')
                                            ->label(trans('pages.form.name_label'))
                                            ->statePath('name.fr')
                                            ->nullable(),
                                        TextInput::make('description_fr')
                                            ->label(trans('pages.form.description_label'))
                                            ->statePath('description.fr')
                                            ->placeholder(trans('pages.form.description_placeholder'))
                                            ->nullable()
                                    ])
                                    ->visible(fn(\Filament\Forms\Get $get): bool => in_array('fr', $get('locales'))),
                                Tabs\Tab::make('NL')
                                    ->schema([
                                        TextInput::make('initiative_name_nl')
                                            ->label(trans('pages.form.name_label'))
                                            ->statePath('name.nl')
                                            ->nullable(),
                                        TextInput::make('description_nl')
                                            ->label(trans('pages.form.description_label'))
                                            ->statePath('description.nl')
                                            ->placeholder(trans('pages.form.description_placeholder'))
                                            ->nullable()
                                    ])
                                    ->visible(fn(\Filament\Forms\Get $get): bool => in_array('nl', $get('locales')))
                            ])
                            ->saveRelationshipsWhenHidden(false)
                            ->visible(fn(\Filament\Forms\Get $get): bool => in_array('de', $get('locales')) ||
                                in_array('en', $get('locales')) ||
                                in_array('fr', $get('locales')) ||
                                in_array('nl', $get('locales'))
                            ),
                        Radio::make('organisation_type')
                            ->label(new HtmlString('<span class="font-bold">'.trans('pages.form.organisation_type_label').'</span>'))
                            ->options($available_organisation_types)
                            ->default(array_key_first($available_organisation_types))
                            ->required(),
                        Placeholder::make('device_type_label')
                            ->label(new HtmlString('<span class="fi-section-header-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">'
                                . trans('pages.form.device_types_label') . '</span>'))
                            ->helperText(trans('pages.form.device_types_info')),
                        Group::make($this->createDeviceTypeSchema($locale)),
                        CheckboxList::make('ecocheques')
                            ->label(new HtmlString('<span class="font-bold">'.trans('pages.form.ecocheques_label').'</span>'))
                            ->options([
                                'monizze' => 'Monizze',
                                'edenred' => 'Edenred',
                                'pluxee' => 'Pluxee',
                            ])
                            ->columns(3)
                            ->statePath('ecocheques'),
                        TextInput::make('vat_number')
                            ->label(new HtmlString('<span class="font-bold">'.trans('pages.form.vat_number_label').'</span>'))
                            ->statePath('vat_number')
                            ->nullable(),
                        Radio::make('warranty')
                            ->label(new HtmlString('<span class="font-bold">'.trans('pages.form.warranty.label').'</span>'))
                            ->helperText(trans('pages.form.warranty.text'))
                            ->default(false)
                            ->boolean(
                                trans('pages.label.yes'),
                                trans('pages.label.no')
                            )
                            ->dehydrateStateUsing(fn($state) => boolval($state))
                            ->statePath('has_warranty')
                            ->lazy(),
                        Tabs::make('')
                            ->tabs([
                                Tabs\Tab::make('DE')
                                    ->schema([
                                        TextInput::make('warranty_info_de')
                                            ->label(trans('pages.form.warranty.info_label'))
                                            ->statePath('warranty_info.de')
                                            ->nullable()
                                    ])
                                    ->visible(fn(\Filament\Forms\Get $get): bool => in_array('de', $get('locales'))),
                                Tabs\Tab::make('EN')
                                    ->schema([
                                        TextInput::make('warranty_info_en')
                                            ->label(trans('pages.form.warranty.info_label'))
                                            ->statePath('warranty_info.en')
                                            ->nullable()
                                    ])
                                    ->visible(fn(\Filament\Forms\Get $get): bool => in_array('en', $get('locales'))),
                                Tabs\Tab::make('FR')
                                    ->schema([
                                        TextInput::make('warranty_info_fr')
                                            ->label(trans('pages.form.warranty.info_label'))
                                            ->statePath('warranty_info.fr')
                                            ->nullable()
                                    ])
                                    ->visible(fn(\Filament\Forms\Get $get): bool => in_array('fr', $get('locales'))),
                                Tabs\Tab::make('NL')
                                    ->schema([
                                        TextInput::make('warranty_info_nl')
                                            ->label(trans('pages.form.warranty.info_label'))
                                            ->statePath('warranty_info.nl')
                                            ->nullable()
                                    ])
                                    ->visible(fn(\Filament\Forms\Get $get): bool => in_array('nl', $get('locales')))
                            ])
                            ->saveRelationshipsWhenHidden(false)
                            ->visible(fn(\Filament\Forms\Get $get): bool => $get('has_warranty') === null ? false : $get('has_warranty')),
                        ExtendedFileUpload::make('logo')
                            ->label(trans('pages.form.logo_label'))
                            ->helperText(trans('pages.form.logo_info'))
                            ->image()
                            ->fetchFileInformation(false)
                            ->maxSize(20000)
                            ->storeFiles(false),
                        ExtendedFileUpload::make('images')
                            ->label(trans('pages.form.images_label'))
                            ->helperText(trans('pages.form.images_info'))
                            ->multiple()
                            ->image()
                            ->fetchFileInformation(false)
                            ->maxSize(20000)
                            ->storeFiles(false)
                    ]),

                Wizard\Step::make(trans('pages.form.step_3_text'))
                    ->extraAttributes(['class' => 'max-w-2xl'])
                    ->schema([
                        Placeholder::make('step_3_title')
                            ->label('')
                            ->content(new HtmlString('<h2 class="text-primary text-h2">' . trans('pages.form.step_3_text') . '</h2>')),
                        TextInput::make('submitter_email')
                            ->label(trans('pages.form.submitter_email_label'))
                            ->email()
                            ->required(),
                        Textarea::make('submitter_relation')
                            ->label(trans('pages.form.submitter_relation_label')),
                        Checkbox::make('accepted_privacy')
                            ->label(new HtmlString(trans('pages.form.accepted_privacy.label')))
                            ->inline()
                            ->required()
                            ->accepted()
                            ->validationAttribute(trans('pages.form.accepted_privacy.validation_attribute')),
                        Hidden::make('accepted_general_terms')
                            ->default(true)
                            ->required()
                    ])
            ])
                ->submitAction(new HtmlString('<button type="submit" class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700">' . trans("pages.label.submit") . '</button>'))
        ];
    }

    private function createDeviceTypeSchema(string $locale): array
    {
        $device_types = $this->getDeviceTypes();
        $list_schema = [];

        foreach ($device_types as $parent) {
            if ($parent->isParent()) {
                $parent_options = [];
                foreach ($device_types as $child) {
                    if (!$child->isParent() && $child->parent_category->uuid === $parent->uuid) {
                        $parent_options[$child->uuid] = $child->getTranslatedName($locale);
                    }
                }

                $list_schema[] = CheckboxList::make(str_replace('-', '_', $parent->code))
                    ->label(new HtmlString("<span class='font-bold'>{$parent->getTranslatedName($locale)}</span>"))
                    ->options($parent_options)
                    ->columns(4)
                    ->statePath('device_types')
                    ->bulkToggleable();

            }
        }

        return $list_schema;
    }

    /**
     * Takes the original form data and saves it in the session, so it can be used to refill the form if necessary
     * @return void
     */
    private function rememberFormData(array $state): void
    {
        $logo = $state['logo'];

        if (!is_null($logo)) {
            $state['logo'] = $this->rememberImageData($state['logo']);
        }

        $images = [];
        foreach ($state['images'] as $image) {
            if (!is_null($image)) {
                $images[] = $this->rememberImageData($image);
            }
        }
        $state['images'] = $images;

        Session::put(self::PREVIOUS_LOCATION_DATA, $state);
    }

    private function rememberImageData($image): string
    {
        if ($image instanceof TemporaryUploadedFile) {
            return $image->serializeForLivewireResponse();
        }

        return $image;
    }

    /**
     * Process the forms contents and submit them
     * @param JsonPostRequest $request The request that is sent to the Replog API
     * @param string $post_route The route to which the form redirects after handeling the form response
     * @return void
     */
    protected function handleForm(JsonPostRequest $request, string $post_route): void
    {
        $state = $this->form->getState();
        $this->rememberFormData($state);

        $logo = $state['logo'];

        $state['logo'] = $this->transformImageToBase64($logo);

        $originals = $state['images'];
        $images = [];
        foreach ($state['images'] as $image) {
            $images[] = $this->transformImageToBase64($image);
        }
        $state['images'] = array_filter($images);

        $connector = new ReplogConnector();

        $request->body()->merge($state);

        $response = null;

        try {
            $response = $connector->send($request);
        } catch (\ReflectionException|InvalidResponseClassException|PendingRequestException $e) {
            session()->flash('danger', $e->getMessage());
        }

        if ($response !== null && $response->ok()) {
            if (!is_null($logo) && $logo instanceof TemporaryUploadedFile) {
                $logo->delete();
            }
            foreach ($originals as $image) {
                if (!is_null($image) && $image instanceof TemporaryUploadedFile) {
                    $image->delete();
                }
            }

            Session::forget(self::PREVIOUS_LOCATION_DATA);
        } else if ($response !== null) {
            session()->flash('danger', $response->json('message', ''));
        }

        $this->redirect($post_route);
    }

    private function transformImageToBase64($image): ?string
    {
        if ($image instanceof TemporaryUploadedFile) {
            $image = "data:{$image->getMimeType()};base64," . base64_encode($image->get());
        }

        if (is_string($image) && filter_var($image, FILTER_VALIDATE_URL)) {
            $contents = file_get_contents($image);

            //Only allow images
            $headers = implode("\n", $http_response_header);
            if (preg_match_all("/^content-type\s*:\s*(.*)$/mi", $headers, $matches)) {
                $content_type = end($matches[1]);
                if (!Str::startsWith($content_type, 'image/')) {
                    return null;
                }
            }

            $image = base64_encode($contents);
        }

        return $image;
    }
}
