<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idproduct
 * @property int $idretailer
 * @property string $name
 * @property float $price
 * @property string $image_path
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property string $slug
 * @property boolean $status
 * @property Retailer $retailer
 */
class Products extends Model
{
    use Sluggable;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idproduct';

    /**
     * @var array
     */
    protected $fillable = ['idretailer', 'name', 'price', 'image_path', 'description', 'created_at', 'updated_at', 'slug', 'status', 'idretailer'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function retailer()
    {
        return $this->belongsTo('App\Models\Retailers', 'idretailer', 'idretailer');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
