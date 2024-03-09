<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubPagesSocialMediaResource\Pages;
use App\Filament\Resources\SubPagesSocialMediaResource\RelationManagers;
use App\Models\SubPagesSocialMedia;
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
            TextInput::make('link')->label('Link')->required(),
            Select::make('target')->label('Link Target')
                ->options([
                    '_blank' => 'New Tab',
                    '_self' => 'Same Tab',
                ])->required()->native(false),
            Select::make('icon')
            ->label('Icon')
            ->relationship('iconcode','name')->searchable()->preload()->native(0)
            ->suffixIcon('heroicon-m-information-circle')->suffixIconColor('primary')
            ->loadingMessage('Loading Icons...')->noSearchResultsMessage('No Icons found')->searchPrompt('Search icons')
            ->optionsLimit(250)
            ->required(),
            Select::make('sub_page_id')
            ->label('Page')
            ->relationship('subPage','name')->searchable()->preload()->native(0)
            ->suffixIcon('heroicon-m-inbox-arrow-down')->suffixIconColor('primary')
            ->loadingMessage('Loading Sub Pages...')->noSearchResultsMessage('No Sub Pages found')->searchPrompt('Search Sub Pages')
            ->optionsLimit(250)
            ->required(),
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
                TextColumn::make('link')->wrap(),
                TextColumn::make('target')
                    ->label('Link Target')
                    ->getStateUsing(function (Model $record) {
                        return ($record->target === '_blank') ? 'New Tab' : 'Same Tab';
                    })
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('subPage.name')->label('Sub Page'),
                TextColumn::make('iconcode.name')
                    ->label('Icon')
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSubPagesSocialMedia::route('/'),
            'create' => Pages\CreateSubPagesSocialMedia::route('/create'),
            'edit' => Pages\EditSubPagesSocialMedia::route('/{record}/edit'),
        ];
    }
}
