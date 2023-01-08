<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertiesJson = Storage::get('json/properties.json');
        $properties = json_decode($propertiesJson);
        foreach ($properties as $property) {
            Property::updateOrCreate([
                'import' => 'fazWaz-'.$property->id
            ], [
                'title' => $property->title,
                'description' => $property->description,
                'for_sale' => $property->for_sale,
                'for_rent' => $property->for_rent,
                'sold' => $property->sold,
                'price' => $property->price,
                'currency' => $property->currency,
                'currency_symbol' => $property->currency_symbol,
                'property_type' => $property->property_type,
                'bedrooms' => $property->bedrooms,
                'bathrooms' => $property->bathrooms,
                'area' => $property->area,
                'area_type' => $property->area_type,
                'geo' => json_encode($property->geo),
                'photos' => json_encode($property->photos),
            ]);
        }
    }
}
