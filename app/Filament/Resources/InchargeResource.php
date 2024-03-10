<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InchargeResource\Pages;
use App\Filament\Resources\InchargeResource\RelationManagers;
use App\Models\Incharges;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
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
use Illuminate\Support\Str;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InchargeResource extends Resource
{
    protected static ?string $model = Incharges::class;
    protected static ?string $label = 'Incharges';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $activeNavigationIcon = 'heroicon-s-academic-cap';
    protected static ?string $navigationGroup = 'Customization';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('name')->required()->live()
            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))), 
            TextInput::make('slug')->disabled(),
            TextInput::make('department')->required(),
            TextInput::make('level')->required(),
            TextInput::make('email')->email()->required(),
            FileUpload::make('profile_img')
            ->image()->avatar()
            ->directory('Incharges')
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
            ImageColumn::make('profile_img')->circular(),
            TextColumn::make('name'),
            TextColumn::make('department'),
            TextColumn::make('level')->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('email')->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListIncharges::route('/'),
            'create' => Pages\CreateIncharge::route('/create'),
            'edit' => Pages\EditIncharge::route('/{record}/edit'),
        ];
    }
}
