<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\EnviaProtocolo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Inscricao;
use App\Models\DocExperiencia;
use App\Models\DocIdentificacao;
use App\Models\DocTitulo;
use App\Models\DocCertificado;
use carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function index()
    {

        return view('pages.home');
    }

    public function home()
    {
        
        // return view('pages.home');
    }

    public function show()
    {
        $data = Carbon::now('America/Sao_Paulo')->format('d-m-Y');
        // dd($data);
        return view('pages.inscricao.index', compact('data'));
    }

    public function store(Request $request)
    {
       
    }


    public function sucesso($protocolo)
    {
        

        return view('pages.inscricao.sucesso');
    }

}

    // ⠩⡳⢤⡈⣑⣲⣦⣬⣉⡙⠛⠋⣁⣴⣶⣿⣿⡿⢟⣽⣾⣿⣿⣿⣿⣿⣿⣿⣾⣔⡲⠦⠤⠄⢈⣙⣡⣶⠏⣈
    // ⡷⢠⣤⢀⣌⠠⣄⣀⠈⢁⣴⣾⣿⣿⣿⣿⢟⣵⣿⣿⣻⣷⢿⣾⢷⣿⣽⣯⣿⣿⣿⣶⡒⠫⠉⠉⡁⣀⡁⢠
    // ⡇⢰⣣⣾⡿⢃⡿⢁⢴⣿⣿⣿⡻⢟⡽⢣⣾⣿⣿⣿⡿⣿⣿⣿⣯⢿⣟⣿⣷⣿⣻⡿⣿⡜⠇⢞⡅⣿⣿⠈
    // ⣿⡈⠾⢋⣴⠋⢠⢎⢿⣿⢇⢕⣝⡵⢋⣿⡿⣽⣿⣻⣿⣿⣽⣷⣿⣹⣿⢿⣾⣯⣿⢿⣿⣿⣖⢌⠪⣻⠍⣤
    // ⣿⣿⣿⡿⠁⣴⠳⡵⢸⢯⠪⢳⠮⣩⣸⣿⢳⣿⣿⢿⣷⣿⣻⣞⣿⡏⣿⣿⣻⣷⣿⣿⣯⣿⣿⡜⡧⣤⢺⡜
    // ⣿⣿⡿⠁⢸⢕⠏⢝⣿⣾⣞⣿⣿⡇⣿⡗⢸⣿⣿⢿⣷⡿⣿⣿⡸⣷⢻⣿⣻⣿⣾⣷⣿⣻⣿⣷⠱⣕⠧⠛
    // ⣿⡿⠁⣼⠂⡯⣷⣿⣿⡿⣏⣿⣿⠇⣩⢳⡎⣿⣿⡟⢿⣿⣻⣿⡇⣿⢸⣿⣿⣷⣿⣽⣿⣽⣿⣿⢌⣿⣿⣿
    // ⣿⠃⣼⣕⣿⡺⣫⠩⣵⣾⣛⣩⣴⣾⣹⢼⣷⡹⣿⣿⣦⣌⣛⠿⣇⢞⢠⣿⣷⣿⣽⣿⣾⣿⣾⣿⡻⢿⢿⡞
    // ⠏⠈⣜⢣⡯⠀⠉⠁⣀⠉⡙⢿⣿⣿⣯⠎⣿⣧⡹⣿⣿⣿⠿⠿⠙⡸⠸⢸⣿⣯⣿⣾⣿⣾⣯⣿⡇⣟⣕⠹
    // ⠀⢸⣿⡃⢀⣠⡾⣋⣭⣭⡓⢦⡻⣿⣿⣷⣿⢿⣷⣝⢟⣵⠾⡋⡒⠖⣄⠸⡝⢿⡿⣷⢿⣷⣿⡯⢻⣷⢱⡳
    // ⠀⣾⢿⣿⢾⡝⠰⣿⣿⣿⣟⡀⠹⣿⣿⣿⣿⣿⣿⣿⠋⣵⣿⣿⣿⡗⡈⠣⣇⢣⢿⢻⣿⢿⣾⣧⡓⢥⡳⡝
    // ⢠⢫⣷⣶⢮⡁⣷⣾⣭⣩⣿⣿⡅⣿⣿⣿⣿⣿⣿⡟⣐⣭⡟⡛⣫⣶⣬⠒⣻⢜⠢⣻⣿⡿⣿⣿⡇⢗⣖⠞
    // ⣞⢿⡿⡱⣑⡟⣹⣶⢎⣿⡿⡻⢣⣿⣿⣿⣿⣿⣿⣇⢺⣟⣽⣿⡿⠿⢿⢧⣾⣿⣷⢾⢿⡿⣿⣽⡷⣿⣿⣿
    // ⢂⣷⣭⢨⣭⣞⢲⡶⣾⣳⣿⣿⠛⠛⠛⢻⢋⣙⠻⣿⣷⣶⣷⣶⣇⣛⣃⢫⢄⡻⢿⡿⣸⣿⡿⣿⠇⣯⣟⣣
    // ⣸⣿⣿⢸⡟⣽⣍⢿⣿⣽⣷⣿⠁⡾⣹⡽⣯⣟⣷⡘⣿⣿⣿⣯⣿⣽⣟⡗⡬⣭⣵⣾⣿⣿⢫⣿⢸⢨⣝⣫
    // ⣿⣻⣟⣆⠣⢻⡱⡸⣻⣿⣿⣿⡀⣿⣝⣿⡺⣷⢽⣇⣿⣿⢿⣥⣟⠷⠋⢞⣼⣿⣿⡿⣿⢧⡫⡿⡸⢪⡿⣹
    // ⣧⢿⢿⣧⢰⢄⡲⢾⣿⣿⣿⣿⣷⣌⣳⣯⣿⣙⣯⣾⣿⣏⢟⢛⢽⣿⡟⣾⣿⣿⣻⣿⢏⢰⡝⢇⡟⡸⢡⣿
    // ⣿⡏⢮⢷⢾⣜⢎⠶⠈⣩⣛⡛⠿⠿⠿⣿⣿⣿⣿⠿⠿⠿⠮⣁⣣⡭⣸⣿⣿⣽⣟⣿⢰⠸⡚⢸⠤⡒⣼⢟
    // ⣿⡇⢳⡊⠮⠽⠀⣰⣿⣯⢏⣉⡙⡛⠷⡢⠔⢖⢒⠺⣿⣵⡽⣸⣗⡇⣿⣿⣺⢷⣟⣷⢨⠙⡱⡘⡡⡚⣍⢔
    // ⣷⣿⣷⣏⠪⢁⢸⣿⣿⣿⠰⡌⡊⡪⢪⠸⠞⣌⢃⠓⠲⡔⢹⣿⣿⡇⣿⡷⣯⢟⡾⣽⣎⠪⡱⢰⡩⢪⢢⡑
