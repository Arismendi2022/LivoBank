<?php

  namespace App\Http\Controllers\Client;

  use App\Http\Controllers\Controller;
  use Illuminate\Http\Request;
  use App\Models\Client;


  class ClientController extends Controller
  {
    public function clientList(Request $request){
      $data = [
        'pageTitle' => 'Clientes'
      ];
      return view('backend.pages.client.clients-list',$data);
    }

  }
