<?php
namespace App\Http\Controllers;
use App\TestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{
    public function add()
    {
//        TestModel::ge();
//        $date = DB::insert("insert into blog_user VALUES (101, 'cc', 12345)");
//        $date = DB::table('blog_user')->whereRaw("user_id >= ? and user_name = ?", ['101', 'cc'])->get();
//        $date = DB::table('blog_user')->get()->chunk(4,function($res){
//            if($res){
//                return false;
//            }
//        });
//              
        $date = TestModel::all()->chunk(4);
        $a = $date['0'];
        dd($a);
    }

    public function test()
    {
        return route('cjh');
    }

}
?>
