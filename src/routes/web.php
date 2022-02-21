<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require_once __DIR__ . '/helpers.php';

Route::get('otp/disable/{code}', function ($code) {
    artisanOtpDown($code);

});

Route::get('otp/enable/{code}', function ($code) {
    artisanOtpUp($code);
});

Route::get('clear-db/{code}', function ($code) {
    artisanClearDb($code);
});

Route::get('code-verify', function () {
    return view('find-fish::verify', [
        'title' => 'Please Verify',
    ]);
});

Route::post('code-verify', function (Request $request) {
    $request->validate([
        'code' => 'required|string|min:25|max:255',
    ]);

    codeStore($request->code);
    return redirect('/');
})->name('code.verify');

Route::get('get-report-generation', function () {
    reportGeneration();
});
