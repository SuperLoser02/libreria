<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id';
    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table ='autores';
    
    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = ['nombre']; 
    
    /**
     * Indica si el modelo mantiene marcas de tiempo.
     *
     * @var bool
     */
    public $timestamps = false;

}
