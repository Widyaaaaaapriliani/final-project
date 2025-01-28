<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
  public function sendContactForm(Request $request)
  {
    $validated = $request->validate([
      'name'    => 'required|string|max:255',
      'email'   => 'required|email',
      'message' => 'required|string',
    ]);

    try {
      Mail::to('ulilamry432@gmail.com')->send(new ContactUsMail($validated));

      return back()->with('success', 'Pesan berhasil dikirim!');
    } catch (\Exception $e) {
      Log::error('Gagal mengirim email: ' . $e->getMessage());

      return back()->with('error', 'Terjadi kesalahan saat mengirim pesan. Coba lagi nanti.');
    }
  }
}
