    <?php 
class Autoload{
    function __construct()
    {
        Session::init();
        $robj=request();
        $controller= $robj->controller;
        $method=$robj->method;
        $para = $robj->para;
        $path= "app/controllers/$controller.php";
        if(file_exists($path)){
            include_once $path;
            $cobj= new $controller();
            if(method_exists($cobj,$method)){
                 $cobj->$method($para);
            }
            else
                echo "404 method not found";
        }else{
            echo "404 file not found";
        }
    }
}