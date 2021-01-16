<?php

namespace App\Http\Controllers;

use App\Game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class UserGameController extends Controller
{
    public function register(Request $request)
    {

        try {
            $this->validate($request, [
                'name' => 'required',
                'punctuation' => 'required',
                'level' => 'required',
            ]);

            $user = User::where('name', $request->name)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $request->name
                ]);
            }



            $game = Game::create([
                'punctuation' => $request->punctuation,
                'user_id' => $user->id,
                'level' => $request->level,
            ]);

            $games = Game::limit(5)->orderBy('created_at', 'desc')->with('user')->get();

            return view('punctuation', compact('games', $games));
        } catch (\Throwable $th) {
            Log::info($th);
            return 'exception  ' . $th->getMessage() . '   ' . $th->getLine() . '   ' . $th->getFile();
        }
    }
}
