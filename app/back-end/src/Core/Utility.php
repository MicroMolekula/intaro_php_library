<?php

namespace Library\Core;

class Utility
{
    public static function translit(string $value) : string
    {
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya', ' ' => '_',
        );
        $value = strtr(mb_strtolower($value), $converter);
        return $value;
    }

    public static function readConfig(string $file_name)
    {
        $result = [];
        $value = explode("\n", file_get_contents(__DIR__ . "/../../$file_name"));
        foreach($value as $item){
            $tmp = explode("=", $item);
            $result[$tmp[0]] = $tmp[1];
        }
        return $result;
    }
}