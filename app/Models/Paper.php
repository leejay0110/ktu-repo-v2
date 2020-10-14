<?php

namespace App\Models;

use App\Helpers\FileSize;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Paper extends Model
{
    use HasFactory;
    protected $fillable = ['course_title', 'course_code', 'examiner', 'year', 'semester', 'filename', 'path'];

    public function size()
    {
        return FileSize::bytesToHuman(Storage::size($this->path));
    }
}
