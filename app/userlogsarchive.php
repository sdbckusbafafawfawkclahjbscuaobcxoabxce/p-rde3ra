<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class userlogsarchive extends Model
{
    protected  $table ='userlogsarchives';
    protected $fillable = [
        'userrole','username',	'userip',	'useragent'	,'jalalitimestamps'	,'created_at',	'updated_at',	'userid',	'path',	'description'
    ];
}
