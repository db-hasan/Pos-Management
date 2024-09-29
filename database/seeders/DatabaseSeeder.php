<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Attributes;
use App\Models\AttributesValues;
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
    
    private $attributes = [
        'Brand', 'Model', 'Type', 'Size', 'Color',  'Certification', 'Others',
    ];

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

        foreach ($this->attributes as $attribute) {
            Attributes::create(['name' => $attribute]);
        };

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

        $this->call(AttributesValuesSeeder::class);

    }
}
