<?php
class Doctors extends Model
{
    public function hasdept()
    {
        $query = "select doctors.id as id,doctors.name as name,department.name as department_name,department_id,gender,quali,exp,exp,spec,address,photo from $this->table left join department on doctors.department_id=department.id order by id desc";
        return $this->runSql($query);
    }
    public function fetchName()
    {
        $name = request('name');
        $query = "select * from $this->table where name='$name'";
        return count($this->runSql($query));
    }
}
