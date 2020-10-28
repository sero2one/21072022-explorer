<?php

declare(strict_types=1);

namespace App\ViewModels\Concerns\Transaction;

use App\DTO\Payment;
use App\Facades\Network;
use App\Services\NumberFormatter;
use Illuminate\Support\Arr;

trait InteractsWithMultiPayment
{
    public function payments(): array
    {
        if (! $this->isMultiPayment()) {
            return [];
        }

        if (is_null($this->transaction->asset)) {
            return [];
        }

        return collect(Arr::get($this->transaction->asset, 'payments', []))
            ->map(fn ($payment) => new Payment(
                NumberFormatter::currency($payment['amount'] / 1e8, Network::currency()),
                $payment['recipientId'],
            ))
            ->toArray();
    }

    public function recipientsCount(): string
    {
        if (! $this->isMultiPayment()) {
            return NumberFormatter::number(0);
        }

        if (is_null($this->transaction->asset)) {
            return NumberFormatter::number(0);
        }

        return NumberFormatter::number(count(Arr::get($this->transaction->asset, 'payments')));
    }
}