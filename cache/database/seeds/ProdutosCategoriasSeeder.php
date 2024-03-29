<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use App\Produto;
use App\ProdutoCategoria;

use Faker\Factory as Faker;

class ProdutosCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $prods = Produto::all();
        $cats = Categoria::all()->pluck('id')->toArray();

        foreach($prods as $p) {
            $elementos = rand(2,6);
            for($i = 0; $i < $elementos; $i++) {
                do{
                    $cat_id = $faker->randomElement($cats);
                }
                while (
                    ProdutoCategoria::where('produto_id', $p->id)
                        ->where('categoria_id', $cat_id)->exists()
                );

                ProdutoCategoria::create([
                    'produto_id' => $p->id,
                    'categoria_id' => $cat_id
                ]);
            }
        }
    }
}
