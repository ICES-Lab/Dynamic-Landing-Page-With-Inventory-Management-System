<?php

namespace App\Filament\Resources\TableContentResource\Pages;

use App\Filament\Resources\TableContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTableContent extends EditRecord
{
    protected static string $resource = TableContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
