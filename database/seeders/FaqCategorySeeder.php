<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqCategory;

class FaqCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Algemeen motorrijden',
            'Motorrijden in Gent',
            'Wetgeving & regels',
            'Parkeren & mobiliteit',
            'Veiligheid & ongevallen',
            'Groepsritten & community',
            'Motoren & onderhoud',
            'Motorkleding & bescherming',
            'Elektrisch & duurzaam rijden',
            'Beginners & rijopleiding',
        ];

        foreach ($categories as $category) {
            FaqCategory::create([
                'name' => $category,
            ]);
        }
    }
}
