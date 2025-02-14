<?php

namespace App\Filament\Resources\SubClasificationResource\Pages;

use App\Filament\Resources\SubClasificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubClasifications extends ListRecords
{
    protected static string $resource = SubClasificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
