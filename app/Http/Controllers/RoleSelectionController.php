<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleSelectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notice(Request $request)
    {
        $type = $request->type;
        return view('pages.select_role', compact('type'));
    }
}
