<?php

namespace App\Filament\Resources\ColetaResource\Pages;

use App\Filament\Resources\ColetaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColetas extends ListRecords
{
    protected static string $resource = ColetaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
