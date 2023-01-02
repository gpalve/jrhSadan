<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Payment;
use App\Repositories\TransactionRepository;
use Carbon\Carbon;

class approverController extends Controller
{
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }
    public function index(Request $request)
    {
        $pendingTransactions = $this->transactionRepository->getPendingTransaction($request);  
    
      return view('approval.index', [ 'pendingTransactions' => $pendingTransactions ]);
      

    }
    public function approve($id)
    {

       $existingInfo = Transaction::where('id',$id)->first(); 
       //room status = 2 means user is approved
       $existingInfo->room_status = 2;
       $existingInfo->save();

       
 
    return redirect()->back()->with('success','User has been approved successfully !');  
    

    }

    public function reject($id)
    {

       $existingInfo = Transaction::where('id',$id)->first(); 
       $existingInfo->delete();

       
 
    return redirect()->back()->with('success','Request for room was rejected !');  
    

    }

    public function generate($tid,$cid){
        $transaction = Transaction::find($tid);
        $customer = Customer::find($cid);
        $mrNo = Payment::where('transaction_id',$tid)->first();
        return view('template.allotment')->with('customer',$customer)->with('transaction',$transaction)->with('mrNo',$mrNo);
        //return $transaction;
        //return $customer;

    }
}
