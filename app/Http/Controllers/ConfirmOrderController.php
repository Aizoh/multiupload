<?php

namespace App\Http\Controllers;

use App\Mail\Confirm;
use App\Models\ConfirmOrder;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class ConfirmOrderController extends Controller
{

    public function sendOrderConfirmationEmail()
    
    {
        //$confirmorder = ConfirmOrder::orderBy('id','desc')->get();
        $confirmorder = ConfirmOrder::all();
       
        //dd($confirmorder);
            foreach ($confirmorder as $order){

                
                $user_email = $order->user_email;
                //dd($user_email);
                
                try {
                    //code...
                    Mail::to($user_email)->send(new Confirm($order));
                } catch (\Throwable $th) {
                    //throw $th;
                    //return response()->json(['message' => 'Email could not be sent.'], 500);
                    return response()->json($th->getMessage(), 500);
                }
                // Email sent successfully.
                    //return response()->json(['message' => 'Email sent successfully.']);
                    return redirect()->route('confirm-order.index');
            }

            // foreach ($confirmorder as $order) {
            //     # code...
            //     //$user_email = $order['user_email'];
            //     $user_email = $order->user_email;

            //     try {
            //                 Mail::to($user_email)->send(new Confirm);
            //             } catch (\Exception $e) {
            //                 // Handle the email sending failure.
            //                 // Log the error, return an error response, etc.
            //                 return response()->json(['message' => 'Email could not be sent.'], 500);
            //             }
            
            //             // Email sent successfully.
            //             return response()->json(['message' => 'Email sent successfully.']);
                
            // }
        //
        // foreach ($confirmorder->user_email as $recipient) {

        //         dd($recipient);
        //         Mail::to($recipient)->send(new Confirm ($confirmorder));
            
        //     // Replace 'recipient@example.com' with the actual recipient's email address.
        //     //$recipientEmail = 'techw3@gmail.com';

        //     // Send the email using the OrderShipped Mailable class.
        //     // $confirmorder = ConfirmOrder::findOrFail(order_id);
            

        //     // Optionally, you can check if the email was sent successfully.
        //     try {
        //         Mail::to($recipient)->send(new Confirm);
        //     } catch (\Exception $e) {
        //         // Handle the email sending failure.
        //         // Log the error, return an error response, etc.
        //         return response()->json(['message' => 'Email could not be sent.'], 500);
        //     }

        //     // Email sent successfully.
        //     return response()->json(['message' => 'Email sent successfully.']);
        // }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('emails.sent');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $confirmorder = ConfirmOrder::findOrFail($request->order_id);
        //
        foreach ($confirmorder->user_email as $recipient) {
            Mail::to($recipient)->send(new Confirm ($confirmorder));
        }

    return redirect()->route('confirm-order.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
