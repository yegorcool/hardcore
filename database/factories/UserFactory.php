<?php

namespace Database\Factories;

use App\Role\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $role = array_keys(UserRole::getRoleList());

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'role' => $this->faker->randomElement($role),
            'city' => $this->faker->city(),
            'description' => $this->faker->realText(200),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function fighter()
    {
        $description = [
            'Современные бойцы – универсалы, обладающие достаточными навыками борьбы и хорошо поставленными ударами рук и ног, умеющие вести бой как в стойке, так и в партере. Хотя среди них можно все же выделить «ударников» (тяготеющих к технике кикбоксинга и старающихся, по возможности, избегать схватки лежа) и бойцов, которые, наоборот, предпочитают ту или иную борцовскую технику. ',
            'Культивируемая в разных странах смешанная техника имеет и определенные национальные особенности. ',
            'Единых правил для всех версий абсолютных поединков не существует и никогда не существовало. По сути, они сводились к одному основополагающему принципу: минимум защитной экипировки и ограничений на используемую технику, максимум «реализма» поединков и свободы действий бойцов.',
            'Единоборства с минимумом ограничений на допустимую технику были известны еще в древней Греции. В 648 до н.э. в программу Олимпийских игр включили панкратион – победа в этом виде программы считалась особенно достойной.',
        ];
        return $this->state(fn(array $attributes) => [
            'role' => 'fighter',
            'description' => $this->faker->randomElement($description),
            'height' => random_int(160, 210),
            'weight' => random_int(55, 125),
            'city' => $this->faker->city(),
        ]);
    }

    public function buyer()
    {
        return $this->state(fn(array $attributes) => [
            'role' => 'buyer',
        ]);
    }
}
