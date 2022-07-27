<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\User;
use App\Mail\EmailAtach;
use Illuminate\Http\Request;
use App\Notifications\Informasi;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class EmailController extends Controller
{
    public function email(){
      $user = User::with(['roles'])->get();
      // dd($user);
      foreach ($user as $user) {
      dd($user->roles == 'ADMIN' || 'KepalaLab');
          dd($user);
          # code...
          // Mail::to($user->email)->send(new Email());
        // }
      }
      return redirect()->route('success');
      
      
    }
    
    public function attach(Request $request){
      
      $text = [
        'subject' => 'Pengiriman data dari controller'
      ];
      
      Mail::to('adityagustian11@gmail.com')->send(new EmailAtach($text));
      // return new EmailAtach();
      
    }
    
    public function notif(){
      $user1 = User::with('roles')->where('roles_id', 1)->get();
      $user = User::with('roles')->where('roles_id', 2)->get();
      
      
      // dd($user);
      $data = [
        'subject' => 'Peminjaman Barang',
        'line1' => 'Ada Mahasiswa Yang ingin Meminjam Barang',
        'action' => 'Approval now',
        'line2' => 'Hello ini line 2'
      ];

        
        // $user->notify(new Informasi($data));
        Notification::send($user, new Informasi($data));
        Notification::send($user1, new Informasi($data));
        return redirect()->route('success');
      
    }
    
    
    
}
