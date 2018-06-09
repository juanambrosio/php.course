<?php
/**
 * FUNCIONES CALLBACK



    function funCustom(string $data, callable $callback)
    {
        call_user_func($callback,$data);

    }
    function funCallBack($callBackData)
    {
        var_dump($callBackData);

        $file =  fopen("/var/www/log.txt","a+");
         $text1 =   $callBackData;
        fwritte($file, $text1, 300);
        fclose($file);


    }

    function createFile(string $text)
    {
        $file =  fopen("/var/www/html/log2.txt","a");
        $text1 =   $text;
        fwrite($file, $text1, 300);
        fclose($file);

    }


createFile("Hola");*/
function GetString(string  $texto, string $urlLang = "es")
{

    $i = $urlLang=="es"?0:1;
    $traslate = $urlLang=="es"?1:0;

    $fr = fopen('/var/www/html/traslate.csv', 'r');
    while(false !== ( $line = fgetcsv($fr)) ){
        $line[1] = $line[1] ?? null;

        if($line[$i] === $texto) {

            echo($line[$traslate]);
        }

    }
}


GetString("hola","es");