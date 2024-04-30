<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rejoint extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    public $timestamps = false;

    public function equipage() {
        return $this -> belongsTo(Equipages::class, "id_equipage");
    }

    public function user() {
        return $this -> belongsTo(Utilisateurs::class, "id_utilisateur");
    }
}
