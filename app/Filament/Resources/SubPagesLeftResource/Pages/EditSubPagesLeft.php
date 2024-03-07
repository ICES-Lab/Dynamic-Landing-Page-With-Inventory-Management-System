<?php

namespace App\Filament\Resources\SubPagesLeftResource\Pages;

use App\Filament\Resources\SubPagesLeftResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubPagesLeft extends EditRecord
{
    protected static string $resource = SubPagesLeftResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
