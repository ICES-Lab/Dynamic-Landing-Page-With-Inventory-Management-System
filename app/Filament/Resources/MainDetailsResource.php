<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MainDetailsResource\Pages;
use App\Filament\Resources\MainDetailsResource\RelationManagers;
use App\Models\MainDetails;
use Filament\Forms;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
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
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class MainDetailsResource extends Resource
{
    protected static ?string $model = MainDetails::class;
    protected static ?string $navigationIcon = 'heroicon-o-wallet';
    protected static ?string $activeNavigationIcon = 'heroicon-s-wallet';
    protected static ?string $navigationGroup = 'Customization';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Pictures')->schema([
                FileUpload::make('logo')
                    ->image()
                    ->directory('Main')
                    ->imageEditor()
                    ->loadingIndicatorPosition('right')
                    ->panelAspectRatio('5:1')
                    ->panelLayout('compact')
                    ->removeUploadedFileButtonPosition('right')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:1',
                        '1:1',
                    ])
                    ->openable()->required()
                    ->preserveFilenames(),    
                    // ->getUploadedFileNameForStorageUsing(
                    //     fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                    //         ->prepend('main_logo-'),
                    // ),
                FileUpload::make('what_we_do_pic')
                    ->image()
                    ->directory('Main')
                    ->imageEditor()
                    ->loadingIndicatorPosition('right')
                    ->panelAspectRatio('4:1')
                    ->panelLayout('compact')
                    ->removeUploadedFileButtonPosition('right')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->openable()->required()
                    ->preserveFilenames(),
                ])->collapsed()->columns(2),
                Fieldset::make()->schema([
                TextInput::make('lab_name')->label('Lab Name')->columnspan(2)->required(),
                TextInput::make('link')->label('Lab Link')->columnspan(3)->required(),
                ])->columns(5),
                Section::make()->schema([
                RichEditor::make('mission')->label('Mission')->required(),
                RichEditor::make('what_we_do')->label('What We Do')->required(),
                ])->columns(2),
                Fieldset::make('Icons')->schema([
                TextInput::make('icon1_name')->label('Icon 1 Name'),
                Select::make('icon1')
                ->label('Icon 1')
                ->relationship('iconcode1','name')->searchable()->preload()->native(0)
                ->suffixIcon('heroicon-m-information-circle')->suffixIconColor('primary')
                ->loadingMessage('Loading Icons...')->noSearchResultsMessage('No Icons found')->searchPrompt('Search icons')
                ->optionsLimit(250)
                ->required(),
                TextInput::make('icon2_name')->label('Icon 2 Name'),
                Select::make('icon2')
                ->label('Icon 2')
                ->relationship('iconcode2','name')->searchable()->preload()->native(0)
                ->suffixIcon('heroicon-m-information-circle')->suffixIconColor('primary')
                ->loadingMessage('Loading Icons...')->noSearchResultsMessage('No Icons found')->searchPrompt('Search icons')
                ->optionsLimit(250)
                ->required(),
                ]),
                Section::make()->schema([
                Textarea::make('vision')->label('Vision')->autosize()->required()->columnspan(3)->columns(1),
                Toggle::make('is_active')->label('Is Active')
                ->onColor('primary')
                ->offColor('warning')->inline(false)->default(true)->required()
                ])->columns(4)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('')
                ->rowIndex(),
                ImageColumn::make('logo')->label('Logo'),
                TextColumn::make('lab_name')->label('Lab Name')->wrap(),
                TextColumn::make('link')->label('Lab Link')->wrap(),
                ImageColumn::make('what_we_do_pic')->label('What We Do Pic')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('icon1_name')
                    ->label('Icon1 Name')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('iconcode1.name')
                    ->label('Icon')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('icon2_name')
                    ->label('Icon2 Name')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('iconcode2.name')
                    ->label('Icon2')
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
            ])->defaultSort('updated_at','desc')
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
            'index' => Pages\ListMainDetails::route('/'),
            'create' => Pages\CreateMainDetails::route('/create'),
            'edit' => Pages\EditMainDetails::route('/{record}/edit'),
        ];
    }
}
