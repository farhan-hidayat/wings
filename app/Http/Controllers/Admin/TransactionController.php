<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.admin.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Transaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }

    public function dataTables()
    {
        $final = Transaction::get();

        foreach ($final as $key => $value) {
            $user = User::where("id", $value["user_id"])->get();
            $transaction_detail = TransactionDetail::where("transactions_id", $value["id"])->get();
            $final[$key]["nama_user"] = $user[0]["name"];

            foreach ($transaction_detail as $key2 => $detail) {
                $product = Product::where("id", $detail["products_id"])->get();
                $transaction_detail[$key2]["nama_produk"] = $product[0]["name"];
            }

            $final[$key]["transaction_detail"] = $transaction_detail;
        }
        return $final;
    }
}
