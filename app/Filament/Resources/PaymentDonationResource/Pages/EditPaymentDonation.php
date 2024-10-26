<?php

namespace App\Filament\Resources\PaymentDonationResource\Pages;

use App\Filament\Resources\PaymentDonationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentDonation extends EditRecord
{
    protected static string $resource = PaymentDonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
