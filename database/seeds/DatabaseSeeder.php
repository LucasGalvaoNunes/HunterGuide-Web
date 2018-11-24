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

        $user = DB::table('users')->insertGetId([
            'name' => "Lucas",
            'lastName' => "Galvao",
            'aboutMe' => "Jogados de PC",
            'userName' => "galvao",
            'password' => '$2y$10$84M1cBrCMtQn2diWA8.KFu41nzi/gFZbwKEk7waGGo9SY8Gtv0K36',
        ]);
        $ps1 = DB::table('consoles')->insertGetId([
            'name' => "Playstation 1",
            'pictureLink' => asset('detonados/psone.png')
        ]);

        $cat = DB::table('categorys')->insertGetId([
            'name' => "Aventura"
        ]);


        $homeAranha = DB::table('games')->insertGetId([
            'name' => "Spider Man",
            'pictureLink' => asset('detonados/spiderman.png')
        ]);
        DB::table('games_categorys')->insert([
            'fkGames' => $homeAranha,
            'fkCategorys' => $cat
        ]);
        DB::table('games_consoles')->insert([
            'fkGames' => $homeAranha,
            'fkConsoles' => $ps1
        ]);

        $guiaHomeAranha_01 = DB::table('guides')->insertGetId([
            'fkGames' => $homeAranha,
            'fkUsers' => $user,
            'visualizations' => 0,
            'title' => 'Hostage Situation',
            'text' => '<p style="text-align: center;"><span style="font-weight: 400;"><img src="https://i.ytimg.com/vi/NupijPB6LOQ/hqdefault.jpg" alt="Spider" width="480" height="360" /></span></p> <p style="text-align: justify;"><span style="font-weight: 400;">Dentro do banco voc&ecirc; ter&aacute; de salvar os ref&eacute;ns. seja r&aacute;pido e derrube os inimigos antes que eles tenham a chance de mat&aacute;-lo. siga at&eacute; o local onde h&aacute; uma grade ca&iacute;da no ch&atilde;o, fique sobre ela e aperte r1 para subir e passar por um duto de ar, que o levar&aacute; at&eacute; outra sala. depois de detonar os inimigos desta sala, v&aacute; at&eacute; os pain&eacute;is e aperte os bot&otilde;es na seguinte sequ&ecirc;ncia: 1 2,3. na pr&oacute;xima sala tome muito cuidado e tente chegar sorrateiramente at&eacute; os inimigos para que eles n&atilde;o matem os ref&eacute;ns. quando voc&ecirc; chegar &agrave; sala do cofre, vai encontrar dois bot&otilde;es. aperte os dois. um deles abrir&aacute; uma porta. siga por ela e salve os ref&eacute;ns. cuidado, uma bomba ser&aacute; acionada! voc&ecirc; dever&aacute; det&ecirc;-la: pegue-a, jogue-a dentro do cofre, e feche a porta.</span></p>'
        ]);
        $guiaHomeAranha_02 = DB::table('guides')->insertGetId([
            'fkGames' => $homeAranha,
            'fkUsers' => $user,
            'visualizations' => 0,
            'title' => 'Race To The Bugle',
            'text' => '<p style="text-align: center;"><img src="https://i.ytimg.com/vi/b4hZ6JrpJqo/maxresdefault.jpg" alt="" width="480" height="291" /></p> <p><span style="font-weight: 400;">Agora &eacute; s&oacute; seguir sua b&uacute;ssola e n&atilde;o perder tempo. Chegando ao local indicado voc&ecirc; ter&aacute; de enfrentar o escorpi&atilde;o. Lance teias nele e aplique uma seq&uuml;&ecirc;ncia de golpes. Logo ap&oacute;s o terceiro golpe saia de perto dele e repita a opera&ccedil;&atilde;o at&eacute; salvar o jj.</span></p>'
        ]);
        $guiaHomeAranha_03 = DB::table('guides')->insertGetId([
            'fkGames' => $homeAranha,
            'fkUsers' => $user,
            'visualizations' => 0,
            'title' => 'Police Chopper Chase',
            'text' => '<p style="text-align: center;"><span style="font-weight: 400;"><img src="https://i.ytimg.com/vi/TOzUEGnohZ0/maxresdefault.jpg" alt="" width="434" height="244" /></span></p> <p style="text-align: justify;"><span style="font-weight: 400;">Mais uma vez siga a b&uacute;ssola e desvie das miras dos helic&oacute;pteros. quando voc&ecirc; estiver subindo os pr&eacute;dios evite as partes de madeira e seja r&aacute;pido. depois de muito fugir e escalar, voc&ecirc; estar&aacute; livre da pol&iacute;cia.</span></p>'
        ]);
        $guiaHomeAranha_04 = DB::table('guides')->insertGetId([
            'fkGames' => $homeAranha,
            'fkUsers' => $user,
            'visualizations' => 0,
            'title' => 'Spidey Vs Rhino',
            'text' => '<p>&nbsp;</p> <p style="text-align: center;"><span style="font-weight: 400;"><img src="https://i.ytimg.com/vi/BaJxv-V4Ios/hqdefault.jpg" alt="" width="375" height="281" /></span></p> <p><span style="font-weight: 400;">Para vencer rhino com facilidade o esquema &eacute; sempre fugir de seus ataques. quando rhino golpear com o chifre tente direcion&aacute;-lo para os barris. eles ficam nos cantos da tela.</span></p>'
        ]);
        $guiaHomeAranha_05 = DB::table('guides')->insertGetId([
            'fkGames' => $homeAranha,
            'fkUsers' => $user,
            'visualizations' => 0,
            'title' => 'Catch Venom',
            'text' => '<p style="text-align: center;"><span style="font-weight: 400;"><img src="https://i.ytimg.com/vi/e-vdXeoG22w/hqdefault.jpg" alt="" width="443" height="324" /></span></p> <p><span style="font-weight: 400;">Agora voc&ecirc; ir&aacute; disputar uma pequena corridinha contra o nosso amigo venom. tente sempre cortar caminho pelos pr&eacute;dios e seja o mais pr&aacute;tico poss&iacute;vel.</span></p>'
        ]);
        $guiaHomeAranha_06 = DB::table('guides')->insertGetId([
            'fkGames' => $homeAranha,
            'fkUsers' => $user,
            'visualizations' => 0,
            'title' => 'Spider Vs Venom',
            'text' => '<p style="text-align: center;"><img src="https://i.ytimg.com/vi/UZY5YFh1y9E/hqdefault.jpg" alt="" width="409" height="307" /></p> <p style="text-align: justify;"><span style="font-weight: 400;">Contra venom, fa&ccedil;a o seguinte: quando ele chegar perto de voc&ecirc; pule reto para cima e aperte o soco. isso jogar&aacute; venom para longe de voc&ecirc; por um tempo. antes de ele chegar pertinho de voc&ecirc; novamente, pule reto para cima e ataque com o soco. repita at&eacute; derrot&aacute;-lo.</span></p> <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p>'
        ]);

        $stepHomeAranha_HISTORIA = DB::table('steps')->insertGetId([
            'name' => 'Modo História',
            'pictureLink' => asset('detonados/spidermanStep.jpg')
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'fkGuides' => $guiaHomeAranha_01
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'fkGuides' => $guiaHomeAranha_02
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'fkGuides' => $guiaHomeAranha_03
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'fkGuides' => $guiaHomeAranha_04
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'fkGuides' => $guiaHomeAranha_05
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'fkGuides' => $guiaHomeAranha_06
        ]);

        $stepHomeAranha_01 = DB::table('steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'name' => 'Hostage Situation',
            'pictureLink' => asset('detonados/step01.jpg')
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_01,
            'fkGuides' => $guiaHomeAranha_01
        ]);
        $stepHomeAranha_02 = DB::table('steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'name' => 'Race To The Bugle',
            'pictureLink' => asset('detonados/step02.jpeg')
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_02,
            'fkGuides' => $guiaHomeAranha_02
        ]);
        $stepHomeAranha_03 = DB::table('steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'name' => 'Police Chopper Chase',
            'pictureLink' => asset('detonados/step03.jpg')
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_03,
            'fkGuides' => $guiaHomeAranha_03
        ]);
        $stepHomeAranha_04 = DB::table('steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'name' => 'Spidey Vs Rhino',
            'pictureLink' => asset('detonados/step04.jpeg')
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_04,
            'fkGuides' => $guiaHomeAranha_04
        ]);
        $stepHomeAranha_05 = DB::table('steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'name' => 'Catch Venom',
            'pictureLink' => asset('detonados/step05.jpg')
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_05,
            'fkGuides' => $guiaHomeAranha_05
        ]);
        $stepHomeAranha_06 = DB::table('steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_HISTORIA,
            'name' => 'Spider Vs Venom',
            'pictureLink' => asset('detonados/step6.jpeg')
        ]);
        DB::table('guides_steps')->insertGetId([
            'fkSteps' => $stepHomeAranha_06,
            'fkGuides' => $guiaHomeAranha_06
        ]);


    }
}
