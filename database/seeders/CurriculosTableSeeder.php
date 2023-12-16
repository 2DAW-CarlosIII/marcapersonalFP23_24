<?php

namespace Database\Seeders;

use App\Models\Curriculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculosTableSeeder extends Seeder
{
    private static $arrayCurriculos = [
        [
            'user_id' => 1,
            'video_curriculum' => 'Ds8lRXWfoPE',
        ],
        [
            'user_id' => 2,
            'video_curriculum' => 'fabDpTOfKns',
        ],
        [
            'user_id' => 3,
            'video_curriculum' => '2in5XMTlSWg',
        ],
        [
            'user_id' => 4,
            'video_curriculum' => 'Sn-Za-l--e0',
        ],
        [
            'user_id' => 5,
            'video_curriculum' => 'T72HF3a2xL4',
        ],
        [
            'user_id' => 6,
            'video_curriculum' => 'uTgscfzdbCc',
        ],
        [
            'user_id' => 7,
            'video_curriculum' => 'bIPgAncy3Q0',
        ],
        [
            'user_id' => 8,
            'video_curriculum' => 'DCHp1F13R8k',
        ],
        [
            'user_id' => 9,
            'video_curriculum' => 'nL7dnv_egaI',
        ],
        [
            'user_id' => 10,
            'video_curriculum' => 'AKLJxNRrvjc',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curriculo::truncate();

        foreach( self::$arrayCurriculos as $curriculo ) {
            $curri = new Curriculo;
            $curri->user_id = $curriculo['user_id'];
            $curri->video_curriculum = $curriculo['video_curriculum'];
            $curri->save();
        }
    }
}
