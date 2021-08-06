<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestProduct;
use App\Product;
use App\Bill;
use App\BillDetail;
use App\Http\Controllers\Controller;

class AdminBillController extends Controller
{
    public function index(Request $request)
    {
    	$id = $request->get('id');
        $name = $request->get('n');

        $bill = Bill::whereRaw(1)
        	->when($id,function ($query) use ($id) {
        		return $query->where('id', $id);
        	})
        	->orderByDesc('id')
            ->paginate(10);
        $viewData = [
            'bill' => $bill,
            'query' => $request->query()
        ];
        // dd($bill);
        return view('admin.bill.bill',$viewData);
    }

    public function delete($id)
    {
        Bill::findOrFail($id)->delete();
        return redirect()->back();
    }


}
