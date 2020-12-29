<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = [
        'username', 'email', 'password', 'api_token'
    ];/**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
    protected $hidden = [
            'password', 'api_token'
    ];
}