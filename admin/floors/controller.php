
<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){


		if ( $_POST['Floor'] == "" ) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$Floor = New Floor();
			$Floor->CATEGORIES	= $_POST['Floor'];
			$Floor->create();

			message("New [". $_POST['Floor'] ."] created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){

			$Floor = New Floor();
			$Floor->CATEGORIES	= $_POST['Floor'];
			$Floor->update($_POST['FLOORNUMBER']);

			message("[". $_POST['Floor'] ."] has been updated!", "success");
			redirect("index.php");
		}

	}


	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$Floor = New Floor();
			$Floor->delete($id);

			message("Floor already Deleted!","info");
			redirect('index.php');

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$Floor = New Floor();
		// 	$Floor->delete($id[$i]);

		// 	message("Floor already Deleted!","info");
		// 	redirect('index.php');
		// }
		// }
		
	}
?>