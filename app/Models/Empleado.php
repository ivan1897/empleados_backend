<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $correo
 * @property $telefono
 * @property $id_direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Direccione $direccione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'correo' => 'required',
		'telefono' => 'required',
		'id_direccion' => 'required',
    ];



    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','correo','telefono','id_direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
  //   public function direccione()
  //   {
  //       //return $this->hasOne('App\Models\Direccione', 'id', 'id_direccion');
  //       return $this->hasMany('App\Models\Direccione', 'id', ' ')->with('departamento');
  //   }

  // public function departamento(){
  //   return $this->hasMany(Direccione::class,'id_padre');
  // }

  public function departamento()
{
    return $this->belongsTo(Direccione::class,'id','id_direccion');
}

public function municipio()
{
    return $this->hasMany(Direccione::class,'id', 'id_direccion');
}
    

}
