<?php

namespace App\Filament\Resources\SubPagesSocialMediaResource\Pages;

use App\Filament\Resources\SubPagesSocialMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubPagesSocialMedia extends EditRecord
{
    protected static string $resource = SubPagesSocialMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
