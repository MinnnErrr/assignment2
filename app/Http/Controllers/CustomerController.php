<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
      public function index(Request $request){
        $query = Customer::query();
        if($request->gender){
            $query->where('gender', $request->gender);
        }
        if($request->birthday == 'after2000'){
            $query->whereYear('birthday', '>', 2000);
        }
        return view('customer', [
            'customers' => $query->paginate(10),
        ]);
    }
}
