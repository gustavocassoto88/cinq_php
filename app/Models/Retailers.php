<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * @property int $idretailer
 * @property string $name
 * @property string $image_path
 * @property string $description
 * @property string $website
 * @property string $created_at
 * @property string $updated_at
 * @property boolean $status
 * @property string $slug
 * @property Product[] $products
 */
class Retailers extends Model
{
    use Sluggable;

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idretailer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'image_path', 'description', 'website', 'created_at', 'updated_at', 'status', 'slug'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Products', 'idretailer', 'idretailer');
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
