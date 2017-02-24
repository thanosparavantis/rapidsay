<?php

namespace Forum;

class TextHelper
{
    public static function parse($string, $links = true)
    {
        $string = self::removeTagElementSpaces($string);
        if ($links) $string = self::findLinks($string);
        $string = self::addTag($string, 'center', '<center>$1</center>');
        $string = self::addMarkdown($string, '*', 3, '<strong><em>', '</em></strong>');
        $string = self::addMarkdown($string, '*', 2, '<strong>', '</strong>');
        $string = self::addMarkdown($string, '*', 1, '<em>', '</em>');
        $string = self::addMarkdown($string, '~', 2, '<del>', '</del>');
        return $string;
    }

    public static function raw($string)
    {
        $string = self::displayTextInline($string);
        $string = self::removeTag($string, 'center');
        $string = self::removeMarkdown($string, '*', 3);
        $string = self::removeMarkdown($string, '*', 2);
        $string = self::removeMarkdown($string, '*', 1);
        $string = self::removeMarkdown($string, '~', 2);
        return $string;
    }

    private static function addMarkdown($string, $search, $amount, $tagOpen, $tagEnd)
    {
        return preg_replace('/['.$search.']{'.$amount.'}(.*?)['.$search.']{'.$amount.'}/', $tagOpen . '$1' . $tagEnd, $string);
    }

    private static function removeMarkdown($string, $search, $amount)
    {
        return preg_replace('/['.$search.']{'.$amount.'}(.*?)['.$search.']{'.$amount.'}/', '$1', $string);
    }

    private static function addTag($string, $tag, $replace)
    {
        return preg_replace('/\[' . $tag . '\](.*?)\[\/' . $tag . '\]/s', $replace, $string);
    }

    private static function removeTag($string, $tag)
    {
        return preg_replace('/\[' . $tag . '\](.*?)\[\/' . $tag . '\]/s', '$1', $string);
    }

    private static function findLinks($string)
    {
        $string = preg_replace_callback(
            "%\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))%s",
            function ($matches) {
                return '<a href="' . self::appendHttp($matches[0]) . '" target="_blank">' . $matches[0] . '</a>';
            },
            $string
        );
        return $string;
    }

    public static function getLinkCount($string)
    {
        return preg_match_all("%\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))%s", $string);
    }

    private static function appendHttp($url)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }

        return $url;
    }

    public static function formatBlankLines($string)
    {
        return preg_replace('"(\r?\n){2,}"', "\n\n", $string);
    }

    private static function removeTagElementSpaces($string)
    {
        return preg_replace('/(])\r?\n/', '$1', $string);
    }

    public static function displayTextInline($string)
    {
        return trim(preg_replace('/\s\s+/', ' ', $string));
    }

    public static function placementColor($placement)
    {
        if ($placement == 0)
        {
            return 'first';
        }
        else if ($placement == 1)
        {
            return 'second';
        }
        else
        {
            return 'third';
        }
    }

    public static function removeSpaces($text)
    {
        return preg_replace('/\s/', '', $text);
    }

    public static function keywords($text)
    {
        return explode(' ', $text);
    }
}
