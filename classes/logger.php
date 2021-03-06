<?php

class Logger {

    /**
     * @var Logger
     */
    private static $instance;

    /**
     * @var bool|Logger_SQL|Logger_Syslog
     */
    private $adapter;

    public static $errornames = array(
        1 => 'E_ERROR',
        2 => 'E_WARNING',
        4 => 'E_PARSE',
        8 => 'E_NOTICE',
        16 => 'E_CORE_ERROR',
        32 => 'E_CORE_WARNING',
        64 => 'E_COMPILE_ERROR',
        128 => 'E_COMPILE_WARNING',
        256 => 'E_USER_ERROR',
        512 => 'E_USER_WARNING',
        1024 => 'E_USER_NOTICE',
        2048 => 'E_STRICT',
        4096 => 'E_RECOVERABLE_ERROR',
        8192 => 'E_DEPRECATED',
        16384 => 'E_USER_DEPRECATED',
        32767 => 'E_ALL');

    public function log_error($errno, $errstr, $file, $line, $context) {
        if ($errno === E_NOTICE) {
            return false;
        }

        if ($this->adapter) {
            return $this->adapter->log_error($errno, $errstr, $file, $line, $context);
        }

        return false;
    }

    public function log($string, $context = "") {
        if ($this->adapter) {
            return $this->adapter->log_error(E_USER_NOTICE, $string, '', 0, $context);
        }

        return false;
    }

    public function __construct() {
        switch (LOG_DESTINATION) {
        case "sql":
            $this->adapter = new Logger_SQL();
            break;
        case "syslog":
            $this->adapter = new Logger_Syslog();
            break;
        default:
            $this->adapter = false;
        }
    }

    public static function get(): Logger {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}
