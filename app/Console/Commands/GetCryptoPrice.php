<?php

namespace App\Console\Commands;

use App\Models\CryptoPrice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCryptoPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cryptoprice:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve the current price of Bitcoin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://api.coindesk.com/v1/bpi/currentprice.json');

        $info = [
            'usd' => $response['bpi']['USD']['rate_float'],
            'eur' => $response['bpi']['EUR']['rate_float']
        ];

        $price = CryptoPrice::create($info);

        $this->info('The current price of Bitcoin is ' .
            $price->usd . ' USD and ' .
            $price->eur . ' EUR');

        return 0;
    }
}
