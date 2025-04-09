<?php

namespace App\Repositories;

use App\Models\TopImage;

class TopImageRepository {
    public function getAll() {
        return TopImage::all();
    }

    public function getByImageId(string $imageId) {
        return TopImage::where('image_id', $imageId)->first();
    }

    public function updateByImageId(string $imageId, array $data) {
        return TopImage::where('image_id', $imageId)->update($data);
    }
}
