<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'grupo' => 'required',
		'id_padre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_departamento','nombre_municipio','ubicacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        //return $this->hasMany('App\Models\Empleado', 'id_direccion', 'id');
        return $this->hasOne('App\Models\Empleado', 'id_direccion', 'id')->with('departamento');
    }

    
  public function departamento(){
    return $this->hasMany(Direccione::class,'id','id_padre');
  }
    
    
    // public function municipio(){
    //   // return $this->hasMany(Empleado::class, 'id','id_direccion');
    //   return $this->hasOne(Direccione::class, );
    // }
}
