<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\PaymeService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $paymeService;

    public function __construct(PaymeService $paymeService)
    {
        $this->paymeService = $paymeService;
    }

    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
        ]);

        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'groups_id' => $request->course_id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

       
        $response = $this->paymeService->createTransaction($transaction->amount, [
            'transaction_id' => $transaction->id,
        ]);

       return response()->json($response);
        if (isset($response['result'])) {
            $transaction->update([
                'transaction_id' => $response['result']['receipt']['_id'],
                'status' => 'created',
            ]);
        } else {
            return response()->json(['error' => 'Transaction creation failed'], 500);
        }
        return response()->json($transaction);
    }

    public function form(){
       return view('pages.transaction');
    }

     public function test(Request $req){
        dd('1');
       return response()->json($req, 500);
    }
}
