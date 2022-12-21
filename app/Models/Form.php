<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'email', 'phone', 'address', 'bio', 'file', 'ad_id'];


    public static function makeDirectory()
    {
        $subFolder = 'files';
        Storage::makeDirectory($subFolder);
        return $subFolder;
    }

    public function fileUrl()
    {
        return Storage::get($this->file);
    }

    public function permalink()
    {
        return route('forms.show', [$this->ad->slug, $this->id]);
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
