<?php
namespace App\Repositories;

use App\Models\Subscription;

class SubscriptionRepository
{
    public function storeEmail(string $email): void
    {
        // Check if email already exists
        if (!Subscription::where('mail', $email)->exists()) {
            Subscription::create(['mail' => $email]);
        }
    }
}
