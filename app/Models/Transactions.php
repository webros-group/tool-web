<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Library\Services\LogSystem;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    public static function saveTranGiuXe($ma, $pathFile)
    {
    	$objTran = Transactions::where('ngay_tao', date("Y-m-d"))->first();
    	if (!$objTran instanceof Transactions) {
    		$objTran = new Transactions();
    	}
    	$objTran->ngay_tao = new \Datetime();
    	$objTran->so_lan += 1;
    	$objTran->tong_tien += \Config::get('parameters.gia');
    	if ($objTran->log != "") {
    		$objTran->log .= "\r\n";
    	}
    	$objTran->log = $objTran->log . "[".date("Y-m-d H:i:s")."] : Ma the : ".$ma." . Path file : ".$pathFile;
    	$objTran->save();
    }
}