<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $admins = User::query()
            ->where('is_admin', true)
            ->pluck('id');

        if ($admins->isEmpty()) {
            return;
        }

        $newsItems = [
            [
                'title' => 'Nieuw motoseizoen gestart in Gent',
                'content' => "Met de lente in zicht komt het motoseizoen in Gent opnieuw op gang. Motorrijders halen hun motoren uit de winterstalling en genieten van de eerste droge dagen.\n\nHet begin van het seizoen vraagt extra aandacht. Na maanden minder rijden is het belangrijk om rustig opnieuw te wennen aan het verkeer en je motor grondig te controleren. Denk aan bandenspanning, remmen en verlichting.\n\nDe Gentse moto community roept iedereen op om het seizoen veilig en respectvol te starten, zodat we samen kunnen genieten van een lange en zorgeloze motorzomer.",
                'image' => 'news/gent-season-start.jpg',
            ],
            [
                'title' => 'Populaire mototrajecten rond Gent: onze top 5',
                'content' => "Gent ligt ideaal voor motorrijders die graag korte, ontspannende ritten maken. Zonder ver te moeten rijden, vind je mooie wegen langs water, natuur en rustige dorpen.\n\nPopulaire routes zijn onder andere langs de Schelde richting Gavere, de Leiestreek richting Deinze en landelijke wegen rond Lochristi en Zaffelare.",
                'image' => 'news/routes-gent.jpg',
            ],
            [
                'title' => 'Gentse motards waarschuwen voor gevaarlijke kruispunten',
                'content' => "Binnen de community worden regelmatig ervaringen gedeeld over gevaarlijke verkeerspunten in en rond Gent. Vooral kruispunten met tramsporen, onduidelijke voorrang of slecht zicht zorgen voor risico’s.\n\nDoor deze ervaringen te delen, hoopt de community andere motards bewuster te maken en ongevallen te helpen voorkomen.",
                'image' => 'news/dangerous-crossroads.jpg',
            ],
            [
                'title' => 'Samen rijden, samen veilig: groepsritten uitgelegd',
                'content' => "Groepsritten zijn populair binnen de Gentse moto community, maar ze vragen duidelijke afspraken.\n\nBelangrijke regels zijn voldoende afstand houden, in formatie rijden en duidelijke signalen gebruiken. De voorrijder bepaalt het tempo en houdt rekening met de minst ervaren rijder.",
                'image' => 'news/group-ride.jpg',
            ],
            [
                'title' => 'Motor parkeren in Gent: wat mag en wat niet?',
                'content' => "Motorrijders in Gent hebben vaak vragen over parkeren. In veel zones mag een motor gratis parkeren, zolang voetgangers en hulpdiensten niet gehinderd worden.\n\nRespecteer steeds de lokale signalisatie om boetes te vermijden.",
                'image' => 'news/parking-gent.jpg',
            ],
            [
                'title' => 'Interview met een Gentse motard',
                'content' => "Deze week spraken we met een lokale motorrijder die dagelijks door Gent rijdt.\n\nVolgens hem maakt de Gentse moto community het verschil door elkaar te helpen en ervaringen te delen.",
                'image' => 'news/interview-rider.jpg',
            ],
            [
                'title' => 'Starten met motorrijden in de stad',
                'content' => "Voor beginnende motorrijders kan Gent uitdagend zijn. Druk verkeer, tramsporen en fietsers vragen constante aandacht.\n\nDe community moedigt starters aan om vragen te stellen en ervaringen te delen.",
                'image' => 'news/beginner-city.jpg',
            ],
            [
                'title' => 'Onderhoudstips voor stadsrijders',
                'content' => "Stadsverkeer vraagt veel van een motor. Vaak stoppen, optrekken en korte ritten zorgen voor extra slijtage.\n\nGoed onderhoud verhoogt niet alleen de levensduur van je motor, maar ook de veiligheid.",
                'image' => 'news/maintenance.jpg',
            ],
            [
                'title' => 'Motorkleding: wat werkt echt in Belgisch weer',
                'content' => "Het Belgische weer is onvoorspelbaar. Waterdichte kleding en goede ventilatie zijn geen luxe.\n\nGoede motorkleding verhoogt comfort en veiligheid, ook bij korte ritten.",
                'image' => 'news/motor-gear.jpg',
            ],
            [
                'title' => 'Elektrische motoren winnen terrein in Gent',
                'content' => "Elektrische motorfietsen worden steeds zichtbaarder in Gent.\n\nVoor woon-werkverkeer zijn ze ideaal, al blijft actieradius een aandachtspunt.",
                'image' => 'news/electric-bike.jpg',
            ],
            [
                'title' => 'Motorevents en bijeenkomsten in en rond Gent',
                'content' => "Het motoseizoen brengt ook evenementen met zich mee. Van informele meet-ups tot georganiseerde ritten.\n\nDeze bijeenkomsten versterken de band binnen de community.",
                'image' => 'news/events.jpg',
            ],
            [
                'title' => 'Geluidsoverlast en motorrijden: hoe gaan we ermee om?',
                'content' => "Geluid is een gevoelig onderwerp in de stad. Motorrijders kunnen bijdragen aan een beter imago door bewust om te gaan met gas en uitlaten.",
                'image' => 'news/noise.jpg',
            ],
            [
                'title' => 'Tips voor veilig rijden op natte kasseien',
                'content' => "Gentse kasseien zijn berucht bij regen.\n\nVermijd bruusk remmen en houd een constante snelheid.",
                'image' => 'news/cobblestones.jpg',
            ],
            [
                'title' => 'Van woon-werkverkeer tot hobby: motorrijden in Gent',
                'content' => "Voor velen is de motor zowel praktisch als ontspannend.\n\nMotorrijden biedt flexibiliteit in een drukke stad.",
                'image' => 'news/commute.jpg',
            ],
            [
                'title' => 'Tweedehands motor kopen: waar moet je op letten?',
                'content' => "Een tweedehands motor kan een goede keuze zijn.\n\nLet op onderhoudsgeschiedenis, slijtage en algemene staat.",
                'image' => 'news/used-bike.jpg',
            ],
            [
                'title' => 'Motorrijden en duurzaamheid',
                'content' => "Steeds meer motorrijders denken na over hun ecologische voetafdruk.\n\nOok kleine stappen dragen bij aan duurzamer motorrijden.",
                'image' => 'news/sustainability.jpg',
            ],
            [
                'title' => 'De meest voorkomende fouten van beginnende motards',
                'content' => "Te weinig anticiperen en overschatting van eigen kunnen zijn vaak voorkomende fouten.\n\nLeren uit ervaringen van anderen helpt enorm.",
                'image' => 'news/beginner-mistakes.jpg',
            ],
            [
                'title' => 'Vrouwen op de motor: groeiende community in Gent',
                'content' => "Steeds meer vrouwen stappen op de motor en worden actief binnen de Gentse community.\n\nMotorrijden is er voor iedereen.",
                'image' => 'news/women-riders.jpg',
            ],
            [
                'title' => 'Wat te doen bij een ongeval in de stad',
                'content' => "Bij een ongeval is kalm blijven essentieel.\n\nGoede voorbereiding helpt stress beperken.",
                'image' => 'news/accident.jpg',
            ],
            [
                'title' => 'Waarom een lokale moto community het verschil maakt',
                'content' => "Een lokale community biedt meer dan samen rijden.\n\nSamen maken we motorrijden beter en veiliger.",
                'image' => 'news/community.jpg',
            ],
        ];

        foreach ($newsItems as $item) {
            News::query()->create([
                'user_id' => $admins->random(),
                'title' => $item['title'],
                'content' => $item['content'],
                'image' => $item['image'],
                'published_at' => Carbon::now()->subDays(rand(1, 60)),
            ]);
        }
    }
}
