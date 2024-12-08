<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\DashboardCustomer;

class DashboardController extends Controller
{
    public function index()
    {
        $id = auth('customer')->user()->id;
        $dt = DashboardCustomer::getInformasiCs($id);
        return view('shop::customer.informasiCs', compact('dt'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ]);

        $updated = DashboardCustomer::UpdateInformasiCs($request);

        if ($updated) {
            return redirect()->route('dashboardCs')->with('success', 'Data berhasil diperbaharui');
        }

        return redirect()->route('dashboardCs')->with('error', 'Data gagal / tidak diperbaharui');
    }
}
