<?php

require_once "../../app/config/config.php";
require_once "../../core/DB.php";

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
        $content = false;
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
                case "migration":
                    createMigration($name);
                    break;
                case "destroy":
                    dropTables($name);
                    break;
                default;
                    print_m("error", "Sintax error in option '{$type}'");
                    exit();
            }
            if ($content) {

                $file = fopen($ruta . $name . ".php", "w+");
                if (fwrite($file, $content)) {
                    print_m("success", "{$msg} created successfully");
                } else {
                    print_m("error", "{$msg} error to create");
                }
            }
        } else {
            print_m("error", "Error of sintax '{$action}', check that!");
        }
    } else {
        print_m("error", "Error of sintax number params, check that!");
    }
} else {
    echo "Error de entorno de ejecución.";
}

function createMigration($name)
{
    $msg = "Migration";
    $ruta = "../../app/database/{$name}.sql";
    if (file_exists($ruta)) {
        $content = file_get_contents($ruta);
        if (DB::query($content)) {
            print_m("success", "{$msg} executed successfully. \n");
        } else {
            print_m("error", "Error, {$msg} not completed. ");
        }
    } else {
        print_m("error", "Error, file or database '{$name}' not found.");
    }
}

function dropTables($name)
{
    $msg = "Tables";
    $result = true;
    if ($name == "all") {
        foreach (DB::select("show tables") as $table) {
            $table = array_values((array)$table);
            $table = reset($table);
            if (!DB::query("drop table {$table}")) {
                $result  = false;
            }
        }
    } else {
        $msg = "Table";
        try {
            if (!DB::query("drop table {$name}")) {
                $result  = false;
            }
        } catch (PDOException $e) {
            $result  = false;
        }
    }
    if ($result) {
        print_m("success", "{$msg} deleted successfully.");
    } else {
        print_m("error", "Error, {$msg} not deleted. ");
    }
}
