<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        // Gender filter
        if ($request->gender && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        // Birthday filter
        if ($request->birthday == 'after2000') {
            $query->whereYear('birthday', '>', 2000);
        }
        if ($request->birthday == 'before2000') {
            $query->whereYear('birthday', '<', 2000);
        }

        $customers = $query->paginate(10);
        $customers->appends($request->all());

        return view('customer', [
            'customers' => $customers,
        ]);
    }
}
