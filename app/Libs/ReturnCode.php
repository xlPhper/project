<?php
/**
 * Created by PhpStorm.
 * User: zhanglihe
 * Date: 16/3/8
 * Time: 上午9:53
 */
namespace App\Libs;

class ReturnCode
{
    // 通用(8001-8109)
    const SUCCESS            = 0;    // 成功
    const FORBIDDEN          = 8001; // 权限不足
    const SYSTEM_FAIL        = 8002; // 系统错误，如数据写入失败之类的
    const PARAMS_ERROR       = 8003; // 参数错误
    const NOT_FOUND          = 8004; // 资源未找到
    const ACCESS_TOKEN_ERROR = 8005; // access_token错误
    const AUTHORIZE_FAIL     = 8006; // 权限验证失败
    const NOT_MODIFY         = 8007; // 没有变动
    const RECORD_EXIST       = 8008; // 记录已存在
    const SIGN_FAIL          = 8009; // 签名错误
    const RECORD_NOT_EXIST   = 8010; // 记录不存在
    const PARAMS_REQUIRED    = 8011; // 参数填写不完整

    // 参数相关
    const EMAIL_EXIST           = 8201; // 邮箱已存在
    const EMAIL_FORMAT_FAIL     = 8202; // 邮箱格式不对正确
    const MOBILE_FORMAT_FAIL    = 8203; // 手机格式不正确
    const MOBILE_NOT_FIND       = 8204; // 手机号码不存在
    const MOBILE_HAS_MORE       = 8205; // 存在多个手机号码
    const NAME_EXIST            = 8206; // 名称已被使用
    const NAME_REQUIRED         = 8209; // 名称已被使用
    const MOBILE_EXIST          = 8207; // 手机号已存在

    // 登录、账号相关
    const USERNAME_REQUIRED      = 8401; // 登录账号为必填
    const PASSWORD_REQUIRED      = 8402; // 登录密码为必填
    const USERNAME_EXIST         = 8403; // 登录账号已被使用
    const ADMINNAME_REQUIRED     = 8404; // 管理员姓名不能为空
    const PASSWORD_NOT_MATCH     = 8405; // 密码错误
    const OLD_PASSWORD_NOT_MATCH = 8406; // 旧密码不匹配
    const PASSWORD_CONFIRM_FAIL  = 8407; // 两次输入的密码不匹配
    const PASSWORD_FORMAT_FAIL   = 8408; // 密码格式不对
    const APPLY_SIGN_FAIL        = 8510; // 注册邀请码错误


    // 中文错误详情
    public static $codeTexts = [
        0    => '操作成功',
        8001 => '权限不足',
        8002 => '系统错误，请联系管理员',
        8003 => '参数错误',
        8004 => '资源未找到',
        8005 => 'TOKEN无效',
        8006 => '权限不足',
        8007 => '没有修改',
        8008 => '记录已存在',
        8009 => '签名错误',
        8010 => '记录不存在',
        8011 => '参数填写不完整',
        // 参数错误
        8201 => '邮箱已存在',
        8202 => '邮箱格式不对正确',
        8203 => '手机格式不正确',
        8204 => '手机号码不存在',
        8205 => '存在多个手机号码',
        8206 => '名称已被使用',
        8207 => '手机号已存在',

        // 登录、账号相关
        8401 => '登录账号为必填',
        8402 => '登录密码为必填',
        8403 => '登录账号已被使用',
        8404 => '管理员姓名不能为空',
        8405 => '登录失败',
        8406 => '原密码不匹配',
        8407 => '两次输入的密码不匹配',
        8408 => '密码格式错误，请输入%s到%s位字符',
        8510 => '注册邀请码不存在或已被使用',

    ];

    public static function create($code, $data = [], $msg = '')
    {
        if (empty($msg) && isset(self::$codeTexts[$code])) {
            $msg = self::$codeTexts[$code];
        }

        return ['code' => $code, 'msg' => $msg, 'data' => $data];
    }

    public static function success($data = [], $msg = '')
    {
        if (empty($msg) && isset(self::$codeTexts[self::SUCCESS])) {
            $msg = self::$codeTexts[self::SUCCESS];
        }
        return ['code' => self::SUCCESS, 'msg' => $msg, 'data' => $data];
    }

    public static function error($code, $msg = '')
    {
        if (empty($msg) && isset(self::$codeTexts[$code])) {
            $msg = self::$codeTexts[$code];
        }

        if ($code == ReturnCode::SUCCESS) {
            $code = ReturnCode::SYSTEM_FAIL;
            $msg  = '系统错误';
        }

        return ['code' => $code, 'msg' => $msg];
    }
}
