<?php

namespace App\Filament\Resources\MainDetailsResource\Pages;

use App\Filament\Resources\MainDetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMainDetails extends EditRecord
{
    protected static string $resource = MainDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
