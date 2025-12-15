<?php 

function Not_found()
{
    http_response_code(404);

    echo "404 not found";
}

