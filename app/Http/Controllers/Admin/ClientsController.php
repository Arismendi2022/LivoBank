<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function clientsList(Request $request){
    	$data = [
        'pageTitle'=>'Gestión de clientes'
      ];
      return view('backend.pages.admin.clients-list',$data);

    }
}
