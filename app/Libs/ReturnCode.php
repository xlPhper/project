<?php
/**
 * Created by PhpStorm.
 * User: zhanglihe
 * Date: 16/3/8
 * Time: ����9:53
 */
namespace App\Libs;

class ReturnCode
{
    // ͨ��(8001-8109)
    const SUCCESS            = 0;    // �ɹ�
    const FORBIDDEN          = 8001; // Ȩ�޲���
    const SYSTEM_FAIL        = 8002; // ϵͳ����������д��ʧ��֮���
    const PARAMS_ERROR       = 8003; // ��������
    const NOT_FOUND          = 8004; // ��Դδ�ҵ�
    const ACCESS_TOKEN_ERROR = 8005; // access_token����
    const AUTHORIZE_FAIL     = 8006; // Ȩ����֤ʧ��
    const NOT_MODIFY         = 8007; // û�б䶯
    const RECORD_EXIST       = 8008; // ��¼�Ѵ���
    const SIGN_FAIL          = 8009; // ǩ������
    const RECORD_NOT_EXIST   = 8010; // ��¼������
    const PARAMS_REQUIRED    = 8011; // ������д������

    // �������
    const EMAIL_EXIST           = 8201; // �����Ѵ���
    const EMAIL_FORMAT_FAIL     = 8202; // �����ʽ������ȷ
    const MOBILE_FORMAT_FAIL    = 8203; // �ֻ���ʽ����ȷ
    const MOBILE_NOT_FIND       = 8204; // �ֻ����벻����
    const MOBILE_HAS_MORE       = 8205; // ���ڶ���ֻ�����
    const NAME_EXIST            = 8206; // �����ѱ�ʹ��
    const NAME_REQUIRED         = 8209; // �����ѱ�ʹ��
    const MOBILE_EXIST          = 8207; // �ֻ����Ѵ���

    // ��¼���˺����
    const USERNAME_REQUIRED      = 8401; // ��¼�˺�Ϊ����
    const PASSWORD_REQUIRED      = 8402; // ��¼����Ϊ����
    const USERNAME_EXIST         = 8403; // ��¼�˺��ѱ�ʹ��
    const ADMINNAME_REQUIRED     = 8404; // ����Ա��������Ϊ��
    const PASSWORD_NOT_MATCH     = 8405; // �������
    const OLD_PASSWORD_NOT_MATCH = 8406; // �����벻ƥ��
    const PASSWORD_CONFIRM_FAIL  = 8407; // ������������벻ƥ��
    const PASSWORD_FORMAT_FAIL   = 8408; // �����ʽ����
    const APPLY_SIGN_FAIL        = 8510; // ע�����������


    // ���Ĵ�������
    public static $codeTexts = [
        0    => '�����ɹ�',
        8001 => 'Ȩ�޲���',
        8002 => 'ϵͳ��������ϵ����Ա',
        8003 => '��������',
        8004 => '��Դδ�ҵ�',
        8005 => 'TOKEN��Ч',
        8006 => 'Ȩ�޲���',
        8007 => 'û���޸�',
        8008 => '��¼�Ѵ���',
        8009 => 'ǩ������',
        8010 => '��¼������',
        8011 => '������д������',
        // ��������
        8201 => '�����Ѵ���',
        8202 => '�����ʽ������ȷ',
        8203 => '�ֻ���ʽ����ȷ',
        8204 => '�ֻ����벻����',
        8205 => '���ڶ���ֻ�����',
        8206 => '�����ѱ�ʹ��',
        8207 => '�ֻ����Ѵ���',

        // ��¼���˺����
        8401 => '��¼�˺�Ϊ����',
        8402 => '��¼����Ϊ����',
        8403 => '��¼�˺��ѱ�ʹ��',
        8404 => '����Ա��������Ϊ��',
        8405 => '��¼ʧ��',
        8406 => 'ԭ���벻ƥ��',
        8407 => '������������벻ƥ��',
        8408 => '�����ʽ����������%s��%sλ�ַ�',
        8510 => 'ע�������벻���ڻ��ѱ�ʹ��',

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
            $msg  = 'ϵͳ����';
        }

        return ['code' => $code, 'msg' => $msg];
    }
}
