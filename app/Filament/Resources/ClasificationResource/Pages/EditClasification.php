<?php

namespace App\Filament\Resources\ClasificationResource\Pages;

use App\Filament\Resources\ClasificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClasification extends EditRecord
{
    protected static string $resource = ClasificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
