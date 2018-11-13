<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 29/09/18
 * Time: 16:28
 */

namespace App\HunterGuide\Helpers;


use App\HunterGuide\Helpers\Enum\EnumResponse;
use Illuminate\Support\Facades\Response;
use phpDocumentor\Reflection\Types\Boolean;


class Util
{

    /**
     * @param value
     *
     * @return string formatada
     */
    public function somenteNumeros($value) {
        return $obj = preg_replace("/[^0-9]/", "", $value);
    }

    public function apiResponse($status = true, $message = "", $dados = null, $error = null, $code = EnumResponse::RESPONSE_OK){
        $json = [
            'status' => $status,
            'message' => $message,
            'code' => $code
        ];
        if($dados != null)
            $json['data'] = $dados;
        if($error != null)
            $json['errors'] = $error;
        return Response::json($json,$code);
    }
    /**
     * @param $value
     * @return bool
     */
    public function cpf($value){

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $value );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }
}