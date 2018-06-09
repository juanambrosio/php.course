<?php

    $urlLang= $_GET["lang"];
    $lang= "\"$urlLang\"";
    $title="HOLA MUNDO";
    $dictionary  = array(
            "en" => array(
                "text"=>"text"
            ),
            "es" => array(
            "text"=>"texto"
            )
    );

/**
 * @param string $texto
 * @param string $urlLang
 * @return string
 */
function GetString(string  $texto, string $urlLang = "es"):string
{

    $i = $urlLang=="en"?0:1;
    $traslate = $urlLang=="en"?1:0;
    $res=$texto;

    $fr = fopen('/var/www/html/traslate.csv', 'r');
    while(false !== ( $line = fgetcsv($fr)) ){
        $line[1] = $line[1] ?? null;

        if($line[$i] === $texto) {

            $res=($line[$traslate]);
        }

    }

    return $res;
}

    function traslate(string $text, string $urlLang = "es"): string
    {
        global $dictionary;
        if(array_key_exists($urlLang,$dictionary))
        {
            if(array_key_exists($text,$dictionary[$urlLang]))
            {
                return $dictionary[$urlLang][$text];
            }
            else
                {
                    return $text;
                }
        }
       else
           {
               return $text;
           }
    }
?>
<!doctype html>

<html lang=<?php echo $lang ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
<h1>
<?php
  //  echo traslate("text",$urlLang);

 echo GetString("hola",$urlLang);

?>
</h1>
</body>
</html>

