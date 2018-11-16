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

class Notice extends Home {

    /**
     * 添加频道
     * @author 艺品网络  <twothink.cn>
     */
    public function index(){
        $Notice = model('notice');
        return $this->fetch('index');

    }

}