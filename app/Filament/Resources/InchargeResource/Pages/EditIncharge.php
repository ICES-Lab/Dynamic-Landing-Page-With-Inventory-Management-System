<?php

namespace App\Filament\Resources\InchargeResource\Pages;

use App\Filament\Resources\InchargeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIncharge extends EditRecord
{
    protected static string $resource = InchargeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
