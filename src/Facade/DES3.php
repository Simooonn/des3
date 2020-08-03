<?php
namespace HashyooDes3\Facade;

use Illuminate\Support\Facades\Facade;
class DES3 extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'DES3';
    }
}