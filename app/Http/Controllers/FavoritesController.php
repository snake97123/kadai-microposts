<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Micropost;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favorites()->paginate(10);
        $user = Auth::user();
        return view('favorites', compact('favorites', 'user'));
    }
    
    public function store($id)
    {
        $micropost = Micropost::find($id);
        Auth::user()->favorite($micropost);
        
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $micropost = Micropost::find($id);
        Auth::user()->unfavorite($micropost);
        
        return redirect()->back();
    }
}
