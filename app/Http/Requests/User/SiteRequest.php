<?php

// +----------------------------------------------------------------------
// | date: 2015-08-09
// +----------------------------------------------------------------------
// | SiteRequest.php: 会员网址表单验证
// +----------------------------------------------------------------------
// | Author: yangyifan <yangyifanphp@gmail.com>
// +----------------------------------------------------------------------

namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class SiteRequest extends BaseFormRequest {

    /**
     * 验证错误规则
     *
     * @return array
     */
    public function rules(){
        if($this->get('id') > 0 ){
            return [
                'site_name'         => ['required'],
                'user_site_cat_id'  => ['required', 'numeric'],
                'site_url'          => ['required', 'url'],
                'status'            => ['required', 'in:1,2'],
                'sort'              => ['required', 'digits_between:0,255'],
            ];
        }else{
            return [
                'site_name'         => ['required'],
                'user_site_cat_id'  => ['required', 'numeric'],
                'site_url'          => ['required', 'url'],
                'status'            => ['required', 'in:1,2'],
                'sort'              => ['required', 'digits_between:0,255'],
            ];
        }

    }

    /**
     * 验证错误提示
     *
     * @return array
     */
    public function messages(){
        return [
            'site_name.required'            => trans('validate.site_name_require'),
            'site_name.unique'              => trans('validate.name_unique'),
            'user_site_cat_id.required'     => trans('validate.cat_name_require'),
            'user_site_cat_id.numeric'      => trans('validate.cat_name_error'),
            'site_url.required'             => trans('validate.url_require'),
            'site_url.url_error'            => trans('validate.url_error'),
            'site_url.unique'               => trans('validate.url_unique'),
            'status.required'               => trans('validate.status_require'),
            'status.in'                     => trans('validate.status_error'),
            'sort.require'                  => trans('validate.sort_require'),
            'sort.digits_between'           => trans('validate.sort_error')
        ];
    }

}
