<?php
    session_start();
    $_GET["fruta"]=strtolower($_GET["fruta"]);
    $_GET["fruta"] = ucfirst($_GET["fruta"]);
    if(!empty($_SESSION["frutas"])){
        if(in_array(''.$_GET["fruta"].'', $_SESSION["frutas"])){
            echo'<div class="msg1">Fruta Já Cadastrada</div>
            <hr />
            <div name="frutas">
                 <ul>';
                     for($i=0;$i<sizeof($_SESSION["frutas"]);$i++){
                            $frutas[$i]=$_SESSION["frutas"][$i];
                            echo'
                                <li>'.$frutas[$i].'</li>
                            ';
                        
                     }
                     echo'</ul>
             </div> 
        '; 
        }
        else{
            $_SESSION["frutas"][]=$_GET["fruta"];
            echo'
             <div class="msg2">Nova fruta cadastrada!</div>
             <hr />
             <div name="frutas">
                 <ul>';
                     for($i=0;$i<sizeof($_SESSION["frutas"]);$i++){
                            $frutas[$i]=$_SESSION["frutas"][$i];
                            echo'
                                <li>'.$frutas[$i].'</li>
                            ';
                        
                     }
                     echo'</ul>
             </div> 

        '; 
        }  
    }else{
        $_SESSION["frutas"][]=$_GET["fruta"];
        echo'<hr />
        <div name="frutas">
            <ul>';
                for($i=0;$i<sizeof($_SESSION["frutas"]);$i++){
                       $frutas[$i]=$_SESSION["frutas"][$i];
                       echo'
                           <li>'.$frutas[$i].'</li>
                       ';
                   
                }
                echo'</ul>
        </div> 
       ';
    }
        
    
?>