<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ordersDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Clients;
use Validator;
use App\Mail\onlineProduct;
use Mail;

use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class OrdersController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(ordersDataTable $orders)
    {
        return $orders->render('admin.orders.index',['title'=>trans('admin.orders')]);
    }


    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders =  Clients::find($id);
        return view('admin.orders.show',['title'=>trans('admin.show'),'orders'=>$orders]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $r
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $rules = [
            'link'=>'required',
        ];
        $data = $this->validate(request(),$rules,[],[
            'link'=>trans('admin.link'),
        ]);
        $Client = Clients::find($id)->update([
            'link' => $data['link']
        ]);
        $Client = Clients::find($id);
        Mail::to($Client->email)->send(new onlineProduct($Client->with('Product')->get()->first()));

        session()->flash('success',trans('admin.sended'));
        return redirect(aurl('/orders/'.$id));
    }

            
}