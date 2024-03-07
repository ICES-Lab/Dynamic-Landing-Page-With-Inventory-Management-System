<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactDetailsResource\Pages;
use App\Filament\Resources\ContactDetailsResource\RelationManagers;
use App\Models\ContactDetails;
use App\Models\Icons;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactDetailsResource extends Resource
{
    protected static ?string $model = ContactDetails::class;
    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $activeNavigationIcon = 'heroicon-s-phone';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                TextInput::make('contact')->label('Contact Detail')->required()->columnspan(2),
                Select::make('type')->label('Contact Type')
                    ->options([
                        'tel:' => 'Mobile',
                        'mailto:' => 'Email',
                    ])->required()->native(false),
                Select::make('target')->label('Contact Target')
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
                ->required()
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('contact')
                    ->label('Contact Detail')->wrap(),
                TextColumn::make('type')
                    ->label('Contact Type')
                    ->getStateUsing(function (Model $record) {
                        return ($record->type === 'tel:') ? 'Mobile' : (($record->type === 'mailto:') ? 'Email' : 'Link');
                    }),
                TextColumn::make('target')
                    ->label('Target')
                    ->getStateUsing(function (Model $record) {
                        return ($record->target === '_blank') ? 'New Tab' : 'Same Tab';
                    }),
                TextColumn::make('iconcode.name')
                    ->label('Icon'),
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
            // IconsResource::relation('icon'),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactDetails::route('/'),
            'create' => Pages\CreateContactDetails::route('/create'),
            'edit' => Pages\EditContactDetails::route('/{record}/edit'),
        ];
    }
}
