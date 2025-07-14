<?php

namespace App\Filament\Resources\CraftsmanProfileResource\Pages;

use App\Filament\Resources\CraftsmanProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCraftsmanProfiles extends ListRecords
{
    protected static string $resource = CraftsmanProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
