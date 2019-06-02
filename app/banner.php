<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected  $table ='banners';
    protected $fillable = [
        'title','father','link','imgpath','jalalitimestamps','status'
    ];
}
