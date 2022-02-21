<?php
namespace Arifuzzaman\FindFish\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PurchaseChecker
{
    public function handle(Request $request, Closure $next)
    {

        if (Schema::hasTable('installtion_settings')) {
            $setting = DB::table('installtion_settings')
                ->where('status', 1)
                ->first();

            if ($setting) {
                return $next($request);
            } else {
                return redirect('code-verify');
            }
        } else {
            return redirect('code-verify');
        }

    }
}
