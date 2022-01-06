<?php 
 require_once 'model/model.php';
 class controller{
    
    function index(){
        $Model = new model();
        $datas = $Model->getAllUsers();
        require_once('view/index.php');
    }

     public function add(){
        require_once 'view/add.php';
        if(isset($_POST['txtten'])){
            $ten = $_POST['txtten'];
           
            $tc = $_POST['txttc'];
            $lt = $_POST['txtlt'];
            $bt= $_POST['txtbt'];
            $th = $_POST['txtth'];
            $tuhoc = $_POST['txttuhoc'];
           
            $model = new model();
            $result = $model->add($ten,$tc,$lt,$bt,$th,$tuhoc);
           
            if($result)
            header("location:index.php");
            else
            header("error.php");
        }

     }
     function edit(){
        $model = new model();
        $id = $_GET['id'];
        $data = $model->getUser($id);
        require_once('view/edit.php');
        if(isset($_POST['txtten'])){
            $ten = $_POST['txtten'];
           
            $tc = $_POST['txttc'];
            $lt = $_POST['txtlt'];
            $bt= $_POST['txtbt'];
            $th = $_POST['txtth'];
            $tuhoc = $_POST['txttuhoc'];
           
            $model = new model();
            $result = $model->update($id,$ten,$tc,$lt,$bt,$th,$tuhoc);
           
            if($result)
            header("location:index.php");
            else
            header("error.php");
        
        }
    }
    function delete(){
        $model = new model;
        $id = $_GET['id'];
        $result = $model->delete($id);
        if($result)
            header("location:index.php");
            else
            header("error.php");
    }
    function detail(){
            
        $model = new model();
        $id = $_GET['id'];
        $data = $model->getUser($id);
        require_once('view/details.php');
        
    }
 }
 ?>