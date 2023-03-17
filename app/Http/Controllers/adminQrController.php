<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminQrController extends Controller
{
    public function adminQrOku()
    {
        return view('admin.qr.qroku');
    }
}
