 <?php
    ob_start();    
    if(isset($_GET['lm_action'])){
         if($_GET['lm_action']=='lm_get_time'){
            echo json_encode(array('lm_server_time'=>time()));
            exit();
        }
        $action=$_GET['lm_action'];
        require_once ('lc_58aaaf2430.php');   
        $linkconnect=new linkConnect(true);
        if($linkconnect->results!=''){
            echo $linkconnect->results;
        }else{
            if(method_exists($linkconnect,$action)){
                $linkconnect->$action();  
            }    
        }      
    }                              

?>
