<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubClasificationResource\Pages;
use App\Filament\Resources\SubClasificationResource\RelationManagers;
use App\Models\SubClasification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubClasificationResource extends Resource
{
    protected static ?string $model = SubClasification::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('clasification_id')
                    ->numeric(),
                Forms\Components\TextInput::make('clasification')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('class.clasification')
                    ->numeric()
                    ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('clasification')
                    ->searchable(),
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
            'index' => Pages\ListSubClasifications::route('/'),
            'create' => Pages\CreateSubClasification::route('/create'),
            'edit' => Pages\EditSubClasification::route('/{record}/edit'),
        ];
    }
}
