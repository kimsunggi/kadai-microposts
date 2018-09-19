<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Micropost;
use App\User;

class UserfavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->favorite($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return redirect()->back();
    }
    
    
    public function microposts_favorites($id)
    {

        
        $user = User::find($id);
        $microposts = $user->microposts_favorites()->paginate(10);
        
        $data = [
                    'user' => $user,
                    'microposts' => $microposts
            ];
        
        $data += $this->counts($user);

        return view('users.microposts_favorites', $data);
    }
}
