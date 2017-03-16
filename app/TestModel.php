<?php
/**
 *  作者: 曾颖超
 *  日期: 2017-03-10 13:40:41
 *  描述: 测试
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TestModel extends Model
{
    protected $table = 'blog_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    static function get()
    {
        $date = TestModel::findorFail(101);
        dd($date);
    }
}