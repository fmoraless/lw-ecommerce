<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];

    const PENDIENTE = 1;
    const RECIBIDO = 2; // usuario ha generado la orden y pagado
    const ENVIADO = 3; //Hemos enviado el producto pero no ha sido recibido por el usuario
    const ENTREGADO = 4; //Cuando ya ha sido recibido por el usuario
    const ANULADO = 5; //Cuando la orden ha sido anulada


    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

     public function user() {
        return $this->belongsToMany(User::class);
    }

}
