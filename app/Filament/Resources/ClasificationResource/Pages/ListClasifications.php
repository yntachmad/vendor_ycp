<?php

namespace App\Filament\Resources\ClasificationResource\Pages;

use App\Filament\Resources\ClasificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClasifications extends ListRecords
{
    protected static string $resource = ClasificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
