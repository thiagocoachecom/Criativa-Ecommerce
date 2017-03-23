<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* * *****************************************************************************
 * Arquivo do Helper (Auxiliar) com funções de conversão e tratamento de strings
 * específicas do idioma português.
 * ***************************************************************************** */

function limpar($string) {
    $string = preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    $string = strtolower($string);
    $string = str_replace(" ", "-", $string);
    $string = str_replace("(", "-", $string);
    $string = str_replace(")", "-", $string);
    $string = str_replace("/", "-", $string);
    $string = str_replace("---", "-", $string);
    return $string;
}

function reais($decimal) {
    return "R$" . number_format((double) $decimal, 2, ",", ".");
}

function reaisCart($decimal) {
    return str_replace(".", "", $decimal);
}

function dataBr_to_dataMySQL($data) {
    $campos = explode("/", $data);
    return date("Y-m-d", strtotime($campos[2] . "/" . $campos[1] . "/" . $campos[0]));
}

function dataMySQL_to_dataBr($data) {
    return date("d/m/Y", strtotime($data));
}

function nome_campo($string) {
    $string = str_replace("_", " ", $string);
    $string = ucwords($string);
    return $string;
}

function limitarTexto($texto, $limite) {
    $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
    return $texto;
}

function urlAmigavel($nom_tag, $slug = "-") {
    $string = strtolower($nom_tag);

// Código ASCII das vogais
    $ascii['a'] = range(224, 230);
    $ascii['e'] = range(232, 235);
    $ascii['i'] = range(236, 239);
    $ascii['o'] = array_merge(range(242, 246), array(240, 248));
    $ascii['u'] = range(249, 252);

// Código ASCII dos outros caracteres
    $ascii['b'] = array(223);
    $ascii['c'] = array(231);
    $ascii['d'] = array(208);
    $ascii['n'] = array(241);
    $ascii['y'] = array(253, 255);

    foreach ($ascii as $key => $item) {
        $acentos = '';
        foreach ($item AS $codigo)
            $acentos .= chr($codigo);
        $troca[$key] = '/[' . $acentos . ']/i';
    }

    $string = preg_replace(array_values($troca), array_keys($troca), $string);

// Slug?
    if ($slug) {
// Troca tudo que não for letra ou número por um caractere ($slug)
        $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
// Tira os caracteres ($slug) repetidos
        $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
        $string = trim($string, $slug);
    }
    return $string;
}

function select_ordem($ordem = 0) {
    $saida = '';
    $saida .= '<select id="ordem" class="form-control" required="" name="ordem_menu">';
    for ($i = -10; $i <= 10; $i ++) {
        $saida .= '<option value="' . $i . '"';
        if ($i == $ordem) {
            $saida .= 'selected';
        }
        $saida .= '>' . $i . '</option>';
    }
    $saida .= '</select>';
    return $saida;
}
