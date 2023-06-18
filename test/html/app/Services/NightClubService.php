<?php

namespace App\Services;

use App\Models\Person;

class NightClubService
{
    public function createPeople($numberOfPeople, $musicGenre)
    {
        $bodyPartMovements = [
            'body swaying' => 'покачивание телом вперед-назад',
            'knee bends' => 'ноги в полуприседе',
            'arm swings' => 'руками согнутыми в локтях',
            'head bobs' => 'головой вперед-назад',
            'body rocking' => 'покачивание туловищем вперед-назад',
            'minimal head movement' => 'почти нет движения головой',
            'arm circles' => 'круговые движения-вращения руками',
            'leg movements' => 'ноги двигаются в ритме',
            'smooth body movements' => 'плавные движения туловищем',
            'hand gestures' => 'плавные движения руками',
            'graceful footwork' => 'плавные движения ногами',
            'head tilts' => 'плавные движения головой',
            'intermittent body movements' => 'прерывистые движения туловищем',
            'intermittent arm movements' => 'прерывистые движения руками',
            'intermittent leg movements' => 'прерывистые движения ногами',
            'intermittent head movements' => 'прерывистые движения головой',
        ];

        $genres = [
            'hip-hop' => ['покачивание телом вперед-назад', 'ноги в полуприседе', 'руками согнутыми в локтях', 'головой вперед-назад'],
            'r&b' => ['покачивание телом вперед-назад', 'ноги в полуприседе', 'руками согнутыми в локтях', 'головой вперед-назад'],
            'electrodance' => ['покачивание туловищем вперед-назад', 'почти нет движения головой', 'круговые движения-вращения руками', 'ноги двигаются в ритме'],
            'pop' => ['плавные движения туловищем', 'плавные движения руками', 'плавные движения ногами', 'плавные движения головой'],
            'pop-music' => ['плавные движения туловищем', 'плавные движения руками', 'плавные движения ногами', 'плавные движения головой'],
            'house' => ['прерывистые движения туловищем', 'прерывистые движения руками', 'прерывистые движения ногами', 'прерывистые движения головой'],
            'electrohouse' => ['прерывистые движения туловищем', 'прерывистые движения руками', 'прерывистые движения ногами', 'прерывистые движения головой', 'покачивание туловищем вперед-назад', 'почти нет движения головой', 'круговые движения-вращения руками', 'ноги двигаются в ритме'],
        ];


        $people = [];

        for ($i = 1; $i <= $numberOfPeople; $i++) {
            $name = 'Человек ' . $i;
            $randomMovements = [];

            // Randomly select movements
            foreach ($bodyPartMovements as $movement) {
                if (rand(0, 1)) {
                    $randomMovements[] = $movement;
                }
            }

            $person = new Person($name, $randomMovements);

            // Set movements for each music genre
            foreach ($genres as $genre => $genreMovements) {
                $person->setGenreMovements($genre, array_intersect($randomMovements, $genreMovements));
            }

            $people[] = $person;
        }

        return $people;
    }

    public function checkDanceMovements($person, $musicGenre)
    {
        $genreMovements = $person->getGenreMovements($musicGenre);

        if ($genreMovements) {
            return $person->getName() . ' танцует под ' . $musicGenre . ', используя ' . implode(', ', $genreMovements) . '.';
        } else {
            return $person->getName() . ' пьет водку';
        }
    }


}
