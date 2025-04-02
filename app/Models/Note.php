<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';
    protected $fillable = ["user_id",'title','body'];


    public static function searchByTetleOrBody($keyword){
        return self::where('title','LIKE',"%keyword%")
        ->orWhere('body','LIKE',"%keyword%")
            ->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'note_category');
    }
}
