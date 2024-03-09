<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubPagesLeftResource\Pages;
use App\Filament\Resources\SubPagesLeftResource\RelationManagers;
use App\Models\SubPagesLeft;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
                TextInput::make('title')->required(),
                RichEditor::make('content')->required(),
                FileUpload::make('img1')
                    ->image()
                    ->directory('SubPagesLeft')
                    ->imageEditor()
                    ->loadingIndicatorPosition('right')
                    ->panelAspectRatio('5:2')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:1',
                        '1:1',
                    ])
                    ->openable()
                    ->preserveFilenames(),
                FileUpload::make('img2')
                    ->image()
                    ->directory('SubPagesLeft')
                    ->imageEditor()
                    ->loadingIndicatorPosition('right')
                    ->panelAspectRatio('5:2')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:1',
                        '1:1',
                    ])
                    ->openable()
                    ->preserveFilenames(),
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('')
            ->rowIndex(),
            TextColumn::make('subPage.name')->label('Sub Page'),
            TextColumn::make('title'),
            TextColumn::make('content')->wrap()->html()->toggleable(isToggledHiddenByDefault: true),
            ImageColumn::make('img1')->label('Image 1')->getStateUsing(function (Model $record) {
                return ($record->img1) ? $record->img1 : 'No Image';
            })->toggleable(isToggledHiddenByDefault: true),
            ImageColumn::make('img2')->label('Image 2')->getStateUsing(function (Model $record) {
                return ($record->img2) ? $record->img2 : 'No Image';
            })->toggleable(isToggledHiddenByDefault: true),
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
    public static function canAccess(): bool
    {
        return auth()->user()->is_admin!=0;
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
