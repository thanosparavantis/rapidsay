<?php

namespace Forum;

class ModelHelper
{
    private static $types = [ 'post', 'comment', 'reply' ];

    public static function resolve($type, $id)
    {
        if (in_array($type, self::$types) && is_numeric($id))
        {
            $type = 'Forum\\' . ucfirst($type);
            return $type::findOrFail($id);
        }
        else
        {
            abort(404);
        }
    }

    public static function getType($item)
    {
        if ($item instanceof Post) return "post";
        else if ($item instanceof Comment) return "comment";
        else if ($item instanceof Reply) return "reply";
        else return "rating";
    }

    public static function namespaceModelToString($namespace)
    {
        return lcfirst(preg_replace('/Forum\\\/', '', $namespace));
    }
}
