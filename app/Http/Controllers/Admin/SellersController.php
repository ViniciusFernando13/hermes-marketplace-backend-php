<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Actions\Admin\Sellers as SellersActions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SellersController extends Controller
{

    /**
     * Create a seller
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $seller = (new SellersActions\CreateAction)($request->all());
            return response()->json($seller);
        } catch (\Throwable $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }
}
