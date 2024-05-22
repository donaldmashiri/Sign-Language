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
            ['image_path' => 'images/A.png', 'letter' => 'A'],
            ['image_path' => 'images/B.png', 'letter' => 'B'],
            ['image_path' => 'images/C.png', 'letter' => 'C'],
            ['image_path' => 'images/D.png', 'letter' => 'D'],
            ['image_path' => 'images/E.png', 'letter' => 'E'],
            ['image_path' => 'images/F.png', 'letter' => 'F'],
            ['image_path' => 'images/G.png', 'letter' => 'G'],
            ['image_path' => 'images/H.png', 'letter' => 'H'],
            ['image_path' => 'images/I.png', 'letter' => 'I'],
            ['image_path' => 'images/J.png', 'letter' => 'J'],
            ['image_path' => 'images/K.png', 'letter' => 'K'],
            ['image_path' => 'images/L.png', 'letter' => 'L'],
            ['image_path' => 'images/M.png', 'letter' => 'M'],
            ['image_path' => 'images/N.png', 'letter' => 'N'],
            ['image_path' => 'images/O.png', 'letter' => 'O'],
            ['image_path' => 'images/P.png', 'letter' => 'P'],
            ['image_path' => 'images/Q.png', 'letter' => 'Q'],
            ['image_path' => 'images/R.png', 'letter' => 'R'],
            ['image_path' => 'images/S.png', 'letter' => 'S'],
            ['image_path' => 'images/T.png', 'letter' => 'T'],
            ['image_path' => 'images/U.png', 'letter' => 'U'],
            ['image_path' => 'images/V.png', 'letter' => 'V'],
            ['image_path' => 'images/W.png', 'letter' => 'W'],
            ['image_path' => 'images/X.png', 'letter' => 'X'],
            ['image_path' => 'images/Y.png', 'letter' => 'Y'],
            ['image_path' => 'images/Z.png', 'letter' => 'Z']
        ]);
    }
}
