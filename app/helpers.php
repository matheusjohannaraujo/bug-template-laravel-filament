<?php

use App\Models\User;

/**
 *
 * **Function -> base64_url_encode**
 *
 * EN-US: Returns `Base64Url` encoded text that can be passed in the `URL`.
 *
 * PT-BR: Retorna texto codificado em `Base64Url` que pode ser passado no `URL`.
 *
 * @param string $data
 * @return string
 */
function base64_url_encode(string $data): string
{
    return str_replace("=", "", strtr(base64_encode($data), "+/", "-_"));
}

/**
 *
 * **Function -> base64_url_decode**
 *
 * EN-US: Returns the result of removing the `Base64Url` encoding from the text.
 *
 * PT-BR: Retorna o resultado da remoção da codificação `Base64Url` do texto.
 *
 * @param string $data
 * @return string
 */
function base64_url_decode(string $data): string
{
    $remainder = strlen($data) % 4;
    if ($remainder !== 0) {
        $data .= str_repeat("=", 4 - $remainder);
    }
    $decodedContent = base64_decode(strtr($data, "-_", "+/"), true);
    if (!is_string($decodedContent)) {
        throw new \Exception("Error while decoding from Base64: invalid characters used");
    }
    return $decodedContent;
}

function first_name(?string $name)
{
    if ($name === null) {
        return null;
    }
    $name = mb_strtoupper(trim($name));
    $index = strpos($name, " ");
    if ($index !== false) {
        $name = substr($name, 0, $index);
    }
    return $name;
}

if (!function_exists('is_empty_null')) {
    function is_empty_null($value)
    {
        if ($value === "" || $value === null) {
            return null;
        }
        return $value;
    }
}

if (!function_exists('only_numbers')) {
    function only_numbers(?string $value)
    {
        if ($value === null) {
            return null;
        }
        $value = trim($value);
        // Extrai somente os números
        $value = preg_replace('/[^0-9]/', '', $value);
        $value = preg_replace('/[^0-9]/is', '', $value);
        return $value;
    }
}

if (!function_exists('uppercase')) {
    function uppercase(?string $value)
    {
        if ($value === null) {
            return null;
        }
        $value = trim($value);
        $value = mb_strtoupper($value);
        return $value;
    }
}

if (!function_exists('lowercase')) {
    function lowercase(?string $value)
    {
        if ($value === null) {
            return null;
        }
        $value = trim($value);
        $value = mb_strtolower($value);
        return $value;
    }
}

if (!function_exists('format_date_y_m_d')) {
    function format_date_y_m_d(string $date)
    {
        $date = str_replace('/', '-', $date);
        return (new \DateTime($date))->format("Y-m-d");
    }
}

if (!function_exists('format_date_y_m_d_h_i_s')) {
    function format_date_y_m_d_h_i_s(string $date)
    {
        $date = str_replace('/', '-', $date);
        return (new \DateTime($date))->format("Y-m-d H:i:s");
    }
}

if (!function_exists('format_date_d_m_y')) {
    function format_date_d_m_y(string $date)
    {
        $date = str_replace('/', '-', $date);
        return (new \DateTime($date))->format("d/m/Y");
    }
}

if (!function_exists('format_date_d_m_y_h_i_s')) {
    function format_date_d_m_y_h_i_s(string $date)
    {
        $date = str_replace('/', '-', $date);
        return (new \DateTime($date))->format("d/m/Y H:i:s");
    }
}

function panel_name_role()
{
}
