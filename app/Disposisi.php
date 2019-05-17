<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisi_surats';
    protected $primaryKey = 'id_disposisi';
    protected $fillable = ['id_surats'];
}