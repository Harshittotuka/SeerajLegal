<?php
namespace App\Services;

use App\Repositories\SubscriptionRepository;

class SubscriptionService
{
    protected $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function subscribe(string $email): void
    {
        $this->repository->storeEmail($email);
    }
}
