<?php
namespace App\Http\Livewire\Forms;

use Filament\Forms\Components\BaseFileUpload;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use League\Flysystem\UnableToCheckFileExistence;

class ExtendedFileUpload extends \Filament\Forms\Components\FileUpload
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->getUploadedFileUrlUsing(static function (BaseFileUpload $component, string $file): ?string {
            /** @var FilesystemAdapter $storage */
            $storage = $component->getDisk();

            try {
                if (!$storage->exists($file)) {
                    return $file;
                }
            } catch (UnableToCheckFileExistence $exception) {
                return $file;
            }

            if ($component->getVisibility() === 'private') {
                try {
                    return $storage->temporaryUrl(
                        $file,
                        now()->addMinutes(5),
                    );
                } catch (\Throwable $exception) {
                    // This driver does not support creating temporary URLs.
                }
            }

            return $storage->url($file);
        });

        $this->afterStateHydrated(static function (BaseFileUpload $component, string|array|null $state): void {
            if (blank($state)) {
                $component->state([]);

                return;
            }

            $files = collect(Arr::wrap($state))
                ->mapWithKeys(static fn(string $file): array => [((string)Str::uuid()) => $file])
                ->all();

            $component->state($files);
        });
    }
}
