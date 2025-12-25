<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqItem;
use App\Models\FaqCategory;

class FaqItemSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Algemeen motorrijden' => [
                [
                    'question' => 'Is motorrijden geschikt voor dagelijks gebruik?',
                    'answer' => 'Ja, zeker. Veel motorrijders gebruiken hun motor voor woon-werkverkeer. Het is vaak sneller in druk verkeer en goedkoper in verbruik.',
                ],
                [
                    'question' => 'Is motorrijden gevaarlijker dan autorijden?',
                    'answer' => 'Motorrijden brengt meer risico’s mee, maar met defensief rijden, goede uitrusting en ervaring kan je dit sterk beperken.',
                ],
                [
                    'question' => 'Hoe vaak moet ik mijn motor onderhouden?',
                    'answer' => 'Dat hangt af van het gebruik, maar een basiscontrole (banden, ketting, remmen) wordt aangeraden voor elke langere rit.',
                ],
                [
                    'question' => 'Kan ik het hele jaar door rijden?',
                    'answer' => 'Ja, mits aangepaste kleding en voorzichtig rijgedrag bij regen, koude of gladheid.',
                ],
                [
                    'question' => 'Heb ik speciale verzekering nodig?',
                    'answer' => 'Ja, een BA-verzekering is verplicht. Veel motards kiezen ook voor extra waarborgen zoals diefstal of omnium.',
                ],
            ],

            'Motorrijden in Gent' => [
                [
                    'question' => 'Zijn tramsporen gevaarlijk voor motoren?',
                    'answer' => 'Ja, vooral bij regen. Rij er zo recht mogelijk over en vermijd bruusk remmen of versnellen.',
                ],
                [
                    'question' => 'Mag ik tussen de files rijden in Gent?',
                    'answer' => 'Ja, filefilteren is toegestaan onder bepaalde voorwaarden (lage snelheid en voorzichtigheid).',
                ],
                [
                    'question' => 'Zijn kasseien gevaarlijk?',
                    'answer' => 'Ze bieden minder grip, vooral bij nat weer. Anticipeer en vermijd plotselinge manoeuvres.',
                ],
                [
                    'question' => 'Welke momenten zijn het drukst?',
                    'answer' => 'Ochtend- en avondspits zijn het drukst, vooral rond het centrum en grote invalswegen.',
                ],
                [
                    'question' => 'Is Gent motorvriendelijk?',
                    'answer' => 'Over het algemeen wel, maar het vraagt ervaring en aandacht door druk verkeer en infrastructuur.',
                ],
            ],

            'Wetgeving & regels' => [
                [
                    'question' => 'Is motorkleding verplicht?',
                    'answer' => 'Een helm, handschoenen, lange mouwen, lange broek en stevige schoenen zijn wettelijk verplicht.',
                ],
                [
                    'question' => 'Zijn luide uitlaten toegestaan?',
                    'answer' => 'Nee, je uitlaat moet voldoen aan de wettelijke geluidsnormen.',
                ],
                [
                    'question' => 'Heb ik altijd mijn rijbewijs nodig?',
                    'answer' => 'Ja, je moet je rijbewijs altijd kunnen voorleggen bij controle.',
                ],
                [
                    'question' => 'Zijn passagiers toegestaan?',
                    'answer' => 'Ja, als je motor daarvoor geschikt is en de passagier correcte bescherming draagt.',
                ],
                [
                    'question' => 'Mag ik met slippers rijden?',
                    'answer' => 'Nee, schoeisel moet de enkel beschermen.',
                ],
            ],

            'Parkeren & mobiliteit' => [
                [
                    'question' => 'Mag ik gratis parkeren met een motor in Gent?',
                    'answer' => 'In veel zones wel, zolang je geen hinder veroorzaakt en de signalisatie respecteert.',
                ],
                [
                    'question' => 'Mag ik op het voetpad parkeren?',
                    'answer' => 'Alleen als het expliciet toegelaten is en voetgangers niet gehinderd worden.',
                ],
                [
                    'question' => 'Mag ik in een parkeervak voor auto’s staan?',
                    'answer' => 'Ja, dat mag.',
                ],
                [
                    'question' => 'Kan ik een boete krijgen voor fout parkeren?',
                    'answer' => 'Ja, motoren zijn niet vrijgesteld van parkeerboetes.',
                ],
                [
                    'question' => 'Zijn er speciale motorparkeerplaatsen?',
                    'answer' => 'Ja, op verschillende plaatsen in Gent zijn er aangeduide motorzones.',
                ],
            ],

            'Veiligheid & ongevallen' => [
                [
                    'question' => 'Wat moet ik doen bij een ongeval?',
                    'answer' => 'Zorg eerst voor veiligheid, verwittig hulpdiensten indien nodig en vul een aanrijdingsformulier in.',
                ],
                [
                    'question' => 'Moet ik altijd een fluovest dragen?',
                    'answer' => 'Nee, maar het wordt sterk aangeraden bij pech of een ongeval.',
                ],
                [
                    'question' => 'Hoe kan ik mezelf zichtbaarder maken?',
                    'answer' => 'Door lichte kleding, reflecterende elementen en correct gebruik van verlichting.',
                ],
                [
                    'question' => 'Wat als de andere partij vluchtmisdrijf pleegt?',
                    'answer' => 'Noteer zoveel mogelijk gegevens en contacteer onmiddellijk de politie.',
                ],
                [
                    'question' => 'Is defensief rijden echt nodig?',
                    'answer' => 'Ja, anticiperen en rekening houden met fouten van anderen is cruciaal.',
                ],
            ],

            'Groepsritten & community' => [
                [
                    'question' => 'Mag iedereen deelnemen aan groepsritten?',
                    'answer' => 'Ja, zolang je de regels respecteert en het tempo aankan.',
                ],
                [
                    'question' => 'Is racen toegestaan tijdens groepsritten?',
                    'answer' => 'Nee, groepsritten zijn geen wedstrijden.',
                ],
                [
                    'question' => 'Hoe wordt het tempo bepaald?',
                    'answer' => 'Door de voorrijder, afgestemd op de minst ervaren rijder.',
                ],
                [
                    'question' => 'Wat als ik de groep kwijtraak?',
                    'answer' => 'Blijf rustig, volg de route of stop op een afgesproken punt.',
                ],
                [
                    'question' => 'Moet ik ervaring hebben om mee te rijden?',
                    'answer' => 'Basiservaring is voldoende, maar geef altijd aan als je beginner bent.',
                ],
            ],

            'Motoren & onderhoud' => [
                [
                    'question' => 'Hoe vaak moet ik mijn ketting smeren?',
                    'answer' => 'Gemiddeld elke 500–700 km of vaker bij regen.',
                ],
                [
                    'question' => 'Wanneer moet ik mijn banden vervangen?',
                    'answer' => 'Bij onvoldoende profiel, slijtage of ouderdom.',
                ],
                [
                    'question' => 'Is onderhoud in de winter anders?',
                    'answer' => 'Ja, zout en vocht vragen extra aandacht voor smering en bescherming.',
                ],
                [
                    'question' => 'Kan ik zelf onderhoud doen?',
                    'answer' => 'Basiszaken wel, maar grote herstellingen laat je beter aan een professional over.',
                ],
                [
                    'question' => 'Is stadsverkeer slecht voor mijn motor?',
                    'answer' => 'Het zorgt voor extra slijtage, maar goed onderhoud compenseert dit.',
                ],
            ],

            'Motorkleding & bescherming' => [
                [
                    'question' => 'Is een dure helm altijd beter?',
                    'answer' => 'Niet altijd, maar hij moet goed passen en gekeurd zijn.',
                ],
                [
                    'question' => 'Heb ik aparte zomer- en winterkleding nodig?',
                    'answer' => 'Dat is sterk aan te raden voor comfort en veiligheid.',
                ],
                [
                    'question' => 'Zijn jeansbroeken voldoende?',
                    'answer' => 'Alleen als ze speciaal ontworpen zijn voor motorrijden.',
                ],
                [
                    'question' => 'Zijn airbagvesten nuttig?',
                    'answer' => 'Ja, ze bieden extra bescherming bij een val.',
                ],
                [
                    'question' => 'Hoe belangrijk zijn handschoenen?',
                    'answer' => 'Zeer belangrijk: ze zijn wettelijk verplicht en beschermen bij valpartijen.',
                ],
            ],

            'Elektrisch & duurzaam rijden' => [
                [
                    'question' => 'Zijn elektrische motoren geschikt voor de stad?',
                    'answer' => 'Ja, ze zijn stil, vlot en ideaal voor korte afstanden.',
                ],
                [
                    'question' => 'Waar kan ik opladen in Gent?',
                    'answer' => 'Aan openbare laadpalen en soms thuis via een stopcontact.',
                ],
                [
                    'question' => 'Is de actieradius voldoende?',
                    'answer' => 'Voor stadsgebruik meestal wel, voor lange ritten minder.',
                ],
                [
                    'question' => 'Zijn elektrische motoren duurder?',
                    'answer' => 'In aankoop vaak wel, maar goedkoper in onderhoud.',
                ],
                [
                    'question' => 'Is elektrisch rijden milieuvriendelijker?',
                    'answer' => 'Ja, vooral in stedelijke omgevingen.',
                ],
            ],

            'Beginners & rijopleiding' => [
                [
                    'question' => 'Welke motor is geschikt voor beginners?',
                    'answer' => 'Een lichte, wendbare motor met beperkt vermogen is ideaal.',
                ],
                [
                    'question' => 'Is rijopleiding verplicht?',
                    'answer' => 'Ja, om een rijbewijs te behalen moet je opleiding en examens volgen.',
                ],
                [
                    'question' => 'Wat is beter: automaat of manueel?',
                    'answer' => 'Beide zijn goed; automaat is eenvoudiger, manueel geeft meer controle.',
                ],
                [
                    'question' => 'Hoe snel leer je veilig rijden?',
                    'answer' => 'Dat verschilt per persoon, maar ervaring opdoen kost tijd.',
                ],
                [
                    'question' => 'Kan ik meteen in de stad leren rijden?',
                    'answer' => 'Ja, maar begin rustig en vermijd drukke momenten.',
                ],
            ],
        ];

        foreach ($data as $categoryName => $items) {
            $category = FaqCategory::query()->where('name', $categoryName)->first();

            if (!$category) {
                continue;
            }

            foreach ($items as $item) {
                FaqItem::query()->create([
                    'faq_category_id' => $category->id,
                    'question' => $item['question'],
                    'answer' => $item['answer'],
                ]);
            }
        }
    }
}
