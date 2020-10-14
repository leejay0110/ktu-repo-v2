<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Helpers\FileSize;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['material_id', 'filename', 'path'];


    public function size()
    {
        return FileSize::bytesToHuman(Storage::size($this->path));
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
