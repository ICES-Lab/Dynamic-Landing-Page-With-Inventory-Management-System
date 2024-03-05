<?php

namespace App\Filament\Resources\IconsResource\Pages;

use App\Filament\Resources\IconsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIcons extends EditRecord
{
    protected static string $resource = IconsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
