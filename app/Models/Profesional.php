<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profesional extends Model
{
    use HasFactory;
    protected $primaryKey = "Id";
    public $timestamps = false;

    public function getEmpresa(){
        return $this->belongsTo(
            Empresa::class,
            'idempresa',
            'Idempresa'
        );
    }
    

    /* public function scopeName($query , $nombre)
    {
      if($nombre)  
        return $query->where('nombre', 'LIKE',"%$nombre%" );

    }
    public function scopeSurName($query , $apellido)
    {
      if($apellido)  
        return $query->where('apellido', 'LIKE',"%$apellido%" );

    }
    public function scopeEmail($query , $email)
    {
      if($email)  
        return $query->where('email', 'LIKE',"%$email%" );

    } */





}

