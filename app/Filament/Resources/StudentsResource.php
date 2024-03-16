<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentsResource\Pages;
use App\Filament\Resources\StudentsResource\RelationManagers;
use App\Models\Students;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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

class StudentsResource extends Resource
{
    protected static ?string $model = Students::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $activeNavigationIcon = 'heroicon-s-user-circle';
    protected static ?string $navigationGroup = 'Student';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('name')->required(),
            TextInput::make('roll_no')->label('Registration Number')->required(),
            TextInput::make('email')->email()->required(),
            Select::make('course')
            ->options([
                'B.E' => 'B.E',
                'B.Tech' => 'B.Tech',
            ])->required()->native(false),
            TextInput::make('branch')->label('Department')->required(),
            Select::make('year')
            ->options([
                'I' => 'I',
                'II' => 'II',
                'III' => 'III',
                'IV' => 'IV',
            ])->required()->native(false),
            Select::make('semester')
            ->options([
                'odd' => 'Odd',
                'even' => 'Even',
            ])->required()->native(false),
            FileUpload::make('profile_img')
            ->image()->avatar()
            ->directory('Students')
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
                TextColumn::make('roll_no')->label('Registration Number'),
                TextColumn::make('email')->toggleable(isToggledHiddenByDefault: true)->wrap(),
                TextColumn::make('year')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('semester')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('course')->toggleable(isToggledHiddenByDefault: true)->getStateUsing(function (Model $record) {
                    return ($record->course=="B.E") ? "B.E" : 'B.Tech';
                }),
                TextColumn::make('branch')->label('Department')->toggleable(isToggledHiddenByDefault: true)->wrap(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudents::route('/create'),
            'edit' => Pages\EditStudents::route('/{record}/edit'),
        ];
    }
}
