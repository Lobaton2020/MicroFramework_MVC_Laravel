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
        switch ($type) {
            case "model":
                $msg = "Model";
                $ruta = "../../app/models/";
                $content = file_get_contents("template_model.txt");
                $content = str_replace(":model:", $name, $content);
                break;
            case "controller":
                $ruta = "../../app/controllers/";
                $msg = "Controller";
                $content = file_get_contents("template_controller.txt");
                $content = str_replace(":class:", $name, $content);
                break;
            default;
                print_m("error", "Sintax error in type options");
                exit();
        }
        $file = fopen($ruta . $name . ".php", "w+");
        if (fwrite($file, $content)) {
            print_m("success", "{$msg} created successfully");
        } else {
            print_m("error", "{$msg} error to create");
        }
    } else {
        print_m("error", "Error of sintax, check that!");
    }
} else {
    echo "Error de entorno de ejecución";
}
