<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = "Data";

    protected $fillable = ['id', 'Nama', 'totalSaldo', 'noRek'];
}