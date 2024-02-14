<?php

// NoteFactory.php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\Image as ImageProvider;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'company_name' => $this->faker->company,
            'product_name' => $this->faker->word,
            'typeof_frete' => $this->faker->word,
            'address_city' => $this->faker->city,
            'company_email' => $this->faker->email,
            'postal_code' => $this->faker->postcode,
            'company_state' => $this->faker->randomElement(['Rio Grande do Sul', 'Santa Catarina', 'Paraná']),
            'company_phone' => $this->faker->phoneNumber,
            'delivery_address' => $this->faker->streetAddress,
            'price' => $this->faker->numberBetween(0, 100),
            'price_perunit' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->paragraph,
            'residue_type' => $this->faker->randomElement(['Sólido', 'Líquido', 'Semisólido']),
            'product_quantity' => $this->faker->randomElement(['Kilos', 'Gramas', 'Litro', 'Militros']),
            'paid' => $this->faker->randomElement(['paid', 'unpaid']),
            'image' => $this->faker->imageUrl(),
            'accept_terms' => $this->faker->boolean,
            'is_published' => $this->faker->boolean,
            'heart_count' => $this->faker->numberBetween(0, 100),
        ];
    }
}


