<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Ad extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'url', 'slug', 'country', 'no_places', 'desc', 'user_id'];

    public function permalink()
    {
        return route('ads.show', $this->url);
    }

    public function getForms($id)
    {
        return Form::latest()->where("ad_id", $id)->get();
    }

    public static function makeUrl()
    {
        $url = Str::random(30);
        return $url;
    }

    // public function scopeToSlug($string)
    // {
    //     return Str::slug($string, "-");
    // }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
