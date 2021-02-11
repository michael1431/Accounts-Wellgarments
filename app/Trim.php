<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trim extends Model
{
  //  use SoftDeletes;

    protected $fillable = ['name','trims_category_id','product_unit_id','description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Trim belongs to trims category
     */
    public function trims_category(){
        return $this->belongsTo(TrimsCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Trim belongs to Product Unit
     */
    public function product_unit()
    {
        return $this->belongsTo(ProductUnit::class);
    }
}
