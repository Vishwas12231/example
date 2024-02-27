<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Mail\MailExample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PDFController extends Controller
{
    public function index()
    {
        $data['email'] = "vishwasigex@gmail.com";
        $data['title'] = "From Vishwasigex";
        $data['body'] = "This test Example";

        $pdf = app('dompdf.wrapper')->loadView('emails.myTestMail', $data);

        $data['pdf'] = $pdf;
        Mail::to($data['email'])->send(new MailExample($data));

        dd('Mail sent successfully');
    }
}
