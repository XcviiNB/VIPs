<?php

namespace App\Http\Controllers;

use App\Models\Vip;
use Illuminate\Http\Request;

class VipController extends Controller
{
    public function index() {
        return inertia('Vips/Index', [
            'vips' => Vip::orderBy('full_name')->get()
        ]);
    }

    public function search($searchKey) {
        return inertia('Vips/Index', [
            'vips'  => Vip::where('full_name', 'like', "%$searchKey%")->get()
        ]);
    }

    public function show(Vip $vip) {
        return inertia('Vips/Show', [
            'vip'   => $vip
        ]);
    }

    public function create() {
        return inertia('Vips/Create');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'full_name' => 'required',
            'position'  => 'required'
        ]);

        $fileName = null;

        if ($request->pic) {
            $fileName = time().'.'.$request->pic->extension();
            $request->pic->move(public_path('images/vip_pics'), $fileName);
            $fields['pic'] = $fileName;
        }

        $newVip = Vip::create($fields);

        $vips = Vip::where('id', '<>', $newVip->id)->orderBy('full_name')->get();
        $vips->prepend($newVip);

        return inertia('Vips/Index', [
            'vips' => $vips
        ]);
    }

    public function toggleEnable(Vip $vip) {
        $vip->enable = !$vip->enable;
        $vip->save();

        return back();
    }

    public function destroy(Vip $vip) {
        $vip->delete();

        return redirect('/vips');
    }
}
