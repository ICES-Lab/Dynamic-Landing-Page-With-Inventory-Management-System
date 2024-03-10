<?php

namespace App\Filament\Resources\TableHeadResource\Pages;

use App\Filament\Resources\TableHeadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTableHeads extends ListRecords
{
    protected static string $resource = TableHeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
