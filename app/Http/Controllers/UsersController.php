<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        //dd($users);
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        $count_microposts = $user->microposts()->count();
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,

        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followings', $data);
    }
    
    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followers', $data);
    }
    
    
    
    
    
    
    
    public function likings($id)
    {
        //$user = user::find($id);
        $user = User::find($id);
        //小文字のuserになっております。User::find($id);に直してください。
        
        //print_r($id);
        $likings = $user->likings()->paginate(10);
        //$likings = $user->likings();
        
        $data = [
            'user' => $user,
            'likings' => $likings,
        ];
        //$dataという配列で渡していますが、
        //ビュー側で使用するときは、$userや$linkingsとして使用
        //$data += $this->counts($user);
        //print "<pre>";
        //print_r($data);
        //print "<pre>";
        $data += $this->counts($user);
        //var_dump($likings);
        //dd($likings);
        return view('users.likings', $data);
    }
    
    public function likers($id)
    {
        $user = User::find($id);
        $likers = $user->likers()->paginate(10);
        
        $data = [
            'user' => $user,
            'likers' => $likers,
        ];
        
        //$data += $this->counts($user);
        
        return view('users.likers', $data);
    }
}