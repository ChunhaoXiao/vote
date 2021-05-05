<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetResource extends Model
{
    use HasFactory;
    protected $fillable = [
        'mark',
        'description',
        'path',
    ];

    public function getFullPathAttribute() {
        return asset('storage/'.$this->path);
    }
}
