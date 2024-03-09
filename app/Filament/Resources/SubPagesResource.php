<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubPagesResource\Pages;
use App\Filament\Resources\SubPagesResource\RelationManagers;
use App\Models\SubPages;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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
                TextInput::make('name')->required()->live()
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))), 
                TextInput::make('slug')->disabled(),
                Select::make('main_page_id')
                ->label('Page')
                ->relationship('mainPage','name')->searchable()->preload()->native(0)
                ->suffixIcon('heroicon-m-inbox-stack')->suffixIconColor('primary')
                ->loadingMessage('Loading Pages...')->noSearchResultsMessage('No Pages found')->searchPrompt('Search Pages')
                ->optionsLimit(250)
                ->required(),
                FileUpload::make('img1')
                    ->image()
                    ->directory('SubPages')
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
                FileUpload::make('img2')
                    ->image()
                    ->directory('SubPages')
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
                FileUpload::make('img3')
                    ->image()
                    ->directory('SubPages')
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
                FileUpload::make('active_img')
                    ->image()
                    ->directory('SubPages')
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
                TextColumn::make('name'),
                TextColumn::make('mainPage.name')->label('Page Name'),
                ImageColumn::make('img1')->label('Image 1')->square()
                ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('img2')->label('Image 2')->square()->getStateUsing(function (Model $record) {
                    return ($record->img2) ? $record->img2 : 'No Image';
                })->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('img3')->label('Image 3')->square()->getStateUsing(function (Model $record) {
                    return ($record->img3) ? 'SubPages/'.$record->img3 : 'No Image';
                })->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('active_img')->label('Active Image'),
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
            'index' => Pages\ListSubPages::route('/'),
            'create' => Pages\CreateSubPages::route('/create'),
            'edit' => Pages\EditSubPages::route('/{record}/edit'),
        ];
    }
}
