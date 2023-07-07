<?php
class DoctorController extends Controller
{
    public $doctor, $dept;
    public function __construct()
    {
        parent::__construct();
        if (!Session::get('logindtl')) {
            redirect('/');
            exit;
        }
        $this->doctor = $this->loadModel('doctors');
        $this->dept = $this->loadModel('department');
    }

    public function index()
    {
        // $this->load->view("doctor.index",compact('ddata'));
        $this->load->view("doctor.index", ['data' => $this->doctor->hasdept()]);
    }
    public function create()
    {
        $alldept = $this->dept->all(['id', 'name'], ['name', 'asc']);
        $this->load->view("doctor.create", compact('alldept'));
    }
    public function checkname()
    {
        $info = $this->doctor->fetchName();
        $this->load->view("doctor.checkname", compact('info'),0);
    }
    
    public function store()
    {

        $info = [
            'name' => request('name'),
            'department_id' => request('department_id'),
            'gender' => request('gender'),
            "quali" => request("quali"),
            "exp" => request("exp"),
            "spec" => request("spec"),
            "address" => request("address"),
            'photo' => uploadfile('photo', ['jpeg', 'png', 'jpg', 'gif'])
        ];
        if ($this->doctor->create($info)) {
            Session::set("gmsg", "Data saved Successfully");
            redirect("doctor");
        }
        redirect("doctor/create");
    }
    public function edit($id)
    {
        $info = $this->doctor->find($id);
        // $this->load->info=$info;
        $this->load->view("doctor.edit", compact('info'));
    }
    public function update($id)
    {
        $info = [
            'name' => request('name'),
            'description' => request('description'),
        ];
        if ($this->doctor->update($info, $id)) {
            Session::set("gmsg", "Data updated Successfully");
            redirect("doctor");
        }
        redirect("doctor/edit/$id");
    }
    public function destroy($id)
    {
        if ($this->doctor->delete($id)) {
            Session::set("gmsg", "Data deleted Successfully");
        } else {
            Session::set("emsg", "Something went wrong to delete!");
        }
        redirect("doctor");
    }
}
