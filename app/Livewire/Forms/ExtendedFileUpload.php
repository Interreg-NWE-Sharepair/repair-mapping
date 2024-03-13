<?php
namespace App\Livewire\Forms;

use Filament\Forms\Components\BaseFileUpload;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use League\Flysystem\UnableToCheckFileExistence;
use Throwable;

class ExtendedFileUpload extends \Filament\Forms\Components\FileUpload
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->getUploadedFileUsing(static function (BaseFileUpload $component, string $file, string | array | null $storedFileNames): ?array {
            /** @var FilesystemAdapter $storage */
            $storage = $component->getDisk();

            $shouldFetchFileInformation = $component->shouldFetchFileInformation();

            $url = null;

            if ($component->getVisibility() === 'private') {
                try {
                    $url = $storage->temporaryUrl(
                        $file,
                        now()->addMinutes(5),
                    );
                } catch (Throwable $exception) {
                    // This driver does not support creating temporary URLs.
                }
            }

            $url ??= $storage->exists($file) ? $storage->url($file) : $file;

            return [
                'name' => ($component->isMultiple() ? ($storedFileNames[$file] ?? null) : $storedFileNames) ?? basename($file),
                'size' => $shouldFetchFileInformation ? $storage->size($file) : 0,
                'type' => $shouldFetchFileInformation ? $storage->mimeType($file) : null,
                'url' => $url,
            ];
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
