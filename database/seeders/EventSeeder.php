<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $description = "2024. július 20-án a bokszvilág szemtanúja lesz egy rendkívüli eseménynek, amikor Mike Tyson, a boksz legendája, és Jake Paul, a YouTube-szenzáció és feltörekvő bokszoló, szorítóba lép egymással. Ez a párosítás nem csak a generációk találkozása, hanem két eltérő karrierút kereszteződése is a boksz világában. Tyson, aki a '80-as és '90-es években dominálta a nehézsúlyú kategóriát, ismét bizonyítani akar, míg Paul, aki a közösségi média platformjain szerzett hírnevet követően fordult a profi boksz felé, komolyságát kívánja hangsúlyozni az ökölvívásban. A mérkőzés ígéretes összecsapás lesz a tapasztalat és az új kor szellemének jegyében, ahol a sportolók mindent megtesznek, hogy beírják nevüket a boksz történelemkönyveibe. Az esemény nem csak a sportrajongókat, hanem a szélesebb közönséget is magához vonzza, ígérve egy emlékezetes éjszakát, ahol a múlt nagysága és a jelen ígérete összecsap.";

        Event::create([
            'name' => 'A Ring Új Királyai: Tyson vs Paul - A Várva Várt Összecsapás',
            'type' => 'in_door',
            'desc' => $description,
            'main_photo' => 'images/boxing_match_announcement.png',
            'event_start_at' => '2024-07-20 18:00:00',
            'published_at' => '2024-03-13 10:00:00',
        ]);

        $description = 'Holnap kerül sor az Anglia-Szlovákia nyolcaddöntőre a 2024-es labdarúgó-Európa-bajnokságon. A mérkőzést 18:00-kor kezdik a gelsenkircheni Veltins Arénában. Az angol csapat eddig meggyőző teljesítményt nyújtott, de a szlovákok is kemény ellenfélnek bizonyulhatnak.';
        Event::create([
            'name' => 'Anglia-Szlovákia',
            'type' => 'out_door',
            'desc' => $description,
            'main_photo' => 'images/England_vs_Slovakia_Euro2024_Round_of_16.png',
            'event_start_at' => '2024-06-30 18:00:00',
            'published_at' => '2024-06-29 22:51:00',
        ]);

    }
}
