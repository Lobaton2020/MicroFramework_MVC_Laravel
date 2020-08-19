<?php
function httpResponse($code = 200, $type = "ok", $message = null, $datos = null)
{
    $data["type"] = !isset($type) ? "ok" : $type;
    $data["message"] = !isset($message) ? "All right, that's good" : $message;
    if (gettype($code) == "array") {
        $data["data"] = $code;
        $code = 200;
    }
    if ($datos != null) {
        $data["data"] = $datos;
    }
    $data["status"] = $code;
    http_response_code($code);
    return new JSON($data);
}
