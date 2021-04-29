<?php

// https://loadfunc.github.io/php/load_func.php

function load_func(array $func_url_array, $callback)
{
    $local_path = '';
    foreach ($func_url_array as $func_url) {
        $file_name = basename($func_url);
//        var_dump($func_name);
        $path = $local_path . $file_name;
        //    var_dump(!file_exists($path));
        //    die;

        // download if not exist
        if (!file_exists($path)) {
            $out = fopen($path, "wb");
            if ($out == FALSE) {
                print "File not opened<br>";
                exit;
            }

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_FILE, $out);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_URL, $func_url);

            curl_exec($ch);
            echo "<br>Error is : " . curl_error($ch);

            curl_close($ch);
            //fclose($handle);
        }
        //    if(!@include($path)) throw new Exception("Failed to include 'script.php'");
        // include
        include_once($path);
    }

    return $callback($func_url_array);
}

/**
 * https://loadfunc.github.io/php/load_func.php
 * Class LetJson
 */
class LoadFunc
{
    // IN
    public $func_url_array = [];

    // OUT
    public $val;


    /**
     * LetPhp constructor.
     * @param string $url
     * @param $func_name
     * @param $func_args
     */
    public function __construct(array $func_url_array)
    {
        $this->func_url_array = $func_url_array;
    }


    public function exec()
    {
        $local_path = '';
        foreach ($this->func_url_array as $func_url) {
            $file_name = basename($func_url);
//        var_dump($func_name);
            $path = $local_path . $file_name;
            //    var_dump(!file_exists($path));
            //    die;

            // download if not exist
            if (!file_exists($path)) {
                $out = fopen($path, "wb");
                if ($out == FALSE) {
                    print "File not opened<br>";
                    exit;
                }

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_FILE, $out);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_URL, $func_url);

                curl_exec($ch);
                echo "<br>Error is : " . curl_error($ch);

                curl_close($ch);
                //fclose($handle);
            }
            //    if(!@include($path)) throw new Exception("Failed to include 'script.php'");
            // include
            include_once($path);
        }

//        return $callback($func_url_array);
        return $this->val = $this->func_url_array;
    }

    /*
        public function __toString()
        {
            try
            {
                return (string) $this->val;
            }
            catch (Exception $exception)
            {
                return '';
            }
        }
    */

    function each($callback)
    {
        foreach ($this->val as $item) {
            $callback($item);
        }
    }
}
