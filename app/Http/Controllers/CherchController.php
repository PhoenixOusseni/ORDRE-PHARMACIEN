<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CherchController extends Controller
{
    public function searchmember(Request $request)
    {
        $search = $request->get('q');
        $page = $request->get('page', 1);
        $resultCount = 25;

        $offset = ($page - 1) * $resultCount;

        $items = User::where('nom', 'like', '%' . $search . '%')->orWhere('prenom', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($resultCount)
            ->get();

        $count = User::where('nom', 'like', '%' . $search . '%')->orWhere('prenom', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%')->count();

        return response()->json([
            'items' => $items,
            'total_count' => $count,
        ]);
    }
}
