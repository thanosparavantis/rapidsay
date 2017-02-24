<?php

namespace Forum\Interfaces;

interface CanBeSearched
{
    function scopeGetSearchResults($query, $search);
    
    function scopeGetDefaultSearchResults($query);
}