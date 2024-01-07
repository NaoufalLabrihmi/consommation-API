<?php
function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
}

  function redirect($page){
    header('Location:'.URLROOT.$page);

}