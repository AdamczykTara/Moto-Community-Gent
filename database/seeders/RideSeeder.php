<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ride;
use App\Models\User;

class RideSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return;
        }

        $rides = [
            [
                'title' => 'Schelderit bij Zonsondergang',
                'description' => 'Een rustige avondrit langs de Schelde, ideaal na het werk. Vlotte wegen, weinig verkeer en prachtig licht bij zonsondergang.',
                'photo' => 'rides/schelde-zonsondergang.jpg',
            ],
            [
                'title' => 'Leiestreek Relax Ride',
                'description' => 'Ontspannende rit door de Leiestreek met focus op bochten en open landschappen. Perfect voor een zondag zonder tijdsdruk.',
                'photo' => 'rides/leiestreek-relax.jpg',
            ],
            [
                'title' => 'Kasseien & Karakter',
                'description' => 'Een korte maar uitdagende rit langs typische Vlaamse kasseien. Niet snel, wel technisch en karaktervol.',
                'photo' => 'rides/kasseien-karakter.jpg',
            ],
            [
                'title' => 'Van Gent naar de Vlaamse Ardennen',
                'description' => 'Een langere rit richting heuvelachtig terrein met meer bochten en hoogteverschillen. Favoriet bij sportieve rijders.',
                'photo' => 'rides/vlaamse-ardennen.jpg',
            ],
            [
                'title' => 'Ochtendrit vóór de Spits',
                'description' => 'Vroege rit rond Gent nog vóór het verkeer losbarst. Ideaal voor wie houdt van lege wegen en frisse lucht.',
                'photo' => 'rides/ochtendmist.jpg',
            ],
            [
                'title' => 'Havengebied Exploratie',
                'description' => 'Industriële sfeer, brede wegen en verrassend weinig verkeer. Een totaal andere kant van Gent.',
                'photo' => 'rides/havengebied.jpg',
            ],
            [
                'title' => 'Koffiestop Ride',
                'description' => 'Rustige rit met een geplande koffiepauze onderweg. Minder kilometers, meer genieten.',
                'photo' => 'rides/koffiestop.jpg',
            ],
            [
                'title' => 'Avondlicht langs het Water',
                'description' => 'Een korte avondrit met focus op ontspanning en sfeer. Perfect om het hoofd leeg te maken.',
                'photo' => 'rides/avondlicht-water.jpg',
            ],
            [
                'title' => 'Beginnersvriendelijke Rondrit',
                'description' => 'Vlot parcours zonder moeilijke stukken, speciaal gekozen door en voor beginnende motards.',
                'photo' => 'rides/beginners.jpg',
            ],
            [
                'title' => 'Gent–Zelzate–Terug',
                'description' => 'Toegankelijke rit richting het noorden met lange rechte stukken en open zicht.',
                'photo' => 'rides/gent-zelzate.jpg',
            ],
            [
                'title' => 'Bochtenjacht in Oost-Vlaanderen',
                'description' => 'Route met extra focus op bochten en rijplezier, zonder overdreven tempo.',
                'photo' => 'rides/bochtenjacht.jpg',
            ],
            [
                'title' => 'Regenproof Ride',
                'description' => 'Rit die ook bij nat weer aangenaam blijft, met goede asfaltwegen en weinig glibberige zones.',
                'photo' => 'rides/regenproof.jpg',
            ],
            [
                'title' => 'Zondagse Solo Ride',
                'description' => 'Een rit die vaak solo gereden wordt, om even te ontsnappen aan de drukte.',
                'photo' => 'rides/solo.jpg',
            ],
            [
                'title' => 'Groepsrit voor Alle Types',
                'description' => 'Route die geschikt is voor naked, touring en sportmotoren. Samen rijden staat centraal.',
                'photo' => 'rides/groepsrit.jpg',
            ],
            [
                'title' => 'Groene Gordel van Gent',
                'description' => 'Rit langs groene zones rond de stad, ideaal voor wie natuur en rust zoekt.',
                'photo' => 'rides/groene-gordel.jpg',
            ],
            [
                'title' => 'After-Work Express',
                'description' => 'Snelle, korte rit van ongeveer een uur. Perfect om de werkdag af te sluiten.',
                'photo' => 'rides/after-work.jpg',
            ],
            [
                'title' => 'Fotogenieke Stopplaatsen Ride',
                'description' => 'Route met meerdere stops op mooie locaties, ideaal voor wie graag foto’s maakt.',
                'photo' => 'rides/fotogeniek.jpg',
            ],
            [
                'title' => 'Low-Traffic Weekend Ride',
                'description' => 'Speciaal gepland op momenten met weinig verkeer. Rust en flow staan centraal.',
                'photo' => 'rides/low-traffic.jpg',
            ],
            [
                'title' => 'Stad naar Platteland',
                'description' => 'Start in Gent, eindigt diep in het platteland. Het contrast maakt deze rit uniek.',
                'photo' => 'rides/stad-platteland.jpg',
            ],
            [
                'title' => 'Community Favoriet',
                'description' => 'Een rit die meerdere keren werd gedeeld en aangepast door communityleden. Collectief samengesteld.',
                'photo' => 'rides/community.jpg',
            ],
        ];

        foreach ($rides as $ride) {
            Ride::query()->create([
                'user_id' => $users->random()->id,
                'title' => $ride['title'],
                'description' => $ride['description'],
                'photo' => $ride['photo'],
            ]);
        }
    }
}
