<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubPagesLeftResource\Pages;
use App\Filament\Resources\SubPagesLeftResource\RelationManagers;
use App\Models\SubPagesLeft;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubPagesLeftResource extends Resource
{
    protected static ?string $model = SubPagesLeft::class;
    protected static ?string $label = 'Left';
    protected static ?string $navigationGroup = 'Customization';
    protected static ?string $navigationParentItem = 'Sub Pages';
    protected static ?int $navigationSort = 1;

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
            'index' => Pages\ListSubPagesLefts::route('/'),
            'create' => Pages\CreateSubPagesLeft::route('/create'),
            'edit' => Pages\EditSubPagesLeft::route('/{record}/edit'),
        ];
    }
}
