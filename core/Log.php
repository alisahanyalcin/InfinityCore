<?php

namespace InfinityCore\Core;

use DateTime;

class Log
{
    //TODO: create a config class and implement a config values like log path, default time zone, etc.

    # @string, Log directory name
    private string $path = '/application/logs/';

    public function __construct()
    {
        date_default_timezone_set('Europe/Istanbul'); # Set default timezone
        $this->path = dirname(__DIR__)  . $this->path; # Set path
    }

    /**
     * Writes the log and returns the exception
     *
     * @param string $message
     * @param string $sql
     *
     * @return string
     */
    public function ExceptionLog(string $message, string $sql = ""): string
    {
        $exception = 'Unhandled Exception. <br />';
        $exception .= $message;
        $exception .= "<br /> You can find the error back in the log.";

        if (!empty($sql)) {
            # Add the Raw SQL to the Log
            $message .= "\r\nRaw SQL : " . $sql;
        }
        # Write into log
        $this->write($message);
        return $exception;
    }

    /**
     * @param string $message
     *
     * @return void
     */
    private function write(string $message): void
    {
        $date = new DateTime(); // current date and time
        $logFile = $this->path . $date->format('Y-m-d H-i').".txt"; // log file name

        fopen($logFile, 'a+');// create new log file
        if(is_dir($this->path)) {
            if(!file_exists($logFile)) {
                $file = fopen($logFile, 'a+');// create new log file
                fwrite($file, $date->format('Y-m-d H:i:s') . "\r\n" . $message . "\r\n");// write message
                fclose($file); // close file
            }
            else {
                $this->edit($logFile, $date, $message); // append content to log file
            }
        }
    }

    /**
     * @param string $log
     * @param DateTime $date
     * @param string $message
     *
     * @return void
     */
    private function edit(string $log, DateTime $date, string $message): void
    {
        $logFile = fopen($log, 'a+'); // open log file
        fwrite($logFile, $date->format('Y-m-d H:i:s') . " | " . $message . "\n"); // write message
        fclose($logFile); // close file
    }
}