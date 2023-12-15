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
            'video_curriculum' => 'https://www.youtube.com/watch?v=u54uern',
        ],
        [
            'user_id' => 2,
            'video_curriculum' => 'https://www.youtube.com/watch?v=v87dfg2',
        ],
        [
            'user_id' => 3,
            'video_curriculum' => 'https://www.youtube.com/watch?v=frt32qe',
        ],
        [
            'user_id' => 4,
            'video_curriculum' => 'https://www.youtube.com/watch?v=wtrh2we',
        ],
        [
            'user_id' => 5,
            'video_curriculum' => 'https://www.youtube.com/watch?v=qwer123',
        ],
        [
            'user_id' => 6,
            'video_curriculum' => 'https://www.youtube.com/watch?v=ytgfd32',
        ],
        [
            'user_id' => 7,
            'video_curriculum' => 'https://www.youtube.com/watch?v=zxvbn23',
        ],
        [
            'user_id' => 8,
            'video_curriculum' => 'https://www.youtube.com/watch?v=asdf456',
        ],
        [
            'user_id' => 9,
            'video_curriculum' => 'https://www.youtube.com/watch?v=qwerty78',
        ],
        [
            'user_id' => 10,
            'video_curriculum' => 'https://www.youtube.com/watch?v=mnbvc90',
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
