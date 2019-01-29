<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Library\Services\LogSystem;
use App\Models\Cards;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function includeCard(Request $request)
    {
        if(!empty($request->all())){
            LogSystem::write('----------- Start include card -------', 'IncludeCard');
            $arrData = $request->all();
            LogSystem::write('Validate input : '.$arrData['ma'], 'IncludeCard');
            $this->validatorIncludeCard($arrData)->validate();
            LogSystem::write('Pass validate ', 'IncludeCard');
            DB::beginTransaction();
            $objCard = new Cards();
            $objCard->ma = $arrData['ma'];
            $objCard->bien_so = isset($arrData['bien_so']) ? $arrData['bien_so'] : null;
            $objCard->save();
            DB::commit();

            
            
            LogSystem::write('Nhập thẻ thành công. ', 'IncludeCard');
            Session::flash('success', "Xe vào thành công. Mã thẻ : ". $arrData['ma']); 
            return redirect()->route('includeCard');
        }
        return view('includeCard');
    }

    protected function validatorIncludeCard($data)
    {
        return Validator::make($data, [
            'ma' => ['required',
                function($attribute, $value, $fail) {
                    $objCard = Cards::where('ma', $value)->first();
                    if ($objCard instanceof Cards) {
                        return $fail('Mã thẻ đã tồn tại.');
                    }
                }
            ],
        ]);
    }
}
