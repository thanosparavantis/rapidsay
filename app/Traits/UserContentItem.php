<?php

namespace Forum\Traits;


trait UserContentItem
{
    public function getType()
    {
        $reflect = new \ReflectionClass($this);
        return strtolower($reflect->getShortName());
    }
}
