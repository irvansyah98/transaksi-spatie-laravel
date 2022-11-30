<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    
   public function index() {
      $data['data'] = User::where('role','admin')->orderBy('id', 'DESC')->get();
 
       return view('backend.pages.admin.index', $data);
   }

   public function create()
   {
      return view('backend.pages.admin.create');
   }

   public function store(Request $request)
   {
        $req = $request->all();
        $req['role'] = 'admin';

        $req['password'] = \Hash::make($req['password']);

        $result = User::create($req);

        return redirect('backend/admin')->withInput()->with('message', array(
          'title' => 'Yay!',
          'type' => 'success',
          'msg' => 'Saved Success.',
        ));
    }

    public function edit($id)
    {
        if(count(User::where('id',$id)->get()) > 0){
            $data['data'] = User::find($id);

            return view('backend.pages.admin.edit', $data);
        }else{
            return redirect('backend/admin')->withInput()->with('message', array(
              'title' => 'Oops!',
              'type' => 'success',
              'msg' => 'Data not found.',
            ));
        }
    }

    public function update($id, Request $request)
    {
      	$req = $request->except('_method', '_token', 'submit');

        if (!empty($req['password'])) {
          $req['password'] = \Hash::make($req['password']);
        }else {
          unset($req['password']);
        }

        $result = User::where('id', $id)->update($req);

        return redirect('backend/admin')->withInput()->with('message', array(
          'title' => 'Yay!',
          'type' => 'success',
          'msg' => 'Saved Success.',
        ));
    }

    public function destroy($id)
    {
      $result = User::find($id);
      $result->delete();

      return redirect('backend/admin')->withInput()->with('message', array(
        'title' => 'Yay!',
        'type' => 'success',
        'msg' => 'Deleted data.',
      ));
    }
}