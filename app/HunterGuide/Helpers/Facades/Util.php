<?php
/**
 * Created by PhpStorm.
 * User: nassar
 * Date: 24/08/18
 * Time: 08:24
 */

namespace App\HunterGuide\Helpers\Facades;

use Illuminate\Support\Facades\Facade;
/**
 * @method static apiResponse($status = true, $message = "", $dados = null, $error = null, $code = 200)
 * @method static somenteNumeros($value)
 * @method static cpf($value)
 *
 * @see \App\HunterGuide\Helpers\Util
 */
class Util extends Facade {
    protected static function getFacadeAccessor() { return 'Util'; }

}