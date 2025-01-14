<?php

namespace Database\Seeders;

use App\Models\Town;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class TownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your CSV file
        $csvFile = public_path('total_towns.csv'); // Adjust the path as needed

        // Read the CSV file
        $csv = Reader::createFromPath($csvFile, 'r');
        $csv->setHeaderOffset(0); // Use first row as header

        // Iterate through the records
        foreach ($csv->getRecords() as $record) {
            // Extract town and county names
            $townName = $record['town_name'];
            $countyName = $record['county_name'];

            // Insert into the towns table
            Town::firstOrCreate([
                'name' => $townName,
                'county' => $countyName,
            ]);

        }

    }
}
