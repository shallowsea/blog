<?php
/**
 *  ����: ��ӱ��
 *  ����: 2017-03-10 13:40:41
 *  ����: ����
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