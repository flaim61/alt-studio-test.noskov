<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PointRequest;
use App\Models\Point;
use Auth;
use Exception;

class PointController extends Controller
{
    public function add(PointRequest $req){
      $user = auth()->user();

      try {
          if($user){
            $point = new Point();
            $point->name = $req->input('name');
            $point->longitude = $req->input('long');
            $point->latitude = $req->input('width');
            $point->user_id = $user->id;
            $point->save();
            return redirect()->route('home')->with('success', 'Точка успешно добавлена!');
          }
      } catch (Exception $e) {
          return redirect()->route('home')->withErrors('success', 'Ошибка добавления точки!');
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
      $userPoints = $this->getPointsByUserId();
      $user = auth()->user();

      try{
          $point = Point::where('id', $id)->where('user_id', Auth::user()->id)->first();

          if($user && $point){
            $point->delete();
            return redirect()->route('home')->with('success', 'Точка успешно удалена!');
          }
      } catch(Exception $e){
          return redirect()->route('home')->withErrors('success', 'Ошибка удаление точки!');
      }

      return redirect()->route('home')->withErrors('success', 'Ошибка удаление точки!');
    }

    public function updatePointById($id, PointRequest $req){
      $point = Point::where('id', $id)->where('user_id', Auth::user()->id)->first();
      $longitude = $req->input('long');
      $latitude = $req->input('width');

      try {
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
      } catch (Exception $e) {
          return redirect()->route('home')->withErrors('success', 'Ошибка обновления точки!');
      }

      return redirect()->route('home')->withErrors('success', 'Ошибка обновления точки!');
    }
}
