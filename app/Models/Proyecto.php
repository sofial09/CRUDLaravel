<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyecto extends Model {
protected $table = 'proyecto';
protected $fillable = [
    'NombreProyecto',
    'fuenteFondos',
    'MontoPlanificado',
    'MontoPatrocinado',
    'MontoFondosPropios',
];

protected static function boot()
{
    parent::boot();
    static::creating(function ($project) {
        $project->user_id = auth()->id();
    });
}

public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
}

