<?php

namespace App\Filament\Resources\TableContentResource\Pages;

use App\Filament\Resources\TableContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTableContents extends ListRecords
{
    protected static string $resource = TableContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
