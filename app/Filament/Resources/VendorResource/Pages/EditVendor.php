<?php

namespace App\Filament\Resources\VendorResource\Pages;

use Filament\Forms;
use App\Models\City;
use App\Models\Group;
use Filament\Actions;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Category;
use App\Models\Province;
use App\Models\BankAccount;
use App\Models\TypeCompany;
use App\Models\Clasification;
use App\Models\SubClasification;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\VendorResource;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\EditRecord\Concerns\HasWizard;

class EditVendor extends EditRecord
{
    use HasWizard;
    protected static string $resource = VendorResource::class;

    protected function getHeaderActions(): array
    {

        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSteps(): array
    {
        return [
            Step::make('Supplier Profile')
                ->description('Add Details Supplier Profile')
                ->icon('heroicon-o-users')
                ->schema([
                    Select::make('typeCompany_id')
                        ->required()
                        ->label('Type of Company')
                        ->options(TypeCompany::all()->pluck('companyType', 'id'))
                        ->searchable(),
                    //Nama Supplier
                    Forms\Components\TextInput::make('supplier_name')->required()->maxLength(255),
                    //Description
                    Forms\Components\Textarea::make('description')
                        ->columnSpanFull(),
                    Grid::make('pic')->schema([
                        Forms\Components\TextInput::make('contact_person')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_phone')

                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_email')
                            ->maxLength(255),

                    ])->columns(3),

                    //Contact Person

                    Forms\Components\Textarea::make('address')
                        ->required()->columnSpanFull(),

                    Select::make('province_id')
                        ->label('Province')
                        ->required()
                        ->options(Province::all()->pluck('province', 'id'))
                        ->searchable()
                        ->live()
                        ->afterStateUpdated(fn(Set $set) => $set('city_id', null)),

                    Select::make('city_id')
                        ->label('City')
                        ->required()
                        ->options(fn(Get $get) => City::where('province_id', $get('province_id'))->pluck('city', 'id'))
                        ->searchable()
                        ->live(),

                    Forms\Components\TextInput::make('website')
                        ->maxLength(255),

                    Select::make('legal_document')
                        ->label('Legal Document')
                        ->placeholder('MultiSelect')
                        ->multiple()
                        ->options([
                            'SIUP' => 'SIUP',
                            'TDP' => 'TDP',
                            'Company Profile' => 'Company Profile',
                            'Financial Audit' => 'Financial Audit',
                            'Bank Account' => 'Bank Account',
                            'Akta pendirian' => 'Akta pendirian',
                            'NPWP' => 'NPWP',
                        ])

                ])->columns(2),
            Step::make('Supplier Grouping')
                ->description('Add Details Supplier Grouping')
                ->icon('heroicon-o-users')
                ->schema([
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


                    Radio::make('tax_register')
                        ->label('Tax Register')
                        ->inline()
                        ->options([
                            'yes' => 'Yes',
                            'no' => 'No',
                        ]),
                    Radio::make('Terms_condition')
                        ->label('Terms Condition')
                        ->inline()
                        ->options([
                            'yes' => 'Yes',
                            'no' => 'No',
                        ]),

                    Select::make('typebank_id')
                        ->label('Type of Bank')
                        ->options(BankAccount::all()->pluck('bankType', 'id'))
                        ->searchable(),


                ])->columnSpanFull(),
        ];
    }
}
