<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TopImage;

class TopImagesSeeder extends Seeder {
    public function run(): void {
        $topImages = [
            [
                'image_id' => 'TopImg_abt',
                'page_name' => 'About',
                'title' => 'About us',
                'sub_title' => 'Who we Are ?',
                'image_url' => 'assets/dynamic/Top/TopImg_abt.webp',
                'image_resolution' => json_encode([1792, 1024]),
                'icon' => "fa-solid fa-eject",
            ],
            [
                'image_id' => 'TopImg_rul',
                'page_name' => 'Rules page name',
                'title' => 'Rules title',
                'sub_title' => 'Rules Subtitle',
                'image_url' => 'assets/dynamic/Top/TopImg_rul.webp',
                'image_resolution' => json_encode([1792, 1024]),
                'icon' => "fa-solid fa-eject",
            ],
            [
                'image_id' => 'TopImg_faq',
                'page_name' => 'Faq',
                'title' => 'About us',
                'sub_title' => 'Frequently Asked Questions',
                'image_url' => 'assets/dynamic/Top/TopImg_faq.webp',
                'image_resolution' => json_encode([1792, 1024]),
                'icon' => "fa-solid fa-circle-question",
            ],
            [
                'image_id' => 'TopImg_bec',
                'page_name' => 'Become a member',
                'title' => 'Membership',
                'sub_title' => 'Become a member',
                'image_url' => 'assets/dynamic/Top/TopImg_mem.webp',
                'image_resolution' => json_encode([1792, 1024]),
                'icon' => "fa-regular fa-id-badge",
            ],
            [
                'image_id' => 'TopImg_mem',
                'page_name' => 'Member list',
                'title' => 'Membership',
                'sub_title' => 'Our Members',
                'image_url' => 'assets/dynamic/Top/TopImg_mem.webp',
                'image_resolution' => json_encode([1792, 1024]),
                'icon' => "fa-solid fa-address-book",
            ],
            [
                'image_id' => 'TopImg_pan',
                'page_name' => 'Panel',
                'title' => 'Membership',
                'sub_title' => 'Our Panel',
                'image_url' => 'assets/dynamic/Top/TopImg_pan.webp',
                'image_resolution' => json_encode([1792, 1024]),
                'icon' => "fa-solid fa-table-columns",
            ],
            [
                'image_id' => 'TopImg_tea',
                'page_name' => 'Team',
                'title' => 'Qualified experts',
                'sub_title' => 'Meet Our Attorneys',
                'image_url' => 'assets/dynamic/Top/TopImg_tea.webp',
                'image_resolution' => json_encode([1792, 1024]),
                'icon' => "fa-solid fa-database",
            ],
            [
                'image_id' => 'TopImg_con',
                'page_name' => 'Contact',
                'title' => 'Get in touch',
                'sub_title' => 'Contact Info',
                'image_url' => 'assets/dynamic/Top/TopImg_con.webp',
                'image_resolution' => json_encode([1792, 1024]),
                'icon' => "fa-solid fa-id-card-clip",
            ],
            [
                'image_id' => 'TopImg_hom',
                'page_name' => 'Home',
                'title' => 'Transforming Conflicts into Agreements',
                'sub_title' => 'Justice Made Accessible: faster and fairer',
                'image_url' => 'assets/dynamic/Top/TopImg_hom.webp',
                'image_resolution' => json_encode([1792, 1024]),
                'icon' => "fa-solid fa-house",
            ],
        ];

        foreach ($topImages as $topImage) {
            TopImage::create($topImage);
        }
    }
}
