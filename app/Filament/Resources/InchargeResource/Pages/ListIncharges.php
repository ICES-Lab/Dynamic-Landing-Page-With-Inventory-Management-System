<?php

namespace App\Filament\Resources\InchargeResource\Pages;

use App\Filament\Resources\InchargeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIncharges extends ListRecords
{
    protected static string $resource = InchargeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
