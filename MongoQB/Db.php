<?php

namespace MongoQB;

use \MongoQB\Config as DbConfig;
use \MongoQB\Builder as QBBuilder;
use Exception;

/**
 * 数据库类
 */
class Db
{
    /**
     * 实例数组
     *
     * @var array
     */
    protected static $instance = array();

    /**
     * 获取实例
     *
     * @param string $config_name
     * @return DbConnection
     * @throws Exception
     */
    public static function instance($config_name)
    {
        if (!isset(DbConfig::$$config_name)) {
            echo "\\Config\\Db::$config_name not set\n";
            throw new Exception("\\Config\\Db::$config_name not set\n");
        }

        if (empty(self::$instance[$config_name])) {
            $config                       = DbConfig::$$config_name;
            $dsn = 'mongodb://'.($config['auth']?($config['username'].':'.$config['password'].'@'):'').$config['host'].':'.$config['port'].'/'.$config['dbname'];
            echo $dsn;
            self::$instance[$config_name] = new QBBuilder(array(
                'dsn'   =>  $dsn
            ));
        }
        return self::$instance[$config_name];
    }
}
