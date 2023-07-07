<?php
class DepartmentController extends Controller
{
    public $dept;
    public function __construct()
    {
        parent::__construct();
        $this->dept = $this->loadModel('department');
    }
    public function index()
    {
        // $ddata=$this->dept->all();
        // $this->load->view("department.index",compact('ddata'));
        $this->load->view("department.index", ['data' => $this->dept->all()]);
    }
    public function create()
    {
        if (!Session::get('logindtl')) {
            redirect('/');
            exit;
        }
        $this->load->view("department.create");
    }
    public function store()
    {

        if (!Session::get('logindtl')) {
            redirect('/');
            exit;
        }
        $info = [
            'name' => request('name'),
            'description' => request('description'),
        ];
        if ($this->dept->create($info)) {
            Session::set("gmsg", "Data saved Successfully");
            redirect("department");
        }
        redirect("department/create");
    }
    public function edit($id)
    {

        if (!Session::get('logindtl')) {
            redirect('/');
            exit;
        }
        $info = $this->dept->find($id);
        // $this->load->info=$info;
        $this->load->view("department.edit", compact('info'));
    }
    public function update($id)
    {

        if (!Session::get('logindtl')) {
            redirect('/');
            exit;
        }
        $info = [
            'name' => request('name'),
            'description' => request('description'),
        ];
        if ($this->dept->update($info, $id)) {
            Session::set("gmsg", "Data updated Successfully");
            redirect("department");
        }
        redirect("department/edit/$id");
    }
    public function destroy($id)
    {

        if (!Session::get('logindtl')) {
            redirect('/');
            exit;
        }
        if ($this->dept->delete($id)) {
            Session::set("gmsg", "Data deleted Successfully");
        } else {
            Session::set("emsg", "Something went wrong to delete!");
        }
        redirect("department");
    }
}
