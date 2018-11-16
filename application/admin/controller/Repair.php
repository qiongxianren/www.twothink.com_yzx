<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 艺品网络
// +----------------------------------------------------------------------

namespace app\admin\controller;

/**
 * 后台频道控制器
 */

class Repair extends Admin {

    /**
     * 添加频道
     * @author 艺品网络  <twothink.cn>
     */
    public function add(){
        if(request()->isPost()){
            $Repair = model('repair');
            $post_data=\think\Request::instance()->post();
            //自动验证
            $validate = validate('repair');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }

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
            return $this->fetch('edit');

    }

    public function index(){
        $list = \think\Db::name('Repair')->order('id asc')->paginate(2);
        $this->assign('list', $list);
        $this->assign('meta_title' , '报修管理');
        return $this->fetch();
    }

    /**
     * 编辑频道
     * @author 艺品网络  <twothink.cn>
     */
    public function edit($id = 0){
        if($this->request->isPost()){
            $postdata = \think\Request::instance()->post();
            $Repair = \think\Db::name("Repair");
            $data = $Repair->update($postdata);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = \think\Db::name('Repair')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }

            $this->assign('info', $info);
            $this->meta_title = '编辑报修';
            return $this->fetch();
        }
    }

    /**
     * 删除频道
     * @author 艺品网络  <twothink.cn>
     */
    public function del(){
        $id = array_unique((array)input('id/a',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(\think\Db::name('repair')->where($map)->delete()){
            //记录行为
            action_log('update_repair', 'repair', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

}