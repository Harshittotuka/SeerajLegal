<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImageCropper extends Component
{
    public function __construct()
    {
        // You can add parameters if needed
    }

    public function render()
    {
        return view('components.image-cropper');
    }
}
