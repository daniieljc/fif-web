<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Search extends Component
{
    public $url;
    public $show = false;

    public $address;
    public $server_name;
    public $owner_name;
    public $owner_url;
    public $total_players;
    public $isp;
    public $country;

    public $end_point = "http://ip-api.com/json/";

    protected $rules = [
        'url' => 'required|regex:/cfx/',
    ];

    protected $messages = [
        'url.required' => 'You must enter a url.',
        'url.regex' => 'You must enter a correct url, for example: cfx.re/join/******',
    ];

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.search');
    }

    public function search()
    {
        $this->show = false;
        $this->validate();

        $urlData = explode('/', $this->url);

        $response = Http::get('https://servers-frontend.fivem.net/api/servers/single/' . $urlData[2]);
        $response = $response->json();

        if (isset($response['Data'])) {
            $addressAux = explode(':', $response['Data']['connectEndPoints'][0]);
            $this->address = $addressAux[0];
            $this->server_name = $response['Data']['hostname'];
            $this->owner_name = $response['Data']['ownerName'];
            $this->owner_url = $response['Data']['ownerProfile'];
            $this->total_players = $response['Data']['clients'];

            $requestAPI = Http::get($this->end_point . $addressAux[0]);
            $hostingData = json_decode($requestAPI);
            if ($hostingData != null) {
                $this->isp = $hostingData->isp;
                $this->country = $hostingData->country;
            }else{
                $this->isp = 'ISP';
                $this->country = 'COUNTRY';
            }


            $this->show = true;
        }
    }
}
