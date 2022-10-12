<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedUsers();
        User::factory(30)->fighter()->create();
        User::factory(10)->buyer()->create();

//        User::factory(20)->seedFighter()->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    public function seedUsers()
    {
        $users = [
            [
                'email' => 'admin@hardtest.ru',
                'role' => 'admin',
                'name' => 'admin',
                'password' => '$2y$10$kw2JL2xctGy31jSXSdAu2eXUoA7d/eek6dXQQCYXK.XQxvILuK56q',
            ],
            [
                'email' => 'producer@hardtest.ru',
                'role' => 'producer',
                'name' => 'producer',
                'password' => '$2y$10$GioenRcEBlV6aHWJcQ1Rw..ske65YoqJaiSXzHNr8m6VKOxJA01Uy',
            ],
            [
                'email' => 'support@hardtest.ru',
                'role' => 'support',
                'name' => 'support',
                'password' => '$2y$10$6bj1GWE19GxjkO2cERADG.Qu1OTuhgkVsuduDvr2jP/YFCV2BV19y',
            ],
            [
                'email' => 'fighter@hardtest.ru',
                'role' => 'fighter',
                'name' => 'fighter',
                'password' => '$2y$10$3NEIJjtaA1XBzgPstiYWjOKVs7IIii.qHgXpsOYIm0sMoE.fqeIZy',
            ],
            [
                'email' => 'buyer@hardtest.ru',
                'role' => 'buyer',
                'name' => 'buyer',
                'password' => '$2y$10$HzibhR7UhPPMTzsM.NXW6OqIwJnThWKzuX.0osXzirLnmefiKtWjS',
            ],

        ];
        foreach ($users as $item) {
            $u = User::query()->where('email', '=', $item['email'])->first();
            if ($u) {
                continue;
            }
            $user = new User();
            $user->email = $item['email'];
            $user->role = $item['role'];
            $user->email_verified_at = now();
            $user->name = $item['name'];
            $user->password = $item['password'];
            $user->save();
        }
    }
}
