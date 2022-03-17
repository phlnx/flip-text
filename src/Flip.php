<?php

namespace TextFlip;

class Flip
{

    # ABCDEFGHIJKLMNOPQRSTUVWYZabcdefghijklmnopqrstuvwxyz1234567890,._!?:;_

    static public function flip(string $text): string
    {
        return self::rotate($text, true);
    }

    static public function mirrorX(string $text): string
    {
        $conversionTable = [
            "B" => "𐐒", "C" => "Ɔ", "D" => "Ɑ", "E" => "Ǝ", "F" => "ꟻ", "G" => "Ꭾ", "J" => "ᒐ",
            "K" => "ꓘ", "L" => "⅃", "N" => "И", "P" => "ꟼ", "Q" => "Ϙ", "R" => "Я", "S" => "Ƨ",
            "Z" => "Ƹ", "a" => "ɒ", "b" => "d", "c" => "ɔ", "d" => "b", "e" => "ɘ", "f" => "Ꮈ",
            "g" => "ϱ", "h" => "⑁", "j" => "ᒑ", "k" => "ʞ", "p" => "q", "q" => "p", "r" => "ɿ",
            "s" => "ƨ", "t" => "ƚ", "z" => "ƹ", "3" => "ɛ", "?" => "⸮", "(" => ")", "6" => "მ",
            "{" => "}", "[" => "]", "<" => ">",
            "\" => "//"
        ];
        return self::convert(strrev($text), $conversionTable);
    }

    # ⱯBCDEԷҼHIՂKΓWИOb⥀ʁƧꓕꓵΛM⅄Zɑpcqԍɻმμᴉๅĸlɯuobd𝒍ƨϝnʌʍxλz𐩀ᄅƐㄣϛϱ˩8მ0'·‾¡ƾ:;‾

    static public function mirrorY(string $text): string
    {
        $conversionTable = [
            "A" => "Ɐ", "F" => "Ƚ", "G" => "Ҽ", "J" => "Ղ", "L" => "Г", "M" => "ꟽ", "N" => "И", "P" => "Ь",
            "Q" => "Ꝺ", "R" => "ʁ", "S" => "Ƨ", "T" => "ꓕ", "U" => "⋂", "V" => "Λ", "W" => "M", "Y" => "⅄",
            "Z" => "", "a" => "g", "b" => "p", "d" => "q", "e" => "ԍ", "f" => "ŀ", "g" => "a", "h" => "µ",
            "i" => "ᴉ", "j" => "ๅ", "m" => "ɯ", "n" => "u", "r" => "𝒍", "s" => "ƨ", "t" => "ϝ", "v" => "ʌ",
            "w" => "ʍ", "y" => "λ", "z" => "", "1" => "", "2" => "", "3" => "↋",
            "\" = "//"
        ];
        return self::convert($text, $conversionTable);
    }

    static function rotate(string $text, bool $reverse = false): string
    {
        $conversionTable = [
            "a" => "ɐ", "b" => "q", "c" => "ɔ", "d" => "p", "e" => "ǝ", "f" => "ɟ", "g" => "ƃ",
            "h" => "ɥ", "i" => "ᴉ", "j" => "ɾ", "k" => "ʞ", "l" => "ן", "m" => "ɯ", "n" => "u",
            "r" => "ɹ", "t" => "ʇ", "v" => "ʌ", "w" => "ʍ", "y" => "ʎ", "A" => "Ɐ", "B" => "ꓭ",
            "C" => "Ɔ", "D" => "Ɑ", "E" => "Ǝ", "F" => "Ⅎ", "G" => "⅁", "J" => "ᒋ", "K" => "Ʞ",
            "L" => "˥", "M" => "ꟽ", "P" => "Ԁ", "Q" => "Ꝺ", "R" => "ᴚ", "T" => "ꓕ", "U" => "Ո",
            "V" => "Λ", "W" => "M", "Y" => "⅄", "1" => "⇂", "2" => "↊", "3" => "↋", "4" => "ߤ",
            "5" => "ϛ", "6" => "9", "7" => "𝘓", "8" => "8", "9" => "6", "0" => "0", "." => "˙",
            "," => "ʻ", "'" => ",", '"' => "„", "`" => ",", "?" => "¿", "!" => "¡", "[" => "]",
            "(" => ")", "{" => "}", "}" => "{", "<" => ">", "&" => "⅋", "_" => "‾", "∴" => "∵",
            "⁅" => "⁆", "Є" => "Э", "∈" => "∋", ";" => "؛",
            "\" => "//"
        ];
        return self::convert($reverse ? strrev($text) : $text, $conversionTable);
    }

    static private function convert(string $text, array $conversionTable): string
    {
        $convertedText = "";
        if (strlen($text) > 0) {
            $keys = array_keys($conversionTable);
            for ($i = 0, $m = count($keys); $i < $m; $i++) {
                if (empty($conversionTable[$conversionTable[$keys["$i"]]])) {
                    $conversionTable[$conversionTable[$keys["$i"]]] = $keys["$i"];
                }
            }
            for ($i = 0, $characters = str_split($text), $m = count($characters); $i < $m; $i++) {
                $convertedText .= $conversionTable[$characters[$i]] ?? $characters[$i];
            }
        }
        return $convertedText;
    }
}