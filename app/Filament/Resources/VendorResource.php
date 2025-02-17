<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Group;
use App\Models\Vendor;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\TypeCompany;

use App\Models\Clasification;
use App\Models\SubClasification;
use Filament\Resources\Resource;

use Filament\Forms\Components\Select;

use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\VendorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VendorResource\RelationManagers;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 1;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Company Profile')
                    ->columns([
                        'sm' => 4,
                        'xl' => 4,
                        '2xl' => 8,
                    ])
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->icon('heroicon-o-users')
                    ->schema([
                        Select::make('typeCompany_id')
                            ->required()
                            ->label('Type of Company')
                            ->options(TypeCompany::all()->pluck('companyType', 'id'))
                            ->searchable()->columns(4),
                        Forms\Components\TextInput::make('supplier_name')->required()->maxLength(255)->columns(6),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('contact_person')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('province_id')
                            ->numeric(),
                        Forms\Components\TextInput::make('city_id')
                            ->numeric(),
                        Forms\Components\TextInput::make('website')
                            ->maxLength(255),
                    ])->compact(),



                Select::make('group_id')
                    ->label('Group')
                    ->options(Group::all()->pluck('group', 'id'))
                    ->searchable(),
                Select::make('category_id')
                    ->label('Category')
                    ->options(Category::all()->pluck('category', 'id'))
                    ->searchable(),
                Select::make('clasification_id')
                    ->label('Clasification')
                    ->options(Clasification::all()->pluck('clasification', 'id'))
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(fn(Set $set) => $set('subClasification_id', null)),

                Select::make('subClasification_id')
                    ->label('Clasification')
                    ->options(fn(Get $get) => SubClasification::where('clasification_id', $get('clasification_id'))->pluck('clasification', 'id'))
                    ->searchable()
                    ->preload()
                    ->live(),








                Forms\Components\TextInput::make('legal_document')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tax_register')
                    ->required(),
                Forms\Components\TextInput::make('Terms_condition')
                    ->required(),
                Forms\Components\TextInput::make('typebank_id')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('group.group')
                    ->numeric()
                    ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category.category')
                    ->numeric()
                    ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('clasification.clasification')
                    ->numeric()
                    ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('subClasification.clasification')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('typeCompany.companyType')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('province_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('legal_document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tax_register'),
                Tables\Columns\TextColumn::make('Terms_condition'),
                Tables\Columns\TextColumn::make('typebank_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
        ];
    }
}
