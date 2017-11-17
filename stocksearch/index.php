<?php
header("Access-Control-Allow-Origin: *");
if(isset($_GET["stork"])) {
    $url = "http://dev.markitondemand.com/MODApis/Api/v2/Lookup/json?input=" . $_GET["stork"];
    $json = file_get_contents($url);
    $json_decode = json_decode($json);
    foreach ($json_decode as $lookup) {
        $arr[$lookup->{'Symbol'}] = $lookup;
    }
    $json = json_encode($arr);
    echo "{$_GET['json1callback']}({$json})";
}

if(isset($_GET["symbolValue"])) {
    $quoteURL = "http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=".$_GET["symbolValue"];
    $sjson = file_get_contents($quoteURL);
    echo $sjson;
}

if(isset($_GET["chartValue"])) {
    $chartURL = "http://dev.markitondemand.com/MODApis/Api/v2/InteractiveChart/json?parameters="."{\"Normalized\":false,\"NumberOfDays\":1095,\"DataPeriod\":\"Day\",\"Elements\":[{\"Symbol\":\"".$_GET["chartValue"]."\",\"Type\":\"price\",\"Params\":[\"ohlc\"]}]}";
    $chjson = file_get_contents($chartURL);
    echo $chjson;
}

if (isset($_GET["bingValue"])) {
    $accountKey = "qJRCdLsCM5SityLd0erwfGM8E2vt0GnETJV+zkKH6Lc";
    $WebSearchURL =  "https://api.datamarket.azure.com/Bing/Search/v1/News?Query=%27".$_GET["bingValue"]."%27&\$format=json";
    $context = stream_context_create(array(
        'http' => array(
            'request_fulluri' => true,
            'header'  => "Authorization: Basic " . base64_encode($accountKey . ":" . $accountKey)
        )
    ));
    $bjson = file_get_contents($WebSearchURL, 0, $context);
    echo $bjson;
}
?>