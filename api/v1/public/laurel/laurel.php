<?php

function print_m($type, $mensaje)
{
    if ($type == "success") {
        print("\e[0;32m$mensaje\e[0m");
    } else {
        print("\e[0;31m$mensaje\e[0m");
    }
}

if (php_sapi_name() == "cli") {
    if ($argc == 3) {
        $ruta = "";
        $msg = "";
        $request = explode(":", $argv[1]);
        $action = $request[0];
        $type = $request[1];
        $name = $argv[2];
        if ($action == "make") {

            switch ($type) {
                case "model":
                    $msg = "Model";
                    $ruta = "../../app/models/";
                    $content = file_get_contents("template_model.txt");
                    $content = str_replace(":model:", $name, $content);
                    break;
                case "service":
                    $msg = "Service";
                    $ruta = "../../app/services/";
                    $content = file_get_contents("template_service.txt");
                    $content = str_replace(":class:", $name, $content);
                    break;
                case "contract":
                    $msg = "Contract";
                    $ruta = "../../app/contracts/";
                    $content = file_get_contents("template_contract.txt");
                    $content = str_replace(":contract:", $name, $content);
                    break;
                default;
                    print_m("error", "Sintax error in option '{$type}'");
                    exit();
            }
            $file = fopen($ruta . $name . ".php", "w+");
            if (fwrite($file, $content)) {
                print_m("success", "{$msg} created successfully");
            } else {
                print_m("error", "{$msg} error to create");
            }
        } else {
            print_m("error", "Error of sintax '{$action}', check that!");
        }
    } else {
        print_m("error", "Error of sintax number params, check that!");
    }
} else {
    echo "Error de entorno de ejecución";
}
