<?php

namespace App\Filament\Resources\PaymentDonationResource\Pages;

use App\Filament\Resources\PaymentDonationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentDonations extends ListRecords
{
    protected static string $resource = PaymentDonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
