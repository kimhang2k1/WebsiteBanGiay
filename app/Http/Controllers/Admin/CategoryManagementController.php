<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryManagementController extends Controller
{
    public function getCategoryManagement(Request $request)
    {
        $category = DB::table('nhomsanpham')->limit(3)->get();
        return view('/Admin/CategoryManagement')->with('category', $category);
    }
}