<?php

namespace App\Filament\Resources\SubPagesLeftResource\Pages;

use App\Filament\Resources\SubPagesLeftResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubPagesLefts extends ListRecords
{
    protected static string $resource = SubPagesLeftResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
