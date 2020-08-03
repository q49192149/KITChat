<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FriendRequest;
use App\User;

class FriendController extends Controller
{
    public function index()
  {
      // DBよりBookテーブルの値を全て取得
      //$users = User::all();

      $friends = \Auth::User()->friends()->get(); //ログインユーザ用
      //$friends = User::find(16547823)->friends()->get(); //test
      return view('friend/index', compact('friends'));

      // 取得した値をビュー「book/index」に渡す
      //return view('friend/index', compact('users'));
  }

  public function store(FriendRequest $request)
  {
      
      $user = \Auth::User();
      $user->friends()->attach($request->friend_id);

      return redirect('friend')->with('success', '新しい友達を登録しました');
      
  }

  public function delete(Request $request)
  {
      $user_id = \Auth::User()->user_id;
      DB::table('friends')
      ->where('user_id', $user_id)
      ->where('friend_id', $request->friend_id)
      ->delete();
      //$user = \Auth::User();
      //$user->friends()->where('friend_id', $request->friend_id)->delete();

      //$frineds = \Auth::User()->friends()->get();
      /*
      foreach($frineds as $friend){
          if ($friend->id == $request->friend_id)
            ;
      }*/
      return redirect('friend')->with('success', '友達を削除しました');
      
  }

}
