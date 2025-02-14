<?php

namespace App\Filament\Resources\TypeCompanyResource\Pages;

use App\Filament\Resources\TypeCompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeCompanies extends ListRecords
{
    protected static string $resource = TypeCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
