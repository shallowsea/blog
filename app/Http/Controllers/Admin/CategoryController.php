<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('cate_order')->get();
        $data = $this->getTree($category);
        return view('admin.category.index')->with('data', $data);
    }

    public function getTree($data)
    {
        $arr = array();
        foreach ($data as $k => $v) {
          if($v->cate_pid==0) {
            $data[$k]['_cate_name'] = $data[$k]['cate_name'];
            $arr[] = $data[$k];
            foreach ($data as $m => $n) {
                if($n->cate_pid == $v->cate_id) {
                    $data[$m]['_cate_name'] = "&emsp;&emsp;&emsp;". $data[$m]['cate_name'];
                    $arr[] = $data[$m];
                }
            }
        }
    }
    return $arr;
}    

    public  function changeOrder()
    {
        $input = Input::all();
        $cate =Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $res = $cate->update();
        if ($res) {
           $data = [
           'status' => 0,
           'msg' => '分类排序更新成功'
           ];
       } else {
          $data = [
          'status' => 1,
          'msg' => '分类排序更新失败'
          ];
      }
      return $data;
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function destroy()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    }
