<?php

namespace Database\Seeders;

use App\Models\ManageableContent;
use Illuminate\Database\Seeder;

class ManageableContentsTableSeeder extends Seeder
{
    public function run()
    {
        $contents = [
            [
                'key' => 'instagram_link',
                'value' => 'https://www.instagram.com/toca_da_ca/',
                'description' => 'Link do Instagram'
            ],
            [
                'key' => 'pix_qr_code',
                'value' => 'imgs/qr-code-pix.jpeg',
                'description' => 'QR Code para PIX'
            ],
            [
                'key' => 'vakinha_link',
                'value' => 'https://apoia.se/tocadaca',
                'description' => 'Link para Vakinha'
            ]
        ];

        foreach ($contents as $content) {
            ManageableContent::firstOrCreate(['key' => $content['key']], $content);
        }
    }
}
