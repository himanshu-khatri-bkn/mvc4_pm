<?php
function request($key = "")
{
    if(Session::get('logindtl')){
    $robj = (object)['controller' => 'DepartmentController', 'method' => 'index', 'para' => '', 'get' => $_GET, 'post' => $_POST];
    }else{
        $robj = (object)['controller' => 'LoginController', 'method' => 'index', 'para' => '', 'get' => $_GET, 'post' => $_POST];

    }
    if (isset($_GET['url']) && $_GET['url']) {
        $url = explode('/', rtrim($_GET['url'], '/'));
        $robj->controller = ucfirst(strtolower($url[0])) . "Controller";
        $robj->method = $url[1] ?? $robj->method;
        $robj->para = $url[2] ?? $robj->para;
        $robj->method = strtolower($robj->method);
        unset($robj->get['url']);
    }
    if ($key) {
        if (array_key_exists($key, $_POST)) {
            return $_POST[$key];
        }

        if (array_key_exists($key, $_GET)) {
            return $_GET[$key];
        }
        return NULL;
    }
    return $robj;
}
function uploadfile($filekey, $valid = [], $saveto = "public/image/", $oldfilename = "")
{
    if ($_FILES[$filekey]['error'] == 0 or (is_array($_FILES[$filekey]['error']))) { {
            if ((is_array($_FILES[$filekey]['error']))) {
                $files = [];
                $fnames = $_FILES[$filekey]['name'];
                $t = count($fnames);
                for ($i = 0; $i <= $t; $i++) {
                    $ext = substr($fnames[$i], strrpos('.', $fnames[$i]) + 1);
                    if ($valid && in_array($ext, $valid)) {

                        $files[$i] = $saveto . time() . "_$fnames[$i]";
                        if (move_uploaded_file($_FILES[$filekey]['tmp_name'][$i], $files[$i])) {
                            ($oldfilename && file_exists($oldfilename)) ? unlink($oldfilename) : "";
                            return $files;
                        }
                    }
                }
            } else {
                $fname = $_FILES[$filekey]['name'];
                $ext = strtolower(substr($fname, strrpos($fname, ".") + 1));
                if ($valid && in_array($ext, $valid)) {

                    $fname = $saveto . time() . "_$fname";
                    if (move_uploaded_file($_FILES[$filekey]['tmp_name'], $fname)) {
                        ($oldfilename) ? unlink($oldfilename) : "";
                        return $fname;
                    }
                }
            }
        }
        return ($oldfilename) ? $oldfilename : null;
    }
}
