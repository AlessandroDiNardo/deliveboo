<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// imported Models
use App\Models\Restaurant;
use App\Models\Category;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // italiano, pizza, pasta 1
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 1;
            $r->name = 'Ristorante pizzeria da Luigi';
            $r->place = 'Via Prota, 71, 80058 Torre Annunziata, NA';
            $r->description = 'Piatti della tradizione napoletana dal 1926!';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-s/15/a8/7a/0a/interieur.jpg';
            $r->opening_time = '07:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(1);
            $r->categories()->attach(9);
            $r->categories()->attach(10);
            $r->categories()->attach(12);
        });

        // italiano, pasta, pesce, vegetariano 2
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 2;
            $r->name = 'La bella Italia';
            $r->place = 'Piazza del Duomo, 104, 20121 Milano, MI';
            $r->description = 'Piatti della tradizione italiata in chiave gourmet dal 1925!';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/1a/ec/5f/5a/uno-scorcio-della-sala.jpg';
            $r->opening_time = '07:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(1);
            $r->categories()->attach(13);
            $r->categories()->attach(10);
            $r->categories()->attach(11);
        });

        // italiano, pizza, pasta, pesce 3
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 3;
            $r->name = 'Trattoria vecchia Roma';
            $r->place = 'Piazza di Spagna, 23, 00187 Roma, RO';
            $r->description = 'Piatti della tradizione romana 1881!';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-o/1a/cf/ab/fe/img-20200205-190011-largejpg.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(1);
            $r->categories()->attach(8);
            $r->categories()->attach(10);
            $r->categories()->attach(12);
            $r->categories()->attach(13);
        });

        // americano, hamburger 1
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 4;
            $r->name = 'From Gino with Love';
            $r->place = 'Via Cividale, 113, 47921 Rimini, RI';
            $r->description = 'Best burger you ever have eaten';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/16/fc/d6/b0/la-rockstar-della-nostra.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(3);
            $r->categories()->attach(7);
        });

        // americano, dolce
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 5;
            $r->name = '1950 American Diner';
            $r->place = 'Via Casoria Nord 2B, 113, 53036 Poggibonsi, SI';
            $r->description = 'Best burger you ever have eaten';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-o/11/5a/b7/9a/diner-americano-in-stile.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(3);
            $r->categories()->attach(13);
        });

        // cinese 1
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 6;
            $r->name = 'Hang Zhou da Sonia';
            $r->place = 'Via Bixio, 65, 00187 Roma, RO';
            $r->description = 'Atmosfera unica e gusti orientali vi accompagneranno in questa esperienza unica.';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-o/12/21/10/a7/mu-dimsum-la-sala-principale.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(2);
        });

        // cinese, vegetariano 2
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 7;
            $r->name = 'Ristorante Cinese Orient Express            ';
            $r->place = 'Via Largo Europa 3, 31100 Treviso, TR';
            $r->description = 'Atmosfera unica e gusti orientali vi accompagneranno in questa esperienza unica.';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/1c/1f/08/10/orient-express.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(2);
            $r->categories()->attach(11);
        });

        // giapponese, vegetariano 1
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 8;
            $r->name = 'Origami - Ristorante Giapponese';
            $r->place = 'Viale Antonio Bandiera, 78, 84131 Salerno, SA';
            $r->description = 'Ristorante tipico giopponese con menù di pietanze secondo le tradizioni orientali, possibilità menù All you can eat.';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-o/0e/5c/5f/b6/ristorante-giapponese.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(4);
            $r->categories()->attach(11);
            $r->categories()->attach(13);
        });

        // giapponese 2
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 9;
            $r->name = 'Wasabi';
            $r->place = 'Corso Francesco Ferrucci, 72, 10138 Torino, TO';
            $r->description = 'Ristorante tipico giopponese con menù di pietanze secondo le tradizioni orientali, possibilità menù All you can eat.';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/1b/8c/0b/06/sala.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(4);
            $r->categories()->attach(11);
            $r->categories()->attach(12);
            $r->categories()->attach(13);
        });

        // indiano 1
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 10;
            $r->name = 'Ristorante Krishna 13';
            $r->place = 'Via Foscolo 13 Piazza Vittorio, 00185 Roma, RO';
            $r->description = 'Ristorante tipico indiano con menù di pietanze secondo le tradizioni.';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-s/02/cf/5a/e1/krishna-13.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(5);
            $r->categories()->attach(12);
        });

        // indiano 2
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 11;
            $r->name = 'Royal India';
            $r->place = 'Via Guelfa 90/R, 50129, Firenze, FI';
            $r->description = 'Ristorante tipico indiano con menù di pietanze secondo le tradizioni.';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/1c/23/38/d7/i-nostri-tavoli.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(5);
            $r->categories()->attach(12);
        });

        // messicano 1
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 12;
            $r->name = 'Habanero Genova';
            $r->place = 'Via Trento 79 75, 16145, Genova, GE';
            $r->description = 'Ristorante tipico messicano con menù di pietanze secondo la tradizione latina. Dal 1990!';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-o/11/10/12/e2/sala-principale.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(6);
            $r->categories()->attach(12);
        });

        // messicano 2
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 13;
            $r->name = 'La Posada Mexicana';
            $r->place = 'via Galliari 25, Tra piazza madama Cristina e via Ormea, 10100 Torino, To';
            $r->description = 'Ristorante tipico messicano con menù di pietanze secondo la tradizione latina.';
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-m/1280/1c/58/8f/29/interni.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(6);
            $r->categories()->attach(12);
        });

        // kebab 1
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 14;
            $r->name = "Mustafa's Gemuese Kebab";
            $r->place = 'Via Giuseppe Ungaretti, 32, 10138 Torino, TO';
            $r->description = "Real kebab's dishes";
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-o/04/4b/1d/de/kebab-sorrento.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '02:00:00';
            $r->save();
            $r->categories()->attach(7);
            $r->categories()->attach(12);
        });

        // kebab 2
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 15;
            $r->name = "Ali Baba & i 40 panini";
            $r->place = "Via Dell'Arco di Travertino, 27, 00178 Roma, RO";
            $r->description = "Miglior kebabbe de Roma";
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-o/05/fe/f0/a4/kebab-borgomanero-nuovo.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '03:00:00';
            $r->save();
            $r->categories()->attach(7);
        });

        // pasticceria
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 16;
            $r->name = "Pasticceria Migliavacca";
            $r->place = "Via Ajaccio ,13, 20133 Milano, MI";
            $r->description = "Proponiamo dolci della tradizione milanese e non.";
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-o/04/9e/79/4a/pasticceria-migliavacca.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '19:00:00';
            $r->save();
            $r->categories()->attach(12);
        });

        // pesce 1
        Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 17;
            $r->name = "The Seafood Bar";
            $r->place = "Via Lungomare dei cavalieri, 5, 84011 Amalfi, SA";
            $r->description = "Proponiamo pesce fresco ogni giorno. Dal 1926!";
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-o/16/45/39/59/new-interior-of-our-first.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(13);
        });

         // pesce 2
         Restaurant::factory()-> count(1) -> make() -> each(function($r) {
            $r->user_id = 18;
            $r->name = "Ristorante Ensama Pesce";
            $r->place = "Via Dondarini, 4/C, 40010 Sala Bolognese, BO";
            $r->description = "Proponiamo pesce fresco ogni giorno. Dal 1926!";
            $r->img = 'https://media-cdn.tripadvisor.com/media/photo-o/04/2e/92/39/ristorante-all-anguilla.jpg';
            $r->opening_time = '09:00:00';
            $r->closing_time = '24:00:00';
            $r->save();
            $r->categories()->attach(13);
        });
    }
}
