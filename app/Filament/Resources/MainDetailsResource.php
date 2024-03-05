<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MainDetailsResource\Pages;
use App\Filament\Resources\MainDetailsResource\RelationManagers;
use App\Models\MainDetails;
use Filament\Forms;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class MainDetailsResource extends Resource
{
    protected static ?string $model = MainDetails::class;

    protected static ?string $navigationIcon = 'heroicon-s-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('logo')
                    ->image()
                    ->directory('Main')
                    ->preserveFilenames(),       
                    // ->getUploadedFileNameForStorageUsing(
                    //     fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                    //         ->prepend('main_logo-'),
                    // ),
                TextInput::make('lab_name')->label('Lab Name'),
                TextInput::make('link')->label('Lab Link'),
                RichEditor::make('mission')->label('Mission'),
                Textarea::make('vision')->label('Vision')->autosize(),
                RichEditor::make('what_we_do')->label('What We Do'),
                FileUpload::make('what_we_do_pic')
                    ->image()
                    ->directory('Main')
                    ->preserveFilenames(),
                TextInput::make('icon1_name')->label('Icon 1 Name'),
                Select::make('icon1') // Change to 'icon_id' for clarity
                ->label('Icon 1')
                ->relationship('iconcode1','name')->searchable()->preload()->native(0)
                ->suffixIcon('heroicon-m-information-circle')->suffixIconColor('primary')
                ->loadingMessage('Loading Icons...')->noSearchResultsMessage('No Icons found')->searchPrompt('Search icons')
                ->optionsLimit(250)
                ->required(),
                TextInput::make('icon2_name')->label('Icon 2 Name'),
                Select::make('icon2') // Change to 'icon_id' for clarity
                ->label('Icon 2')
                ->relationship('iconcode2','name')->searchable()->preload()->native(0)
                ->suffixIcon('heroicon-m-information-circle')->suffixIconColor('primary')
                ->loadingMessage('Loading Icons...')->noSearchResultsMessage('No Icons found')->searchPrompt('Search icons')
                ->optionsLimit(250)
                ->required(),
                Toggle::make('is_active')->label('Is Active')
                        ->onColor('primary')
                        ->offColor('warning')->inline(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListMainDetails::route('/'),
            'create' => Pages\CreateMainDetails::route('/create'),
            'edit' => Pages\EditMainDetails::route('/{record}/edit'),
        ];
    }
}
