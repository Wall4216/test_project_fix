<?php
namespace App\Models;

use App\Http\Controllers\NightClubController;
use App\Services\NightClubService;

class NightClub
{
    private $musicGenre;

    public function setMusicGenre($musicGenre)
    {
        $this->musicGenre = $musicGenre;
    }

    public function startParty()
    {
        $nightClubController = new NightClubController(new NightClubService());
        $nightClubController->startParty(58, $this->musicGenre);
    }
}
