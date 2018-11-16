<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 艺品网络
// +----------------------------------------------------------------------

namespace app\home\controller;

/**
 * 后台频道控制器
 */

class Repair extends Home {

    /**
     * 添加频道
     * @author 艺品网络  <twothink.cn>
     */
    public function add(){
        if(request()->isPost()){
            $Repair = model('repair');
            $post_data=\think\Request::instance()->post();
            //自动验证
            /*
            $validate = validate('repair');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            */

            $data = $Repair->create($post_data);
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('update_repair', 'repair', $data->id, UID);
            } else {
                $this->error($Repair->getError());
            }
        }
        $this->assign('meta_title', '新增报修');
        return $this->fetch('add');

    }

}