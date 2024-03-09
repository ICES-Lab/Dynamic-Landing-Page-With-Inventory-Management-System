<?php

namespace App\Filament\Resources\MainDetailsResource\Pages;

use App\Filament\Resources\MainDetailsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMainDetails extends ListRecords
{
    protected static string $resource = MainDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Create Details'),
        ];
    }
}
