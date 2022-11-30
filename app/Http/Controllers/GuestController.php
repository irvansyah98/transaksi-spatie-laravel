<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use App\User;
use Illuminate\Support\Facades\Storage;
use Image;
use File;

class GuestController extends Controller
{
    
   public function index() {
      $data['data'] = User::where('role','guest')->orderBy('id', 'DESC')->get();
 
       return view('backend.pages.guest.index', $data);
   }

   public function create()
   {
      return view('backend.pages.guest.create');
   }

   public function store(Request $request)
   {
        $req = $request->all();
        $req['role'] = 'guest';

        $cek = User::where('email',request('email'))->first();

        if($cek){
          return redirect()->back()->withInput()->with('message', array(
            'title' => 'Oops!',
            'type' => 'success',
            'msg' => 'Email sudah ada. mohon untuk pakai email yang lain',
          ));
        }

        $req['password'] = \Hash::make($req['password']);

        if ($request->hasFile('image')) {
          if ($request->file('image')->isValid()) {
              $destinationPath = 'uploads/users/'; // upload path
              $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
              $fileName = rand(11111,99999).'.'.$extension; // renaming image
              $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
              Image::make($destinationPath.$fileName)->resize(500, null, function($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($destinationPath.$fileName);
              $req['photo'] = $fileName;
              unset($req['image']);
          }
        }

        $result = User::create($req);

        return redirect('backend/guest')->withInput()->with('message', array(
          'title' => 'Yay!',
          'type' => 'success',
          'msg' => 'Saved Success.',
        ));
    }

    public function edit($id)
    {
        if(count(User::where('id',$id)->get()) > 0){
            $data['data'] = User::find($id);

            return view('backend.pages.guest.edit', $data);
        }else{
            return redirect('backend/guest')->withInput()->with('message', array(
              'title' => 'Oops!',
              'type' => 'success',
              'msg' => 'Data not found.',
            ));
        }
    }

    public function show($id)
    {
        if(count(User::where('id',$id)->get()) > 0){
            $data['data'] = User::find($id);

            return view('backend.pages.guest.edit', $data);
        }else{
            return redirect('backend/guest')->withInput()->with('message', array(
              'title' => 'Oops!',
              'type' => 'success',
              'msg' => 'Data not found.',
            ));
        }
    }

    public function update($id, Request $request)
    {
      	$req = $request->except('_method', '_token', 'submit');

        $email = User::where("id", "!=", $id)
            ->where("email", request("email"))
            ->first();

        if ($email) {
          return redirect()->back()->withInput()->with('message', array(
            'title' => 'Oops!',
            'type' => 'success',
            'msg' => 'Email sudah ada. mohon untuk pakai email yang lain',
          ));
        }

        if (!empty($req['password'])) {
          $req['password'] = \Hash::make($req['password']);
        }else {
          unset($req['password']);
        }

        if ($request->hasFile('image')) {
          if ($request->file('image')->isValid()) {
            $destinationPath = 'uploads/users/'; // upload path
            $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renaming image
            $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
            Image::make($destinationPath.$fileName)->resize(500, null, function($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
            })->save($destinationPath.$fileName);
            $req['photo'] = $fileName;
            unset($req['image']);

            $result = User::find($id);
              if (!empty($result->getAttributes()['photo'])) {
                File::delete('uploads/users/'.$result->getAttributes()['photo']);
              }
          }else {
            unset($req['photo']);
          }
        }else {
          unset($req['photo']);
        }

        $result = User::where('id', $id)->update($req);

        return redirect('backend/guest')->withInput()->with('message', array(
          'title' => 'Yay!',
          'type' => 'success',
          'msg' => 'Saved Success.',
        ));
    }

    public function destroy($id)
    {
      $result = User::find($id);

      $count = User::where('email',$result->email)->count();

      $result->email = $result->email.'-deleted' . ((int)($count) + (int)1);
      $result->save();

      $result->delete();

      return redirect('backend/guest')->withInput()->with('message', array(
        'title' => 'Yay!',
        'type' => 'success',
        'msg' => 'Deleted data.',
      ));
    }
}