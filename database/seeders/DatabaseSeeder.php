<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\CostType;
use App\Models\Warehouse;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    private $permissions = [
        'user-index', 'user-create', 'user-edit',
        'role-index', 'role-create', 'role-edit',
        'dashboard-index',
        'profle-update',
    ];

    private $warehouses = [
        'Warehouse 1', 'Warehouse 2', 'Warehouse 3', 'Warehouse 4', 'Others',
    ];


    private $categories = [
        'Category 1', 'Category 2', 'Category 3'
    ];
    // private $brands = [
    //     'Studds', 'Vega', 'LS2', 'AXOR', 'MT', 'Steelbird', 'SKT', 'IBK', 'Others',
    // ];

    // private $modeles = [
    //     'THUNDER', 'BOLT', 'Others',
    // ];

        // private $type = [
    //     'Full Face', 'Half Shell', 'Modular', 'Off Road', 'Open Face', 'Cap', 'Dual Sport',
    // ];

    // private $sizes = [
    //     'XS', 'S', 'M', 'L', 'XL', 'XXL', 'Others',
    // ];
    // private $colors = [
    //     'Blue', 'Red', 'Black', 'White', 'Pink', 'Grey', 'Yellow', 'Mix Color','Various Print', 'Others',
    // ];

    // private $certifications = [
    //     'BSTI', 'ISI', 'DOT', 'ECE',
    // ];

    private $costtypes = [
        'Labour', 'Storage', 'Rent', 'Utilities', 'Employee', 'Others',
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        };

        foreach ($this->warehouses as $warehouse) {
            Warehouse::create(['name' => $warehouse]);
        };

        foreach ($this->categories as $category) {
            Category::create(['name' => $category]);
        };
        // foreach ($this->brands as $brand) {
        //     Brand::create(['name' => $brand]);
        // };
        // foreach ($this->sizes as $size) {
        //     Size::create(['name' => $size]);
        // };
        
        // foreach ($this->colors as $color) {
        //     Color::create(['name' => $color]);
        // };
        // foreach ($this->certifications as $certification) {
        //     Certification::create(['name' => $certification]);
        // };

        foreach ($this->costtypes as $costtype) {
            CostType::create(['name' => $costtype]);
        };

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
            'status' => "1",
        ]);

        $role = Role::create(['name' => 'superadmin']);
        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);
        $user->syncRoles([$role->id]);

    }
}
