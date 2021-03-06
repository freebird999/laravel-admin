<?php

// +----------------------------------------------------------------------
// | date: 2015-07-12
// +----------------------------------------------------------------------
// | QueryController.php: 前台查询控制器
// +----------------------------------------------------------------------
// | Author: yangyifan <yangyifanphp@gmail.com>
// +----------------------------------------------------------------------

namespace App\Http\Controllers\Home;

use App\Http\Requests;

use App\Model\Home\QueryModel;

class QueryController extends BaseController {

	/**
	 * 网址首页
	 *
	 * @return Response
     * @author yangyifan <yangyifanphp@gmail.com>
	 */
	public function getIndex(){
        return view('home.query.index', [
            'all_query'     => QueryModel::getAll(),
            'title'         => '查询工具',
            'keywords'      => '查询工具',
            'description'   => '查询工具',
        ]);
	}

}
