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
}
