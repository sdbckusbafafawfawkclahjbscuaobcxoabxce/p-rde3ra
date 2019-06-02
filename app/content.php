<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    use Sluggable;
    use SearchableTrait;

    protected  $table ='contents';
    protected $fillable = [
        'title','description','imgpath','extradata','post_type_id','catgory','jalalitimestamps','status'
    ];
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'contents.title' => 10,
            'contents.description' => 8,
            //'contents.jalalitimestamps' => 2,
            //'contents.extradata' => 1,
        ],
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
