<?php

namespace App\Filament\Resources\StudentTargetsResource\Pages;

use App\Filament\Resources\StudentTargetsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentTargets extends ListRecords
{
    protected static string $resource = StudentTargetsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
