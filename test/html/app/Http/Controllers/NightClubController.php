<?php
namespace App\Http\Controllers;

use App\Models\Person;
use App\Services\NightClubService;

class NightClubController
{
    private $nightClubService;

    public function __construct(NightClubService $nightClubService)
    {
        $this->nightClubService = $nightClubService;
    }

    public function startParty($numberOfPeople, $musicGenre = 'pop-music')
    {
        $people = $this->nightClubService->createPeople($numberOfPeople, $musicGenre);

        // Выводим информацию о телодвижениях каждого человека
        foreach ($people as $person) {
            echo $person->getName() . ":<br>";

            $danceStatus = $this->nightClubService->checkDanceMovements($person, $musicGenre);
            echo $danceStatus . "<br>";

            echo "<br>";
        }
    }
}
