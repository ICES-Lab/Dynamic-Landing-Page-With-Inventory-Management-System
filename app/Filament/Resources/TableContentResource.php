<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TableContentResource\Pages;
use App\Filament\Resources\TableContentResource\RelationManagers;
use App\Models\InchargesBottom;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TableContentResource extends Resource
{
    protected static ?string $model = InchargesBottom::class;
    protected static ?string $label = 'Table Content';
    protected static ?string $navigationGroup = 'Customization';
    protected static ?string $navigationParentItem = 'Incharges';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Textarea::make('content')->required(),
            Select::make('medium_id')
            ->label('Table Head')
            ->relationship('medium','title')->searchable()->preload()->native(0)
            ->suffixIcon('heroicon-m-document-arrow-up')->suffixIconColor('primary')
            ->loadingMessage('Loading Table Heads...')->noSearchResultsMessage('No Table Heads found')->searchPrompt('Search Table Heads')
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
            TextColumn::make('medium.top.incharge.name')->label('Incharges'),
            TextColumn::make('medium.top.title')->label('Tables')->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('medium.title')->label('Table Heads')->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('content'),
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
            'index' => Pages\ListTableContents::route('/'),
            'create' => Pages\CreateTableContent::route('/create'),
            'edit' => Pages\EditTableContent::route('/{record}/edit'),
        ];
    }
}
