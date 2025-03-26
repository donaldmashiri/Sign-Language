<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('dictionaries')->insert([
            ['image' => 'images/A.png', 'letter' => 'A', 'description' => 'Thumb and index finger form a circle'],
            ['image' => 'images/B.png', 'letter' => 'B', 'description' => 'Flat hand with fingers together'],
            ['image' => 'images/C.png', 'letter' => 'C', 'description' => 'Curved hand, fingertips touch thumb'],
            ['image' => 'images/D.png', 'letter' => 'D', 'description' => 'Index finger extended, other fingers curled'],
            ['image' => 'images/E.png', 'letter' => 'E', 'description' => 'Flat hand, palm facing down'],
            ['image' => 'images/F.png', 'letter' => 'F', 'description' => 'Thumb and index finger form an F shape'],
            ['image' => 'images/G.png', 'letter' => 'G', 'description' => 'Thumb and index finger form a G shape'],
            ['image' => 'images/H.png', 'letter' => 'H', 'description' => 'Palm facing body, fingers together'],
            ['image' => 'images/I.png', 'letter' => 'I', 'description' => 'Index finger extended'],
            ['image' => 'images/J.png', 'letter' => 'J', 'description' => 'Index finger extended, hand moves down'],
            ['image' => 'images/K.png', 'letter' => 'K', 'description' => 'Thumb and index finger form a K shape'],
            ['image' => 'images/L.png', 'letter' => 'L', 'description' => 'Index finger and thumb form an L shape'],
            ['image' => 'images/M.png', 'letter' => 'M', 'description' => 'Flat hand, palm facing body'],
            ['image' => 'images/N.png', 'letter' => 'N', 'description' => 'Index and middle fingers extended'],
            ['image' => 'images/O.png', 'letter' => 'O', 'description' => 'Thumb and index finger form a circle'],
            ['image' => 'images/P.png', 'letter' => 'P', 'description' => 'Thumb and index finger form a P shape'],
            ['image' => 'images/Q.png', 'letter' => 'Q', 'description' => 'Thumb and little finger extended'],
            ['image' => 'images/R.png', 'letter' => 'R', 'description' => 'Thumb and index finger form an R shape'],
            ['image' => 'images/S.png', 'letter' => 'S', 'description' => 'Flat hand with fingers together'],
            ['image' => 'images/T.png', 'letter' => 'T', 'description' => 'Flat hand, fingers together, palm facing down'],
            ['image' => 'images/U.png', 'letter' => 'U', 'description' => 'Thumb and index finger form a U shape'],
            ['image' => 'images/V.png', 'letter' => 'V', 'description' => 'Index and middle fingers extended in a V'],
            ['image' => 'images/W.png', 'letter' => 'W', 'description' => 'Thumb and little finger extended'],
            ['image' => 'images/X.png', 'letter' => 'X', 'description' => 'Thumb and index finger form an X shape'],
            ['image' => 'images/Y.png', 'letter' => 'Y', 'description' => 'Thumb and little finger extended']
        ]);
    }
}
