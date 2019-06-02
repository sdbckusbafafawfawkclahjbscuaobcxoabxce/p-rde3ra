<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class usercart extends Model
{
    protected  $table ='usercarts';
    protected $fillable = [
        'userid','cartcontent', 'cartsubtotal','number','other','status','jalalitimestamps',
    ];
}
