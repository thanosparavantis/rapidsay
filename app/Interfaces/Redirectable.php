<?php

namespace Forum\Interfaces;

interface Redirectable
{
    function route();

    function redirect();
}