<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TableResource\Pages;
use App\Filament\Resources\TableResource\RelationManagers;
use App\Models\InchargesTop;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TableResource extends Resource
{
    protected static ?string $model = InchargesTop::class;
    protected static ?string $label = 'Table';
    protected static ?string $navigationGroup = 'Customization';
    protected static ?string $navigationParentItem = 'Incharges';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                Select::make('incharge_id')
                ->label('Incharge')
                ->relationship('incharge','name')->searchable()->preload()->native(0)
                ->suffixIcon('heroicon-m-academic-cap')->suffixIconColor('primary')
                ->loadingMessage('Loading Incharges...')->noSearchResultsMessage('No Incharges found')->searchPrompt('Search Incharges')
                ->optionsLimit(250)
                ->required(),
                Toggle::make('is_active')->label('Is Active')
                ->onColor('primary')
                ->offColor('warning')->inline(false)->default(true)->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('')
            ->rowIndex(),
            TextColumn::make('incharge.name')->label('Incharge'),
            TextColumn::make('title'),
            TextColumn::make('created_at')->label('Created On')->getStateUsing(function (Model $record) {
                return ($record->created_at) ? $record->created_at : 'Inserted Manually';
            })->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')->label('Updated On')->getStateUsing(function (Model $record) {
                return ($record->updated_at) ? $record->updated_at : 'Updated Manually';
            })->toggleable(isToggledHiddenByDefault: true),
            ToggleColumn::make('is_active')->label('Is Active')
            ->onColor('primary')
            ->offColor('warning')->inline(false)
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                ])->tooltip('Actions')
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
            'index' => Pages\ListTables::route('/'),
            'create' => Pages\CreateTable::route('/create'),
            'edit' => Pages\EditTable::route('/{record}/edit'),
        ];
    }
}
