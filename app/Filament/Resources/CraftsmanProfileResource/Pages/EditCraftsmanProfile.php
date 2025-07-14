<?php

namespace App\Filament\Resources\CraftsmanProfileResource\Pages;

use App\Filament\Resources\CraftsmanProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCraftsmanProfile extends EditRecord
{
    protected static string $resource = CraftsmanProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
