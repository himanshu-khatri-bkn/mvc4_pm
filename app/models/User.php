<?php
class User extends Model
{
    public function checkLogin()
    {
        $username=request('username');
        $password = md5(request('password'));
        $query = "select * from $this->table where username='$username'";

        $data= $this->runSql($query)[0]??[];
        if($data && $data['password']==$password){
            return $data;
        }else{
            return null;
        }
    }
}
