<?php

namespace App\Filament\Resources\SubPagesRightResource\Pages;

use App\Filament\Resources\SubPagesRightResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubPagesRight extends EditRecord
{
    protected static string $resource = SubPagesRightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
