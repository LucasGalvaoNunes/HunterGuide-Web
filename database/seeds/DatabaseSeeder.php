<?php

use Illuminate\Database\Seeder;
use App\HunterGuide\Games\Games;
use App\HunterGuide\Guides\Guides;
use App\HunterGuide\Categorys\Categorys;
use App\HunterGuide\Consoles\Consoles;
use Illuminate\Support\Facades\DB;
use App\HunterGuide\Users\Users;
use App\HunterGuide\Steps\Steps;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create('pt_BR');

        DB::transaction(function () use ($faker){
            $games = [
                'Grand Theft Auto',
                'God of War II',
                'Final Fantasy XIV: A Realm Reborn',
                'Titanfall 2',
                'Dirt 3',
                'Farming Simulator 17',
                'The Legend of Zelda',
                'Super Smash Bros',
                'Eternal Darkness: Sanitys Requiem',
            ];

            $categorys = [
                'Ação',
                'Aventura',
                'MMORPG',
                'FPS',
                'Corrida',
                'Simulação',
                'RPG',
                'Plataforma',
                'Horror',
            ];

            $consoles = [
                'Playstation 1',
                'Playstation 2',
                'Playstation 3',
                'Playstation 4',
                'PC',
                'Xbox One',
                'Nintendo Switch',
                'Nintendo 3DS',
                'Game Cube',
            ];


            for($i = 0; $i < count($games); $i++){
                $idGame = DB::table('games')->insertGetId([
                    'name' => $games[$i],
                    'pictureLink' => $faker->imageUrl(200,300)
                ]);
                $idCategory = DB::table('categorys')->insertGetId([
                    'name' => $categorys[$i],
                ]);
                $idConsole = DB::table('consoles')->insertGetId([
                    'name' => $consoles[$i],
                    'pictureLink' => $faker->imageUrl(200,300)
                ]);

                DB::table('games_categorys')->insertGetId([
                    'fkGames' => $idGame,
                    'fkCategorys' => $idCategory
                ]);
                DB::table('games_consoles')->insertGetId([
                    'fkGames' => $idGame,
                    'fkConsoles' => $idConsole
                ]);

                $user = DB::table('users')->insertGetId([
                    'name' => $faker->name,
                    'lastName' => $faker->lastName,
                    'aboutMe' => $faker->text(30),
                    'userName' => $faker->userName,
                    'password' => '$2y$10$84M1cBrCMtQn2diWA8.KFu41nzi/gFZbwKEk7waGGo9SY8Gtv0K36',
                ]);


                $guide = DB::table('guides')->insertGetId([
                    'fkGames' => $idGame,
                    'fkUsers' => $user,
                    'visualizations' => 0,
                    'title' => 'Como pegar o trofeu do game ' . $games[$i],
                    'text' => $faker->realText(200)
                ]);

                $stepOne = DB::table('steps')->insertGetId([
                    'name' => 'Trofeus do game ' . $games[$i],
                    'pictureLink' => $faker->imageUrl(200,300)
                ]);
                $stepTwo = DB::table('steps')->insertGetId([
                    'fkSteps' => $stepOne,
                    'name' => 'O Primeiro trofeu do game ' . $games[$i],
                    'pictureLink' => $faker->imageUrl(200,300)
                ]);

                DB::table('guides_steps')->insertGetId([
                    'fkSteps' => $stepOne,
                    'fkGuides' => $guide
                ]);
                DB::table('guides_steps')->insertGetId([
                    'fkSteps' => $stepTwo,
                    'fkGuides' => $guide
                ]);


            }


        });
    }
}
