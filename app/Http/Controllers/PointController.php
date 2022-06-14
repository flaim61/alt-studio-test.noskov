<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;

class PointController extends Controller
{
    public function add(Request $req){
      $user = auth()->user();

      if($user){
        $point = new Point();
        $point->name = $req->input('name');
        $point->longitude = $req->input('long');
        $point->latitude = $req->input('width');
        $point->user_id = $user->id;
        $point->save();
        return redirect()->route('home')->with('success', 'Точка успешно добавлена!');
      }

      return redirect()->route('home')->withErrors('success', 'Ошибка добавления точки!');
    }


    public function getPointsByUserId(){
      $user = auth()->user();

      if($user){
        $id = $user->id;
        return Point::where('user_id', $id)->get();
      }
    }

    public function deletePointById($id){
      $user = auth()->user();

      if($user){
          Point::destroy($id);
          return redirect()->route('home')->with('success', 'Точка успешно удалена!');
      }

      return redirect()->route('home')->withErrors('success', 'Ошибка удаление точки!');
    }

    public function updatePointById($id, Request $req){
      $point = Point::find($id);
      $longitude = $req->input('long');
      $latitude = $req->input('width');

      if($point){
        if($longitude){
          $point->longitude = $longitude;
        }
        if($latitude){
          $point->latitude = $latitude;
        }

        $point->save();
        return redirect()->route('home')->with('success', 'Точка успешно обновлена!');
      }

      return redirect()->route('home')->withErrors('success', 'Ошибка обновления точки!');
    }
}
