<?php
/**
 * 
 * @version 1.0.0
 */
/*
Plugin Name: Question Ans form
Plugin URI: www.google.com
Description: This is a Question ans form
Author: Pratap
Version: 1.0.0
Author URI: www.google.com
*/



if(! defined('ABSPATH')){
    die;
}




class Question {
    

    function __construct(){
        
    }

    function main_form(){
        global $wpdb;
        $data=$wpdb->get_results("select  * from oralhalsa_se.www_questions Limit 8  ");
        $data3=$wpdb->get_results("select  * from oralhalsa_se.www_questions limit 8 offset 8  ");
        

$html='<body>
    <div class="container">
        <div class="form_one" id="one">
            <h3>Choose One (1)</h3>
            <form id="first_form" name="first_form">
                <input type="radio" id="general" name="first_Val" value="General">
                <label for="general">General</label><br>
                <input type="radio" id="cronic" name="first_Val" value="Cronic">
                <label for="cronic">Cronic</label><br>

            </form>
            <button onclick=getfirstval()>Next</button>

        </div>
        <div class="form_two" id="two" style="display:none ;">
            <h3>Choose From Each Section (2)</h3>
            <form id="two_form" name="two_form">';
            $second_form= '';
            
            for($i=0;$i<sizeof($data);$i++){
                $second_form.='<label for="question_one"> <h6>'.$i+1 .'. '. base64_decode($data[$i]->ques_desc) .' </h6> </label><br>';
                $data2=$wpdb->get_results("select  * from oralhalsa_se.www_ques_answer where ques_id = ". $data[$i]->ques_id ."");
                for($j=0;$j<sizeof($data2);$j++){
                    
                    $second_form.='('. $j+1 .')    <input type="radio" name="Question'. $i .'" value="'.$j+1 .'" >'. base64_decode( $data2[$j]->ans_desc) .'   <br>';
                }
            }
            /*dynamic js hasto add*/
            
            /*'
                <label for="question_one">1. Dunmmy Question</label><br>
                Option 1
                <input type="radio" name="question1" value=1>
                Option 2
                <input type="radio" name="question1" value=2>
                Option 3
                <input type="radio" name="question1" value=3><br><br>
                <label for="question_two">2. Dunmmy Question</label><br>
                Option 1
                <input type="radio" name="question2" value=1>
                Option 2
                <input type="radio" name="question2" value=2>
                Option 3
                <input type="radio" name="question2" value=3>
                <br><br>
                <label for="question_three">3. Dunmmy Question</label><br>
                Option 1
                <input type="radio" name="question3" value=1>
                Option 2
                <input type="radio" name="question3" value=2>
                Option 3
                <input type="radio" name="question3" value=3>

            
';*/

$temp='
</form><br>
            <button onclick=getsecond()>Next</button>
        </div>

        <div class="form_three" id="three" style="display:none ;">
            <h3>Choose From Each Section (3)</h3>
            <form id="three_form" name="three_form">
                ';

                $third_form='';
                for($i=0;$i<sizeof($data3);$i++){
                    $third_form.='<label for="question_one"> <h6>'.$i+1 .'. '. base64_decode($data3[$i]->ques_desc) .' </h6> </label><br>';
                    $data4=$wpdb->get_results("select * from oralhalsa_se.www_ques_answer where ques_id = ". $data3[$i]->ques_id ." ");
                    for($j=0;$j<sizeof($data4);$j++){
                        
                        $third_form.='('. $j+1 .')    <input type="radio" name="Question'. $i+8 .'" value="'.$j+1 .'" >'. base64_decode( $data4[$j]->ans_desc) .'   <br>';
                    }
                }
            
$temp2='
            </form><br>
            <button onclick=getthird()>Next</button>


        </div>

        <div class="form_four" id="four" style="display: none;">

            
            <div id="display">
           
           
            </div>
        </div>

    </div>
</body>';

$script1= '
        <style>
    table, th, td {
  border: 1px solid ;
}
</style>
<script>


    /*function on_load(){
        document.getElementById("one").style.display = "";
        document.getElementById("two").style.display = "none";
        document.getElementById("three").style.display = "none";
        document.getElementById("four").style.display = "none";
        
    }*/
    function getfirstval() {
        var loopvar = document.getElementsByName("first_Val");
        for (i = 0; i < loopvar.length; i++) {
            if (loopvar[i].checked) {
                first_Value = loopvar[i].value;
            }

        }
        if (typeof first_Value === \'undefined\') { 
                   }  else {
            document.getElementById("two").style.display = "";
            document.getElementById("one").style.display = "none";
        }
    }
';



$temp_Script='
';

    for($i=0;$i<8;$i++){
        $temp_Script.='var loopvar = document.getElementsByName("Question'.$i.'");';
        $temp_Script.='for (i = 0; i < loopvar.length; i++) {
    if (loopvar[i].checked) {
        second_'.$i.' = loopvar[i].value;
       
    }

}';
    }

   $temp_Script2='';
   $temp_min_1='';
   for($i=1;$i<8;$i++){
       $temp_Script2.='|| typeof second_'.$i.' === \'undefined\' ';
       
   } 
   for($i=0;$i<8;$i++){
       $temp_min_1.='parseInt(second_'.$i.'),';
   }

$script2='
    function getsecond() {



       '.$temp_Script.'

        if ( typeof second_0 === \'undefined\''.$temp_Script2 .') {
            
        } else {
            first_min=String.fromCharCode(Math.min('.$temp_min_1.')+64);
            document.getElementById("two").style.display = "none";
            document.getElementById("one").style.display = "none";
            document.getElementById("three").style.display = "";
            //alert(String.fromCharCode(first_min+64));
          
        }
    }
';



$temp_Script3='
';

    for($i=8;$i<15;$i++){
        $temp_Script3.='var loopvar = document.getElementsByName("Question'.$i.'");';
        $temp_Script3.='for (i = 0; i < loopvar.length; i++) {
    if (loopvar[i].checked) {
        second_'.$i.' = loopvar[i].value;
       
    }

}';
    }

   $temp_Script4='';
   for($i=9;$i<14;$i++){
       $temp_Script4.='|| typeof second_'.$i.' === \'undefined\' ';
   } 
   $temp_min_2='';
   for($i=8;$i<14;$i++){
    $temp_min_2.='parseInt(second_'.$i.'),';
}
$script3='
    function getthird() {
        '.$temp_Script3.'

        if (typeof second_8 === \'undefined\''.$temp_Script4 .') {
        } else {
            second_min=Math.min('.$temp_min_2.');
            document.getElementById("two").style.display = "none";
            document.getElementById("one").style.display = "none";
            document.getElementById("three").style.display = "none";
            document.getElementById("four").style.display = "";
            
            document.getElementById("display").innerHTML =\'<h3>Selections </h3>  <table > <tr> <th>Page</th> <th>Ans</th> </tr> <tr> <td>First</td> <td>\'+first_Value+\'</td> </tr> <tr> <td>Second</td> <td>\'+first_min+\'</td> </tr> <tr> <td>Third</td> <td>\'+second_min+\'</td> </tr> </table>\';     
        }
    }';
    $script_last='

</script>';

return $script1.$script2.$script3.$script_last.$html.$second_form.$temp.$third_form.$temp2;
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

if( class_exists('Question')){

    $Question=new Question();
    add_shortcode("ques",array($Question,'main_form'));
}

//activation 
register_activation_hook(__FILE__, array($Question,'activate') );
 //deactivation
register_deactivation_hook( __FILE__, array($Question,'deactivate') );
//uninstall