<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $primaryKey = 'producto_codigo';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'producto_codigo',
        'cantidad',
        'max_stock',
        'min_stock',
    ];
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_codigo','codigo');
    }
}
