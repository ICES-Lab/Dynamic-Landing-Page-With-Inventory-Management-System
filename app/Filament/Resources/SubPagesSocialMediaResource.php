<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubPagesSocialMediaResource\Pages;
use App\Filament\Resources\SubPagesSocialMediaResource\RelationManagers;
use App\Models\SubPagesSocialMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubPagesSocialMediaResource extends Resource
{
    protected static ?string $model = SubPagesSocialMedia::class;
    protected static ?string $label = 'Social Media';
    protected static ?string $navigationGroup = 'Customization';
    protected static ?string $navigationParentItem = 'Sub Pages';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListSubPagesSocialMedia::route('/'),
            'create' => Pages\CreateSubPagesSocialMedia::route('/create'),
            'edit' => Pages\EditSubPagesSocialMedia::route('/{record}/edit'),
        ];
    }
}
