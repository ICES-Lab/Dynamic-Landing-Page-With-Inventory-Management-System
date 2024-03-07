<?php

namespace App\Filament\Resources\SubPagesRightResource\Pages;

use App\Filament\Resources\SubPagesRightResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubPagesRights extends ListRecords
{
    protected static string $resource = SubPagesRightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
