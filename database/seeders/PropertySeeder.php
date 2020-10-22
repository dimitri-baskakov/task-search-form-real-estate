<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class PropertySeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->delimiter = ',';
        $this->file = '/public/data/property-data.csv';
        $this->mapping = [
            'name',
            'price',
            'bedrooms',
            'bathrooms',
            'storeys',
            'garages'
        ];
        $this->tablename = 'properties';
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
