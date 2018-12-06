<?php
namespace app\index\controller;
use app\index\model\User as UserModel;
use think\Request;
use think\Session;

class Index extends Base
{

    //渲染首页模板
    public function index()
    {
        //判断用户是否登录
        $this-> islogin();
        return  $this->view -> fetch('index/index');
    }
    //用户登录部分

    //登录渲染
    public function login()
    {
        //$this -> alreadyLogin();
        $this -> view ->assign('title','用户登录');
        return $this -> view -> fetch('login');
    }
    public  function  checkLogin(Request $request)
    {   //设置初始值
        $status = 0;//检验登录状态 判断标志
        $result = '验证失败'; //失败提示信息
        $data = $request->param();
        //验证规则
        $rule = [
            'name|姓名' => 'require',
            'password|密码' => 'require',
        ];

        $result = $this->validate($data, $rule);
        if (true === $result) {
            //查询条件
            $map = [
                'name' => $data['name'],
                'password' => md5($data['password'])
            ];
            //数据表查询,返回模型对象
            //$user = UserModel::get($map);
            $user = UserModel::select($map);


                    // $status = 1;
//            if (null === $user) {
//                $result = '没有该用户,请检查';
//                $status = 1;
//            } else {
//                $status = 1;
//                $result = '验证通过,点击[确定]后进入后台';
//                //创建2个session,用来检测用户登陆状态和防止重复登陆
//                Session::set('user_id', $user->id);
//                Session::set('user_info', $user->getData());
//
//                //更新用户登录次数:自增1
//                $user->setInc('login_count');
//            }
            return ['status' => $status, 'message' => $request, 'data' => $data];

        }
    }
}

