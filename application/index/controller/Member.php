<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/1 0001
 * Time: 14:23
 */

namespace app\index\controller;

use app\index\model\Member as MemberModel;
class Member extends Base
{
    public function member_list()
    {
        return $this->fetch( 'member/member-list');
    }

}