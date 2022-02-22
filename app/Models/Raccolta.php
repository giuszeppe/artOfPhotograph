<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raccolta extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function delete()
    {
        $res = parent::delete();
        if ($res == true) {
            $relations = $this->images;
            $relations->each(function ($item, $key) {

                $item->delete();
            }); // here get the relation data
            // delete Here
        }
    }
}
