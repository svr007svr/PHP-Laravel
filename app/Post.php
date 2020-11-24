<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @method static withTrashed()
 * @method static onlyTrashed()
 */
class Post extends Model
{

    protected $fillable=['title','description','content','image','category_id'];

        protected $dates=['deleted_at'];

        public function deleteImage(){
            Storage::delete($this->image);
        }
        public function category (){
            return $this->brlongsTo(Category::class);
        }
}
