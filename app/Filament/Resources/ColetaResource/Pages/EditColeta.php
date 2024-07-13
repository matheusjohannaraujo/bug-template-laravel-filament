<?php

namespace App\Filament\Resources\ColetaResource\Pages;

use App\Filament\Resources\ColetaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColeta extends EditRecord
{
    protected static string $resource = ColetaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
