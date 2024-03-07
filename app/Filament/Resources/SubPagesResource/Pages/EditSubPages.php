<?php

namespace App\Filament\Resources\SubPagesResource\Pages;

use App\Filament\Resources\SubPagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubPages extends EditRecord
{
    protected static string $resource = SubPagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
