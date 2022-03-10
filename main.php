<?php
require_once("./functions.php");

function entrypoint($event, $context) {
    $a = (int)$event['data']['a'];
    $b = (int)$event['data']['b'];

    echo "Hello from my git repository!\n";
    echo "Calculating with numbers '$a' and '$b'.\n";
    echo "…\n";

    return [
        'secret_text' => 'This text contains some ' . $_ENV['my_secret'] . ' content.',
        'status' => 200,
        'response_headers' => [
            'x-calculation-param-1' => $a,
            'x-calculation-param-2' => $b,
        ],
        'data' => [
            'sum' => add($a, $b),
            'difference' => subtract($a, $b),
            'product' => multiply($a, $b),
            'quotient' => devide($a, $b),
        ],
        'context' => $context,
        'event' => $event
    ];
}

