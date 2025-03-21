<?php

namespace App\Services;

use App\Repositories\TopImageRepository;

class TopImageService {
    protected $repository;

    public function __construct(TopImageRepository $repository) {
        $this->repository = $repository;
    }

    public function getAllImages() {
        return $this->repository->getAll();
    }

    public function getImageById(string $imageId) {
        return $this->repository->getByImageId($imageId);
    }

    public function updateImageById(string $imageId, array $data) {
        return $this->repository->updateByImageId($imageId, $data);
    }
}
