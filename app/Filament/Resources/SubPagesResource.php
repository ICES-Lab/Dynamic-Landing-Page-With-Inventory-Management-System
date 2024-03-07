<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubPagesResource\Pages;
use App\Filament\Resources\SubPagesResource\RelationManagers;
use App\Models\SubPages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubPagesResource extends Resource
{
    protected static ?string $model = SubPages::class;
    protected static ?string $label = 'Sub Pages';
    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';
    protected static ?string $activeNavigationIcon = 'heroicon-s-inbox-arrow-down';
    protected static ?string $navigationGroup = 'Customization';
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
            'index' => Pages\ListSubPages::route('/'),
            'create' => Pages\CreateSubPages::route('/create'),
            'edit' => Pages\EditSubPages::route('/{record}/edit'),
        ];
    }
}
