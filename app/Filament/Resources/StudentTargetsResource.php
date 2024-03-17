<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentTargetsResource\Pages;
use App\Filament\Resources\StudentTargetsResource\RelationManagers;
use App\Models\StudentTargets;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentTargetsResource extends Resource
{
    protected static ?string $model = StudentTargets::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $activeNavigationIcon = 'heroicon-s-clipboard-document-list';
    protected static ?string $navigationGroup = 'Student';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Select::make('student_id')
            ->label('Student')
            ->relationship('student','name')->searchable()->preload()->native(0)
            ->suffixIcon('heroicon-m-user-circle')->suffixIconColor('primary')
            ->loadingMessage('Loading Students...')->noSearchResultsMessage('No Students found')->searchPrompt('Search Students')
            ->optionsLimit(1000)
            ->required(), 
            Section::make([      
            Checkbox::make('competition'),
            Checkbox::make('paper_presentation'),
            Checkbox::make('online_course'),
            Checkbox::make('patent'),
            Checkbox::make('internship')])->columns(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('')
                ->rowIndex(),
                TextColumn::make('student.name')->label('Students'),
                TextColumn::make('student.year')->label('Year'),
                CheckboxColumn::make('competition')->summarize([
                    Sum::make()->label('Completed'),
                    Average::make()->label('Average')->numeric(
                        decimalPlaces: 0,
                    ),
                    Count::make()->label('Total')
                ])->toggleable(isToggledHiddenByDefault: true),
                CheckboxColumn::make('paper_presentation')->summarize([
                    Sum::make()->label('Completed'),
                    Average::make()->label('Average')->numeric(
                        decimalPlaces: 0,
                    ),
                    Count::make()->label('Total')
                ])->toggleable(isToggledHiddenByDefault: true),
                CheckboxColumn::make('online_course')->summarize([
                    Sum::make()->label('Completed'),
                    Average::make()->label('Average')->numeric(
                        decimalPlaces: 0,
                    ),
                    Count::make()->label('Total')
                ])->toggleable(isToggledHiddenByDefault: true),
                CheckboxColumn::make('patent')->summarize([
                    Sum::make()->label('Completed'),
                    Average::make()->label('Average')->numeric(
                        decimalPlaces: 0,
                    ),
                    Count::make()->label('Total')
                ])->toggleable(isToggledHiddenByDefault: true),
                CheckboxColumn::make('internship')->summarize([
                    Sum::make()->label('Completed'),
                    Average::make()->label('Average')->numeric(
                        decimalPlaces: 0,
                    ),
                    Count::make()->label('Total')
                ])->toggleable(isToggledHiddenByDefault: true)                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListStudentTargets::route('/'),
            'create' => Pages\CreateStudentTargets::route('/create'),
            // 'edit' => Pages\EditStudentTargets::route('/{record}/edit'),
        ];
    }
}
