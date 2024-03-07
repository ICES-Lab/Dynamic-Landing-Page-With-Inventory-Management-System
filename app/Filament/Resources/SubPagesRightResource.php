<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubPagesRightResource\Pages;
use App\Filament\Resources\SubPagesRightResource\RelationManagers;
use App\Models\SubPagesRight;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubPagesRightResource extends Resource
{
    protected static ?string $model = SubPagesRight::class;
    protected static ?string $label = 'Right';
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
            'index' => Pages\ListSubPagesRights::route('/'),
            'create' => Pages\CreateSubPagesRight::route('/create'),
            'edit' => Pages\EditSubPagesRight::route('/{record}/edit'),
        ];
    }
}
