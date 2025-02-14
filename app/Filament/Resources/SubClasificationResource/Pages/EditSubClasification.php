<?php

namespace App\Filament\Resources\SubClasificationResource\Pages;

use App\Filament\Resources\SubClasificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubClasification extends EditRecord
{
    protected static string $resource = SubClasificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
