<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TableHeadResource\Pages;
use App\Filament\Resources\TableHeadResource\RelationManagers;
use App\Models\InchargesMedium;
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

class TableHeadResource extends Resource
{
    protected static ?string $model = InchargesMedium::class;
    protected static ?string $label = 'Table Head';
    protected static ?string $navigationGroup = 'Customization';
    protected static ?string $navigationParentItem = 'Incharges';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                Select::make('top_id')
                ->label('Tables')
                ->relationship('top','title')->searchable()->preload()->native(0)
                ->suffixIcon('heroicon-m-table-cells')->suffixIconColor('primary')
                ->loadingMessage('Loading Tables...')->noSearchResultsMessage('No Tables found')->searchPrompt('Search Tables')
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
            TextColumn::make('top.incharge.name')->label('Incharges'),
            TextColumn::make('top.title')->label('Tables')->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTableHeads::route('/'),
            'create' => Pages\CreateTableHead::route('/create'),
            'edit' => Pages\EditTableHead::route('/{record}/edit'),
        ];
    }
}
