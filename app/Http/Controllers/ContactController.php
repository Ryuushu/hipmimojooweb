<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        try{
            $request->validate([
                'name'    => 'required|string',
                'email'   => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);
            $data = $request->only(['name', 'email', 'subject', 'message']);

            // Kirim ke dua email
            Mail::to(['hipmikotamojokerto@gmail.com','info@hipmimojokertokota.org'])->send(new ContactMail($data));
            return response()->json(['message' => 'Email berhasil dikirim!','status'=>'ok']);
        }catch(\Throwable $e){
            return response()->json(['error' => $e->getMessage()], 200);
        }
        

       
    }
}
