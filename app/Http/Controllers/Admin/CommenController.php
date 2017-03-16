<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommenController extends Controller
{
   public function sqll(){
       DB::enableQueryLog();
       DB::table('user')->get();
       print_r(
           DB::getQueryLog()
       );
   }
}
