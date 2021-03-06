<?php
namespace ez\core;

/**
 * 日志类
 * 
 * @author lxj
 */
class Log
{
    /**
     * 错误日志添加
     * 
     * @param string $errormsg 错误信息
     * 
     * @access public
     */
    public static function addLog($msg)
    {
        self::write($msg);
    }
    
    /**
     * 生成日志目录及文件
     * 
     * @access public
     */
    public static function makeDir()
    {
        $runtimePath = SITE_PATH . '/../runtime';
        if (!is_dir($runtimePath)) {
            mkdir($pathname, 0777, TRUE) || 0;
        }
        
        $todayLogPath = SITE_PATH . '/../runtime/logs/' . date('Ym');
        if (!is_dir($todayLogPath)) {
            mkdir($todayLogPath, 0777, TRUE) || 0;
        }
    }
    
    /**
     * 写入操作
     * 
     * @access private
     */
    private static function write($msg)
    {
        self::makeDir();
//        error_log(date('Y-m-d H:i:s ') . $msg . '\r\n',
//                3, 
//                SITE_PATH . '/../runtime/logs/' . date('Ym') . '/' . date('Ymd') . '.log');
        file_put_contents(SITE_PATH . '/../runtime/logs/' . date('Ym') . '/' . date('Ymd') . '.log', 
                date('Y-m-d H:i:s ') . $msg . '\r\n',
                FILE_APPEND);
    }
}

