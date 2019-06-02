<?php
/**
 * Created by gilasweb.ir.
 * User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
 * Date: 1/23/2019
 * Time: 4:00 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class generalinfo extends Model
{
    protected  $table ='generalinfo';
    protected $fillable = [
        'name','value', 'description','status','jalalitimestamps'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
