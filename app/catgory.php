<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class catgory extends Model
{
    protected  $table ='catgories';
    protected $fillable = [
        'title','father','post_type_id','jalalitimestamps','status'
    ];
}
