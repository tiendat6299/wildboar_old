<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\attentions;
use Hash;
use Auth;
use DB;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
       
        $new_product = Product::where('status',1)->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loap_sp = ProductType::where('id',$type)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loap_sp'));
    }

    public function getChitiet(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
    	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }

    public function getLienHe(){
    	return view('page.lienhe');
    }


    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        return view('page.dat_hang');
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->note;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $customer->note;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','?????t h??ng th??nh c??ng');

    }

    public function getLogin(){
        return view('page.dangnhap');
    }
    public function getSignin(){
        return view('page.dangki');
    }

    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui l??ng nh???p email',
                'email.email'=>'Kh??ng ????ng ?????nh d???ng email',
                'email.unique'=>'Email ???? c?? ng?????i s??? d???ng',
                'password.required'=>'Vui l??ng nh???p m???t kh???u',
                're_password.same'=>'M???t kh???u kh??ng gi???ng nhau',
                'password.min'=>'M???t kh???u ??t nh???t 6 k?? t???'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','T???o t??i kho???n th??nh c??ng');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui l??ng nh???p email',
                'email.email'=>'Email kh??ng ????ng ?????nh d???ng',
                'password.required'=>'Vui l??ng nh???p m???t kh???u',
                'password.min'=>'M???t kh???u ??t nh???t 6 k?? t???',
                'password.max'=>'M???t kh???u kh??ng qu?? 20 k?? t???'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        $user = User::where([
                ['email','=',$req->email],
                ['status','=','1']
            ])->first();

        if($user){
            if(Auth::attempt($credentials)){

            return redirect()->route('trang-chu')->with(['flag'=>'success','message'=>'????ng nh???p th??nh c??ng']);
            }
            else{
                return redirect()->route('trang-chu')->with(['flag'=>'danger','message'=>'????ng nh???p kh??ng th??nh c??ng']);
            }
        }
        else{
           return redirect()->back()->with(['flag'=>'danger','message'=>'T??i kho???n ch??a k??ch ho???t']); 
        }
        
    }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getSearch(request $rq){
        $product = Product::where('name','like','%'.$rq->search.'%') -> orWhere('unit_price',$rq->search)->get();
        return view('page.search',compact('product'));
    }
    public function ajax_info()
    {
        $number_customer = Customer::count();
        $number_cake = Bill::join('bill_detail','bill_detail.id_bill','bills.id')
        ->sum('quantity');

        $number_bill = Bill::count();

        $number_reorder = DB::select(DB::raw('
        select count(*) as number_reorder
        from
        (
            SELECT count(*) as count_number FROM `bills` 
        GROUP by id_customer
        HAVING count(*) > 1
        ) as t
        '))[0]->number_reorder;

        return compact('number_customer','number_cake','number_bill','number_reorder');
    }
}
