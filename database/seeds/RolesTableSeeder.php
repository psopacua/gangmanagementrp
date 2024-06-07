<?php
/**
 * Bekende Vloggende Nederlanders
 */

use App\Models\Role;
use Illuminate\Database\Seeder;

/**
 * Class RolesTableSeeder
 */
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['slug' => 'admin',     'name' => 'Administrator'],
            ['slug' => 'moderator', 'name' => 'Moderator'],
            ['slug' => 'user',      'name' => 'User'],
        ];

        foreach ($roles as $roleData) {
            $role = new Role();

            $role->slug = $roleData['slug'];
            $role->name = $roleData['name'];

            $role->save();
        }
    }
}
