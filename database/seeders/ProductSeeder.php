<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// imported Models
use App\Models\Product;
use App\Models\Restaurant;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ristorante 1 pizza 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 1;
            $p -> name = 'Pizza Margherita';
            $p -> ingredients = 'pomodoro, mozzarella, basilico fresco, sale e olio';
            $p -> price = 5.00;
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-o/1d/a6/10/7e/20210818-131915-largejpg.jpg';
            $p -> save();
        });

        // ristorante 1 pizza 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 1;
            $p -> name = 'Pizza Marinara';
            $p -> ingredients = 'passata di pomodoro, origano, basilico fresco, spicchi aglio fresco, sale e olio';
            $p -> price = 5.00;
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-w/15/40/5b/76/photo1jpg.jpg';
            $p -> save();
        });

        // ristorante 1 pasta 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 1;
            $p -> name = 'Ragù alla Genovese';
            $p -> ingredients = 'pasta formato "ziti", cipolle dorate, carote, alloro, manzo, sedano, prezzemolo, vino binaco, sale e olio';
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2022/07/Ragu-genovese-720x960.jpg';
            $p -> save();
        });

        // ristorante 1 pasta 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 1;
            $p -> name = 'Gnocchi alla Sorrentina';
            $p -> ingredients = 'gnocchi di patate, fiordilatte, ricotta di bufala, pomodoro san marzano';
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2015/11/Gnocchi-alla-sorrentina-6.jpg';
            $p -> save();
        });

        // ristorante 1 dolce 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 1;
            $p -> name = 'Tiramisù';
            $p -> ingredients = 'mascarpone, savoiardi, cacao amaro, caffè';
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2022/11/Tiramisu-2-720x960.jpg';
            $p -> save();
        });

        // ristorante 1 dolce 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 1;
            $p -> name = 'Pastiera';
            $p -> ingredients = 'grano cotto, ricotta di pecora, cedro candito, arancia candita';
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2016/03/Pastiera.jpg';
            $p -> save();
        });


         // ristorante 2 pasta 1
         Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 2;
            $p -> name = 'Scialatielli vongole e limone';
            $p -> ingredients = 'pasta "scialatielli", vongole, limone';
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2021/07/Scialatielli-vongole-e-limone-960x1440.jpg';
            $p -> save();
        });

        // ristorante 2 pasta 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 2;
            $p -> name = 'Spaghetti con ragù di crostacei, bottarga e limone';
            $p -> ingredients = 'ragù di crostacei, bottarga, limone';
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2021/09/Spaghetti-con-ragu-di-crostacei-bottarga-e-limone-960x1440.jpg';
            $p -> save();
        });

        // ristorante 2 pesce 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 2;
            $p -> name = 'Involtini di pesce spada con pesto di pistacchi';
            $p -> ingredients = "pesce spada, pesto di pistacchi, pomodorini secchi sotto'olio";
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2019/07/Involtini-pesce-spada.jpg';
            $p -> save();
        });

         // ristorante 2 pesce 2
         Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 2;
            $p -> name = 'Spaghetti con ragù di crostacei, bottarga e limone';
            $p -> ingredients = 'ragù di crostacei, bottarga, limone';
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2021/09/Spaghetti-con-ragu-di-crostacei-bottarga-e-limone-960x1440.jpg';
            $p -> save();
        });


        // ristorante 3 pizza 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 3;
            $p -> name = 'Pizza Margherita';
            $p -> ingredients = 'pomodoro, mozzarella, basilico fresco, sale e olio';
            $p -> price = 5.00;
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-o/1d/a6/10/7e/20210818-131915-largejpg.jpg';
            $p -> save();
        });

        // ristorante 3 pizza 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 3;
            $p -> name = 'Pizza Marinara';
            $p -> ingredients = 'passata di pomodoro, origano, basilico fresco, spicchi aglio fresco, sale e olio';
            $p -> price = 5.00;
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-w/15/40/5b/76/photo1jpg.jpg';
            $p -> save();
        });

        // ristorante 3 pasta 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 3;
            $p -> name = 'Ragù alla Genovese';
            $p -> ingredients = 'pasta formato "ziti", cipolle dorate, carote, alloro, manzo, sedano, prezzemolo, vino binaco, sale e olio';
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2022/07/Ragu-genovese-720x960.jpg';
            $p -> save();
        });

        // ristorante 3 pasta 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 3;
            $p -> name = 'Spaghetti con ragù di crostacei, bottarga e limone';
            $p -> ingredients = 'ragù di crostacei, bottarga, limone';
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2021/09/Spaghetti-con-ragu-di-crostacei-bottarga-e-limone-960x1440.jpg';
            $p -> save();
        });

        // ristorante 3 pesce 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 3;
            $p -> name = 'Involtini di pesce spada con pesto di pistacchi';
            $p -> ingredients = "pesce spada, pesto di pistacchi, pomodorini secchi sotto'olio";
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2019/07/Involtini-pesce-spada.jpg';
            $p -> save();
        });

         // ristorante 3 pesce 2
         Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 3;
            $p -> name = 'Spaghetti con ragù di crostacei, bottarga e limone';
            $p -> ingredients = 'ragù di crostacei, bottarga, limone';
            $p -> img = 'https://www.soniaperonaci.it/wp-content/uploads/2021/09/Spaghetti-con-ragu-di-crostacei-bottarga-e-limone-960x1440.jpg';
            $p -> save();
        });

        // ristorante 4 hamburger 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 4;
            $p -> name = 'The Original ';
            $p -> ingredients = 'doppio hamburger 120g, cipolla caramellate, pomodoro, insalta iceberg, provola, patate, salse a scelta';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/1c/5b/e4/5a/bonelli-the-original.jpg';
            $p -> save();
        });

        // ristorante 4 hamburger 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 4;
            $p -> name = 'Il Morso ';
            $p -> ingredients = 'doppio hamburger 120g con cheddar, fette di bacon croccante, pomodoro, insalta iceberg, provola, salse a scelta';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/1c/5b/f2/eb/bacon-alarm-e-il-morso.jpg';
            $p -> save();
        });

        // ristorante 4 hamburger 3
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 4;
            $p -> name = 'Kraken';
            $p -> ingredients = 'cinque hamburger 120g con cheddar, fette di bacon croccante, salse a scelta';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/1c/74/4d/c4/kraken-e-considerato.jpg';
            $p -> save();
        });


        // ristorante 5 piatto 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 5;
            $p -> name = 'BBQ beans';
            $p -> ingredients = 'fagioli, pancetta, cipolla, ketchup, mostarda, salsa bbq, zucchero di canna, concentrato di pomodoro';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/23/5c/b9/6e/bbq-beans.jpg';
            $p -> save();
        });

        // ristorante 5 piatto 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 5;
            $p -> name = 'Tomahawk';
            $p -> ingredients = 'manzo, burro, spezie varie';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-p/23/5c/b8/d0/tomahawk.jpg';
            $p -> save();
        });

        // ristorante 5 dolce 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 5;
            $p -> name = 'Brownies';
            $p -> ingredients = 'brownies al cioccolato, latte';
            $p -> img = 'https://images.dissapore.com/wp-content/uploads/2020/03/brownies-800x531.jpg';
            $p -> save();
        });

        // ristorante 5 dolce 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 5;
            $p -> name = 'Donuts';
            $p -> ingredients = 'cioccolato, fragola, caramello, cioccolato bianco';
            $p -> img = 'https://images.dissapore.com/wp-content/uploads/2020/03/donuts-800x531.jpg';
            $p -> save();
        });

        
        // ristorante 6 piatto 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 6;
            $p -> name = 'Ravioli di carne';
            $p -> ingredients = 'carne bovina, carne suino, carota, cipolla, sedano ';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-o/05/4d/df/51/lin.jpg';
            $p -> save();
        });

        // ristorante 6 piatto 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 6;
            $p -> name = 'Gnocchi di riso saltati';
            $p -> ingredients = 'gnocchi di riso, cipolle, carote, sedano, carne di manzo ';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-o/0e/f7/44/a3/gnocchi-di-riso-saltati.jpg';
            $p -> save();
        });

        // ristorante 7 piatto 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 7;
            $p -> name = 'Ravioli di carne';
            $p -> ingredients = 'carne bovina, carne suino, carota, cipolla, sedano ';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-o/05/4d/df/51/lin.jpg';
            $p -> save();
        });

        // ristorante 7 piatto 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 7;
            $p -> name = 'Manzo saltato in padella';
            $p -> ingredients = 'carne di manzo';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-o/05/4d/df/5b/lin.jpg';
            $p -> save();
        });

        // ristorante 7 piatto 3
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 7;
            $p -> name = 'Gamberi alla griglia';
            $p -> ingredients = 'gamberi';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-o/05/4d/df/3b/lin.jpg';
            $p -> save();
        });

        // ristorante 8 piatto 1
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 8;
            $p -> name = 'Sushi misto';
            $p -> ingredients = '20 tipi diversi di portate a scelta dello chef';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-o/19/e1/77/b5/hachi-experience.jpg';
            $p -> save();
        });

         // ristorante 8 piatto 2
         Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 8;
            $p -> name = 'nigiri di salmone';
            $p -> ingredients = 'salmone';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/19/e7/6e/ea/hachi-sensation.jpg';
            $p -> save();
        });

         // ristorante 8 piatto 3
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 8;
            $p -> name = 'Roll';
            $p -> ingredients = 'tonno, uovo, carne, cime di rapa, topping dy mayo e uova di psece';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-w/19/e1/77/b7/hachi-experience.jpg';
            $p -> save();
        });

         // ristorante 9 piatto 1
         Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 9;
            $p -> name = 'nigiri di salmone';
            $p -> ingredients = 'salmone';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/19/e7/6e/ea/hachi-sensation.jpg';
            $p -> save();
        });

         // ristorante 9 piatto 2
        Product::factory()-> count(1) -> make() -> each(function($p){
            $p->restaurant_id = 9;
            $p -> name = 'Ramen';
            $p -> ingredients = 'carne di manzo, 2 uova sode, brodo vegetale, cipollotto,zenzero, alga nori, aglio';
            $p -> img = 'https://media-cdn.tripadvisor.com/media/photo-w/12/60/5b/7f/photo0jpg.jpg';
            $p -> save();
        });
    }
}
