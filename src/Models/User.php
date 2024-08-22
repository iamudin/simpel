<?php
namespace Leazycms\Simpel\Models;
use Leazycms\Web\Models\User as BaseUser;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends BaseUser
{
    use  SoftDeletes;


    public function dinamakan(){
        return "saya";
    }
}
