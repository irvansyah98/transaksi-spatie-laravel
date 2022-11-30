<?php

use Illuminate\Database\Seeder;
use App\OrderStatus;
use App\City;
use App\Merk;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data3 = [
            'Canon',
            'Epson',
        ];

        foreach($data3 as $item){
            $result = Merk::create([
                'name' => $item,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]);
        }

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'list admin']);
        Permission::create(['name' => 'create admin']);
        Permission::create(['name' => 'edit admin']);
        Permission::create(['name' => 'delete admin']);
        Permission::create(['name' => 'list guest']);
        Permission::create(['name' => 'create guest']);
        Permission::create(['name' => 'edit guest']);
        Permission::create(['name' => 'delete guest']);
        Permission::create(['name' => 'list order']);
        Permission::create(['name' => 'edit order']);
        Permission::create(['name' => 'delete order']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'guest']);
        $role1->givePermissionTo('dashboard');
        $role1->givePermissionTo('list order');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('dashboard');
        $role2->givePermissionTo('list admin');
        $role2->givePermissionTo('create admin');
        $role2->givePermissionTo('edit admin');
        $role2->givePermissionTo('delete admin');
        $role2->givePermissionTo('list guest');
        $role2->givePermissionTo('create guest');
        $role2->givePermissionTo('edit guest');
        $role2->givePermissionTo('delete guest');
        $role2->givePermissionTo('list order');
        $role2->givePermissionTo('edit order');
        $role2->givePermissionTo('delete order');

        // create demo users
        $user = \App\User::create([
            'fullname' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('123456'),
            'phone' => '123456789',
            'address' => 'ipsum',
            'role' => 'admin',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ]);
        $user->assignRole($role2);

        $user = \App\User::create([
            'fullname' => 'guest',
            'username' => 'guest',
            'email' => 'guest@gmail.com',
            'password' => \Hash::make('123456'),
            'phone' => '123456789',
            'address' => 'ipsum',
            'role' => 'guest',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ]);
        $user->assignRole($role1);

        $order = \App\Order::create([
            'code' => '1',
            'user_id' => '1',
            'type' => 'indoor',
            'merk_id' => 1,
            'description' => 'Coba',
            'price_total' => 100000,
            'status_id' => '1',
            'service_type' => 'pengecekan',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ]);

        $order = \App\Order::create([
            'code' => '2',
            'user_id' => '1',
            'type' => 'indoor',
            'merk_id' => 2,
            'description' => 'Coba',
            'price_total' => 200000,
            'status_id' => '1',
            'service_type' => 'pengecekan',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ]);
    }
}
