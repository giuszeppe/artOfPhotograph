<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function raccolte()
    {
        return $this->hasMany(Raccolta::class);
    }

    public function delete()
    {

        $relations = $this->raccolte;
        $relations->each(function ($racc) {
            $racc->delete();
        });
        $res = parent::delete();
    }
}
