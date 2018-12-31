<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

class RoleSelectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notice(Request $request)
    {
        $this->authorize('select-role');
        $type = $request->type;
        return view('roles.select_role', compact('type'));
    }
}
