<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        DB::beginTransaction();
        try {
            DB::insert('....');
            // mon code métier
            $user = DB::select('....');
            // mon code métier
            DB::update('...');

            DB::commit();
            return response()->json($user, 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return response('Error ! '.$e->getMessage(), 400);
        }
    }
}
