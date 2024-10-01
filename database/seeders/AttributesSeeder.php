<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attributes;
use App\Models\Varision;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     private $data = [
        'Brand' => ['Acer', 'Apple', 'HP', 'Dell', 'Asus'],
        'Model' => ['Inspiron', 'MacBook', 'Pavilion', 'ThinkPad', 'VivoBook'],
        'Type' => ['Laptop', 'Desktop', 'Tablet'],
        'Size' => ['13-inch', '15-inch', '17-inch'],
        'Color' => ['Black', 'Silver', 'Blue', 'White'],
        'Certification' => ['Energy Star', 'CE', 'RoHS'],
        'Others' => ['Extended Warranty', 'Free Shipping'],
    ];

    public function run(): void
    {
         foreach ($this->data as $attributeName => $variations) {
            // Create the attribute in the Attributes table
            $attribute = Attributes::create(['name' => $attributeName]);

            // Loop through each variation and create them in the Varision table
            foreach ($variations as $variationName) {
                Varision::create([
                    'attributes_id' => $attribute->id,  
                    'name' => $variationName,
                ]);
            }
        }
    }
}
