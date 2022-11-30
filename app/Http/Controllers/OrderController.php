<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class OrderController extends Controller
{
    public function index() {
        $order = Order::query();

        if(request('keyword')){
            $order = $order->orWhere('code', 'like', '%'.request('keyword').'%')
                  ->orWhere('type', 'like', '%'.request('keyword').'%')
                  ->when(strtolower(request('keyword')) == 'pending', function ($query, $role) {
                        $query->orWhere('status_id', 1);
                    })
                  ->when(strtolower(request('keyword')) == 'approved', function ($query, $role) {
                        $query->orWhere('status_id', 2);
                    })
                  ->when(strtolower(request('keyword')) == 'cancelled', function ($query, $role) {
                        $query->orWhere('status_id', 3);
                    })
                  ->orWhereHas('user', function($query) {
                    $query->where('fullname', 'ilike', '%'.request('keyword').'%');
                  })
                  ->orWhereHas('merk', function($query) {
                    $query->where('name', 'ilike', '%'.request('keyword').'%');
                  });
        }

        if(request('start_date') && request('end_date')){
                $order = $order->whereBetween('created_at', array(date('Y-m-d H:i:s',strtotime(request('start_date') . ' 00:00:00')), date('Y-m-d H:i:s',strtotime(request('end_date') . ' 23:59:59'))));
        }
        
        $data['data'] = $order->orderBy('id', 'DESC')->paginate(10);
   
        return view('backend.pages.order.index', $data);
     }

    public function edit($id)
    {
        $data['data'] = Order::find($id);
        return view('backend.pages.order.edit', $data);
    }

    public function update(Request $request, $id){
        $req = $request->except('_method', '_token', 'submit');

        Order::where('id',$id)->update($req);

        return redirect()->back()->withInput()->with('message', array(
            'title' => 'Yay!',
            'type' => 'success',
            'msg' => 'Saved Success.',
        ));
    }

    public function destroy($id)
    {
      $result = Order::find($id);

      $result->delete();

      return redirect('backend/order')->withInput()->with('message', array(
        'title' => 'Yay!',
        'type' => 'success',
        'msg' => 'Deleted data.',
      ));
    }
}
