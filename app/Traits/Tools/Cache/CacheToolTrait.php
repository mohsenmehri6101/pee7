<?php
namespace App\Traits\Tools\Cache;
use Illuminate\Support\Facades\Cache;
trait CacheToolTrait
{
    public function setCache($key,$value)
    {
        return Cache::store('file')->put($key,$value); // 10 Minutes
    }
    public function getCache($key)
    {
        return Cache::get($key);
    }
}
