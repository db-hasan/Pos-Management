<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attributes;
use App\Models\AttributesValues;


class AttributesValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of attributes and their corresponding values
        $attributeValues = [
            'Brand' => ['Acer', 'Apple', 'HP', 'Dell', 'Asus'],
            'Model' => ['Inspiron', 'MacBook', 'Pavilion', 'ThinkPad', 'VivoBook'],
            'Type' => ['Laptop', 'Desktop', 'Tablet'],
            'Size' => ['13-inch', '15-inch', '17-inch'],
            'Color' => ['Black', 'Silver', 'Blue', 'White'],
            'Certification' => ['Energy Star', 'CE', 'RoHS'],
            'Others' => ['Extended Warranty', 'Free Shipping'],
        ];

        // Get all attributes from the database or create them if they don't exist
        foreach ($attributeValues as $attributeName => $values) {
            // Find or create the attribute by name
            $attribute = Attributes::firstOrCreate(['name' => $attributeName]);

            // Seed the attribute values
            foreach ($values as $value) {
                AttributesValues::create([
                    'attributes_id' => $attribute->id,
                    'name' => $value,
                    'status' => 1,
                ]);
            }
        }
    }
}
