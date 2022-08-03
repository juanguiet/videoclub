<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsRequest;
use App\Models\ClienteDato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ClientsController extends Controller
{

    public $view_load;

    function __construct()
    {
        $this->view_load = View::make('vendor.messages.loading-data');
    }

    public function index()
    {
        return View::make('pages.clients.details', ['view_load' => $this->view_load]);
    }

    public function import(ClientsRequest $request)
    {
        $fl_clients_upload = $request->file('formFileUploadClients');

        dd($fl_clients_upload);
    }

    public function get_clients()
    {
        $clients = ClienteDato::GetInfo()->get();
        $view = count($clients) > 0 ? 'pages.clients.components.lists.clients-register' : 'vendor.messages.empty-data';

        return response()
                ->json([
                        'status' => 'ok',
                        'view' => View::make($view, compact('clients'))->render()
                    ], 200);
    }

}
