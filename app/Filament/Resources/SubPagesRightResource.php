<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubPagesRightResource\Pages;
use App\Filament\Resources\SubPagesRightResource\RelationManagers;
use App\Models\SubPagesRight;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
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
                TextInput::make('title')->required(),
                RichEditor::make('content')->required(),
                Select::make('sub_page_id')
                ->label('Page')
                ->relationship('subPage','name')->searchable()->preload()->native(0)
                ->suffixIcon('heroicon-m-inbox-arrow-down')->suffixIconColor('primary')
                ->loadingMessage('Loading Sub Pages...')->noSearchResultsMessage('No Sub Pages found')->searchPrompt('Search Sub Pages')
                ->optionsLimit(250)
                ->required(),
                Toggle::make('in_sub_page')->label('Active in Page')
                ->onColor('primary')
                ->offColor('warning')->inline(false)->default(true)->required(),
                Toggle::make('is_active')->label('Is Active')
                ->onColor('primary')
                ->offColor('warning')->inline(false)->default(true)->required()
            ]);
    }
    public static function canAccess(): bool
    {
        return auth()->user()->is_admin!=0;
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('')
            ->rowIndex(),
            TextColumn::make('subPage.name')->label('Sub Page'),
            TextColumn::make('title'),
            TextColumn::make('content')->wrap()->html()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_at')->label('Created On')->getStateUsing(function (Model $record) {
                return ($record->created_at) ? $record->created_at : 'Inserted Manually';
            })->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')->label('Updated On')->getStateUsing(function (Model $record) {
                return ($record->updated_at) ? $record->updated_at : 'Updated Manually';
            })->toggleable(isToggledHiddenByDefault: true),
            ToggleColumn::make('in_sub_page')->label('Active In Page')
            ->onColor('primary')
            ->offColor('warning')->inline(false)->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSubPagesRights::route('/'),
            'create' => Pages\CreateSubPagesRight::route('/create'),
            'edit' => Pages\EditSubPagesRight::route('/{record}/edit'),
        ];
    }
}
