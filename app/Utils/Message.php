<?php

namespace App\Utils;

/**
 * Message string padronization
 *
 * @package    amado-eng
 * @subpackage App\Utils
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
class Message 
{
    /**
     * Success case.
     *
     * @param  string $operation
     * @param  string $param
     * @param  $genere|null
     * @return string $msg
     */
    public static function success(string $operation, string $param, $genere = null) : string
    {
        if ($genere) {
            $msg = $operation ." de ". $param. " realizada com sucesso!"; 
        } else {
            $msg = $operation ." de ". $param. " realizado com sucesso!";
        }
        return $msg;
    }
}
