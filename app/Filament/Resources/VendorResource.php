<?php

namespace App\Filament\Resources;

use Wizard\Step;
use Filament\Forms;
use App\Models\City;
use Filament\Tables;
use App\Models\Group;
use App\Models\Vendor;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Category;
use App\Models\Province;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BankAccount;

use App\Models\TypeCompany;
use App\Models\Clasification;
use App\Models\SubClasification;

use Filament\Infolists\Infolist;

use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\VendorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VendorResource\RelationManagers;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 1;

    public static ?string $modelLabel = 'Supplier';


    public static function form(
        Form $form
    ): Form {
        return $form
            ->schema([

            ]);
    }
    // protected function getRedirectUrl(): string
    // {
    //     return $this->getResource()::getUrl('view');
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('supplier_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable()
                    ->description(fn(Vendor $record): string => $record->typeCompany->companyType),
                Tables\Columns\TextColumn::make('clasification.clasification')
                    ->label('Services')
                    ->numeric()
                    ->sortable()->searchable(),


                Tables\Columns\TextColumn::make('subClasification.clasification')
                    ->label('Sub Services')
                    // ->visible(false)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('typeCompany.companyType')
                    ->visible(false)
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('contact_person')
                    // ->visible(false)
                    ->toggleable(isToggledHiddenByDefault: true),
                // ->searchable(),

                Tables\Columns\TextColumn::make('province.province')
                    ->searchable()
                    // ->description(fn(Vendor $record): string => $record->city->city)
                    ->sortable(),
                Tables\Columns\TextColumn::make('city.city')
                    // ->visible(false)
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('group.group')

                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category.category')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('contact_phone')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('contact_email')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('website')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('legal_document')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('tax_register')->visible(false),
                Tables\Columns\TextColumn::make('Terms_condition')->visible(false),
                Tables\Columns\TextColumn::make('typebank_id')
                    ->visible(false)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->visible(false)
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->visible(false)
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            // ->recordUrl(
            //     fn(Model $record): string => Pages\ViewVendor::getUrl([$record->id]),
            // )
            ->recordUrl(
                null,
            )
            ->filters([
                //
                SelectFilter::make('typeCompany_id')
                    ->options(TypeCompany::all()->pluck('companyType', 'id'))
                    ->label('Type of Company'),
                SelectFilter::make('typeCompany_id')
                    ->options(TypeCompany::all()->pluck('companyType', 'id'))
                    ->label('Type of Company'),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                // Tables\Actions\Action::make('View Information')
                //     // This is the important part!
                //     ->infolist([
                //         TextEntry::make('title')
                //     ])
                //     ->slideOver(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
            'view' => Pages\ViewVendor::route('/{record}'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('supplier_name')
            ]);
    }
}
