<?php
function httpResponse($code = 200, $type = "ok", $message = null, $datos = null)
{
    $data = [
        "type" => "ok",
        "status" => 200,
        "message" => !isset($message) ? "All right, that's good" : $message,
        "data" => false,
    ];

    if ($datos != null) {
        $data["data"] = $datos;
    }
    if (gettype($code) == "array") {
        $data["data"] = $code;
        $code = 200;
    }
    if (gettype($type) == "array") {
        $data = array_merge($data, $type);
        $type = "ok";
    }
    if (gettype($type) == "string") {
        $data["type"] = $type;
    }
    $data["status"] = $code;
    http_response_code($code);
    return new JSON($data);
}
