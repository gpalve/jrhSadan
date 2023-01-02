<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {   $total_r = array();
        $total_tr = array();
        $total_trp = array();

        $total_rooms  =  Room::select('id','number')->distinct()->get();

        $transact_rooms = Transaction::where([['check_in', '<=', Carbon::now()], ['check_out', '>=', Carbon::now()]])->select('room_id')->distinct()->get(); 

        

        // $transact_rooms_pending = Transaction::where([['check_in', '>=', Carbon::now()], ['check_out', '>=', Carbon::now()]])->where('room_status',1)->select('room_id','check_in','check_out')->get();

        // return $transact_rooms_pending;

        $transactions_pending = Transaction::with('user', 'room', 'customer')
        ->where([['check_in', '>=', Carbon::now()], ['check_out', '>=', Carbon::now()]])
        ->where('room_status',1)
        ->orderBy('check_out', 'ASC')
        ->orderBy('id', 'DESC')->get();

        $transactions = Transaction::with('user', 'room', 'customer')
            ->where([['check_in', '<=', Carbon::now()], ['check_out', '>=', Carbon::now()]])
            ->where('room_status',2)
            ->orderBy('check_out', 'ASC')
            ->orderBy('id', 'DESC')->get();

        foreach($total_rooms as $t){
            $total_r[] =  $t->id;
        }

        foreach($transact_rooms as $tr){
            $total_tr[] =  $tr->room_id;
        }

        

    
        

        $result=array_diff($total_r,$total_tr);
        $final_vacant =  array_values($result);

        //return $final_vacant;


        
       
      

        //return $final_vacant1;

        
        $blade_vacant = array();
        //return count($final_vacant);
        for($i=0;$i<count($final_vacant);$i++){
           $blade_vacant[] = Room::where('id',$final_vacant[$i])->select('number')->get();
        }

        //return count($blade_vacant);

        
        //return $blade_vacant1;

        return view('dashboard.index', compact('transactions','total_rooms','transact_rooms','blade_vacant','transactions_pending'));
    }
}
