<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Root categories and their subcategories.
     *
     * @var array<string, array<int, string>>
     */
    protected array $categories = [
        'Tecnologia'  => ['Programação', 'Inteligência Artificial', 'Segurança', 'Hardware'],
        'Negócios'    => ['Empreendedorismo', 'Marketing Digital', 'Finanças'],
        'Estilo de Vida' => ['Saúde', 'Viagens', 'Culinária'],
        'Educação'    => ['Cursos', 'Carreira'],
        'Notícias'    => [],
        'Entretenimento' => [],
    ];

    /**
     * Run the database seeds.
     *
     * Safe to run more than once: existing categories are matched by name.
     */
    public function run(): void
    {
        foreach ($this->categories as $name => $children) {
            $parent = Category::firstOrCreate(
                ['name' => $name, 'parent_id' => null],
                [
                    'description' => "Conteúdos sobre {$name}.",
                    'is_active'   => true,
                    'views'       => fake()->numberBetween(100, 5000),
                ],
            );

            foreach ($children as $childName) {
                $parent->children()->firstOrCreate(
                    ['name' => $childName],
                    [
                        'description' => "Conteúdos sobre {$childName}.",
                        'is_active'   => true,
                        'views'       => fake()->numberBetween(0, 2000),
                    ],
                );
            }
        }

        // Extra random data to exercise pagination, filters and sorting.
        Category::factory()
            ->count(10)
            ->create()
            ->each(function (Category $parent): void {
                Category::factory()
                    ->count(fake()->numberBetween(0, 3))
                    ->childOf($parent)
                    ->create();
            });
    }

    
}
