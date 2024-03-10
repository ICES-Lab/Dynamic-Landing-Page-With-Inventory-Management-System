<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialMediaResource\Pages;
use App\Filament\Resources\SocialMediaResource\RelationManagers;
use App\Models\InchargesSocialMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialMediaResource extends Resource
{
    protected static ?string $model = InchargesSocialMedia::class;
    protected static ?string $label = 'Social Media';
    protected static ?string $navigationGroup = 'Customization';
    protected static ?string $navigationParentItem = 'Incharges';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('link')->required(),
            Select::make('incharge_id')
            ->label('Incharge')
            ->relationship('incharge','name')->searchable()->preload()->native(0)
            ->suffixIcon('heroicon-m-academic-cap')->suffixIconColor('primary')
            ->loadingMessage('Loading Incharges...')->noSearchResultsMessage('No Incharges found')->searchPrompt('Search Incharges')
            ->optionsLimit(250)
            ->required(),
            FileUpload::make('icon_img')
            ->image()->avatar()
            ->directory('InchargesSocialMedia')
            ->imageEditor()
            ->loadingIndicatorPosition('right')
            ->removeUploadedFileButtonPosition('right')
            ->imageEditorAspectRatios([
                null,
                '16:9',
                '4:1',
                '1:1',
            ])
            ->openable()->required()
            ->preserveFilenames(),
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
            ImageColumn::make('icon_img')->circular(),
            TextColumn::make('incharge.name')->label('Incharge'),
            TextColumn::make('link')->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSocialMedia::route('/'),
            'create' => Pages\CreateSocialMedia::route('/create'),
            'edit' => Pages\EditSocialMedia::route('/{record}/edit'),
        ];
    }
}
