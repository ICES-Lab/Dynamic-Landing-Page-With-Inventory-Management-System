<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PagesResource\Pages;
use App\Filament\Resources\PagesResource\RelationManagers;
use App\Models\MainPages;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PagesResource extends Resource
{
    protected static ?string $model = MainPages::class;
    protected static ?string $label = 'Pages';
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $activeNavigationIcon = 'heroicon-s-inbox-stack';
    protected static ?string $navigationGroup = 'Customization';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->live()->required()
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))), 
                TextInput::make('slug')->disabled(),
                FileUpload::make('page_pic')
                    ->image()
                    ->directory('MainPages')
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
                    ->openable()->required()
                    ->preserveFilenames(),
                FileUpload::make('head_icon_pic')
                    ->image()
                    ->directory('MainPages')
                    ->imageEditor()
                    ->loadingIndicatorPosition('right')
                    ->panelAspectRatio('4:1')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:1',
                        '1:1',
                    ])
                    ->openable()->required()
                    ->preserveFilenames(),
                Textarea::make('content')->required()->autosize(),
                RichEditor::make('quote'),
                Toggle::make('inhead')->label('In Header')
                ->onColor('primary')
                ->offColor('warning')->inline(false)->default(true)->required(),                
                Toggle::make('infoot')->label('In Footer')
                ->onColor('primary')
                ->offColor('warning')->inline(false)->default(true)->required(),
                Toggle::make('is_layout')->label('Is Normal Layout')
                ->onColor('primary')
                ->offColor('warning')->inline(false)->default(true)->required(),
                Toggle::make('in_slider')->label('In Home Slider')
                ->onColor('primary')
                ->offColor('warning')->inline(false)->default(true)->required(),
                Toggle::make('in_home')->label('In Home Middle')
                ->onColor('primary')
                ->offColor('warning')->inline(false)->default(true)->required(),
                Toggle::make('in_home_foot')->label('In Home Bottom')
                ->onColor('primary')
                ->offColor('warning')->inline(false)->default(true)->required(),
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
                TextColumn::make('name'),
                TextColumn::make('content')->wrap(),
                ImageColumn::make('head_icon_pic')->square(),
                TextColumn::make('quote')->html()
                ->getStateUsing(function (Model $record) {
                    return ($record->quote) ? $record->quote : 'No Quote';
                }),
                ImageColumn::make('page_pic'),
                ToggleColumn::make('inhead')->label('In Header')
                ->onColor('primary')
                ->toggleable(isToggledHiddenByDefault: true)
                ->offColor('warning')->inline(false),
                ToggleColumn::make('infoot')->label('In Footer')
                ->onColor('primary')
                ->toggleable(isToggledHiddenByDefault: true)
                ->offColor('warning')->inline(false),
                ToggleColumn::make('is_layout')->label('Is Normal Layout')
                ->onColor('primary')
                ->toggleable(isToggledHiddenByDefault: true)
                ->offColor('warning')->inline(false),
                ToggleColumn::make('in_slider')->label('In Slider')
                ->onColor('primary')
                ->toggleable(isToggledHiddenByDefault: true)
                ->offColor('warning')->inline(false),
                ToggleColumn::make('in_home')->label('In Home Middle')
                ->onColor('primary')
                ->toggleable(isToggledHiddenByDefault: true)
                ->offColor('warning')->inline(false),
                ToggleColumn::make('in_home_foot')->label('In Home Bottom')
                ->onColor('primary')
                ->toggleable(isToggledHiddenByDefault: true)
                ->offColor('warning')->inline(false),
                TextColumn::make('created_at')->label('Created On')->getStateUsing(function (Model $record) {
                    return ($record->created_at) ? $record->created_at : 'Inserted Manually';
                })->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->label('Updated On')->getStateUsing(function (Model $record) {
                    return ($record->updated_at) ? $record->updated_at : 'Updated Manually';
                })->toggleable(isToggledHiddenByDefault: true),
                ToggleColumn::make('is_active')->label('Is Active')
                ->onColor('primary')
                ->offColor('warning')->inline(false),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])->color('primary')->tooltip('Actions')
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePages::route('/create'),
            'edit' => Pages\EditPages::route('/{record}/edit'),
        ];
    }
}
