<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\EmotionTrack;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmotionTrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        $emotionTracks = [
            [
                'title' => 'Sarapan Pagi',
                'content' => 'Saya makan nasi goreng untuk sarapan. Rasanya enak!',
                'emotion' => 'happy',
            ],
            [
                'title' => 'Pergi ke Kantor',
                'content' => 'Perjalanan ke kantor cukup melelahkan hari ini karena macet.',
                'emotion' => 'neutral',
            ],
            [
                'title' => 'Makan Mochi',
                'content' => 'Saya makan mochi cokelat, teksturnya lembut dan enak!',
                'emotion' => 'happy',
            ],
            [
                'title' => 'Lembur Kerja',
                'content' => 'Banyak pekerjaan yang harus diselesaikan, jadi harus lembur.',
                'emotion' => 'sad',
            ],
            [
                'title' => 'Nonton Film',
                'content' => 'Menonton film favorit setelah seharian bekerja. Sangat menyenangkan!',
                'emotion' => 'happy',
            ],
        ];

       foreach ($users as $user) {
        foreach ($emotionTracks as $track) {
            EmotionTrack::create([
                'user_id' => $user->id,
                'title' => $track['title'],
                'content' => $track['content'],
                'emotion' => $track['emotion'],
            ]);
        }
       }
    }
}
