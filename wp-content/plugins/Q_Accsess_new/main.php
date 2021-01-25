<?php
/**
 * 
 * @version 1.0.0
 */
/*
Plugin Name: Question Ans Feedback NEW
Plugin URI: 
Description: This is a Question ans form
Author: Pratap
Version: 2.0.0
Author URI:
*/



if(! defined('ABSPATH')){
    die;
}

class New_Question{


    function _construct(){

    }


    function feed_back(){

        global $wpdb;
        $data=$wpdb->get_results("select  * from oralhalsa_se.www_questions ");
        $total=(count($data));
        $temp_Script='<script>';

    for($i=0;$i<$total-2;$i++){
        $temp_Script.=' function submit'.$i.'(){  var loopvar = document.getElementsByName("Question'.$i.'"); ';
        $temp_Script.='for (i = 0; i < loopvar.length; i++) {
        if (loopvar[i].checked) {
        value_'.$i.' = loopvar[i].value;
       
        }
    }
        if (typeof value_'.$i.' === \'undefined\') { 
           
        }  else {
            document.getElementById("div'.$i.'").style.display ="none";
            document.getElementById("div'. ($i+ 1 ).'").style.display ="";
            
        
         }



        }
    ';
    }
    $temp_Script.='function submit12(){
        var loopvar = document.getElementsByName("Question12");
        for (i = 0; i < loopvar.length; i++) {
            if (loopvar[i].checked) {
            value_12 = loopvar[i].value;
           
            }
        }
            if (typeof value_12 === \'undefined\') { 
               
            }  else {
                document.getElementById("div12").style.display ="none";
                document.getElementById("div13").style.display ="";
                temp= Math.min(parseInt(value_0),parseInt(value_1),parseInt(value_2),parseInt(value_3),parseInt(value_4),parseInt(value_5),parseInt(value_6),parseInt(value_7));
                second=String.fromCharCode(temp+64);
                temp=Math.min(parseInt(value_8),parseInt(value_9),parseInt(value_10),parseInt(value_11),parseInt(value_11));;
                second_min=temp;
                temp=parseInt(value_12);
                if(temp<2){
                    temp="Lokaliserad (<30% av tänderna)";
                }else{
                    temp="Generaliserad eller molar/incisiv-mönster";
                }

                // Dummy Part 

                var dummy=0;
                if(dummy>0){
                    dummy_val="Dummy 1";
                }else{
                    dummy_val="Dummy 2";
                }

                document.getElementById("div13").innerHTML =\'<h3>Selections </h3>  <table > <tr> <th>Page</th> <th>Ans</th> </tr> <tr> <td>First</td> <td>\'+temp+\'</td> </tr> <tr> <td>Second</td> <td>\'+second+\'</td> </tr> <tr> <td>Third</td> <td>\'+second_min+\'</td> </tr> <tr> <td>Forth</td> <td>\'+dummy_val+\'</td> </tr> </table>\';     

            
             }

    }';

    $temp_Script.='</script>';

        $form= '<div class="container">';
            
            for($i=0;$i<sizeof($data)-1;$i++){
                if($i<1){
                $form.='<div id="div'.$i.'" style="display:"> 
                <label for="question_one"> <h6>'.$i+1 .'. '. base64_decode($data[$i]->ques_desc) .' </h6> </label><br>';
                }else{
                    $form.='<div id="div'.$i.'" style="display:none"> 
                <label for="question_one"> <h6>'.$i+1 .'. '. base64_decode($data[$i]->ques_desc) .' </h6> </label><br>';
                }
                $data2=$wpdb->get_results("select  * from oralhalsa_se.www_ques_answer where ques_id = ". $data[$i]->ques_id ."");
                for($j=0;$j<sizeof($data2);$j++){
                    
                    $form.='('. $j+1 .')    <input type="radio" name="Question'. $i .'" value="'.$j+1 .'" >'. base64_decode( $data2[$j]->ans_desc) .'<br>';
                }
                $form.='<button onclick="submit'.$i.'()">Next</button></div>';
               
            }
        $form.='<div id="div13"></div></div>';
        return $temp_Script.$form;
    }

    function activate(){
        
        
        flush_rewrite_rules( );
    }

    function deactivate(){
        
        flush_rewrite_rules( );
    }

    
    

    


    function enqueue(){
    }
    
}



if( class_exists('New_Question')){

    $Question=new New_Question();
    add_shortcode("feed_back",array($Question,'feed_back'));
}

//activation 
register_activation_hook(__FILE__, array($Question,'activate') );
 //deactivation
register_deactivation_hook( __FILE__, array($Question,'deactivate') );
//uninstall

?>