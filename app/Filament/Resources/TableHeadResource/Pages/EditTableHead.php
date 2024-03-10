<?php

namespace App\Filament\Resources\TableHeadResource\Pages;

use App\Filament\Resources\TableHeadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTableHead extends EditRecord
{
    protected static string $resource = TableHeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
