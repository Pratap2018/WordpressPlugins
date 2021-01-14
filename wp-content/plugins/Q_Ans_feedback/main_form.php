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
        return '
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

    function getsecond() {
        var loopvar = document.getElementsByName("question1");
        for (i = 0; i < loopvar.length; i++) {
            if (loopvar[i].checked) {
                second_first = loopvar[i].value;
            }

        }
        var loopvar = document.getElementsByName("question2");
        for (i = 0; i < loopvar.length; i++) {
            if (loopvar[i].checked) {
                second_second = loopvar[i].value;
            }

        }
        var loopvar = document.getElementsByName("question3");
        for (i = 0; i < loopvar.length; i++) {
            if (loopvar[i].checked) {
                second_third = loopvar[i].value;
            }

        }

        if (typeof second_first === \'undefined\' || typeof second_second === \'undefined\' || typeof second_third === \'undefined\') {
        } else {
            second = Math.min(parseInt(second_first), parseInt(second_second), parseInt(second_third));
            document.getElementById("two").style.display = "none";
            document.getElementById("one").style.display = "none";
            document.getElementById("three").style.display = "";
           // alert(second);
        }
    }


    function getthird() {
        var loopvar = document.getElementsByName("question_1");
        for (i = 0; i < loopvar.length; i++) {
            if (loopvar[i].checked) {
                third_first = loopvar[i].value;
            }

        }
        var loopvar = document.getElementsByName("question_2");
        for (i = 0; i < loopvar.length; i++) {
            if (loopvar[i].checked) {
                third_second = loopvar[i].value;
            }

        }
        var loopvar = document.getElementsByName("question_3");
        for (i = 0; i < loopvar.length; i++) {
            if (loopvar[i].checked) {
                third_third = loopvar[i].value;
            }

        }

        if (typeof third_first === \'undefined\' || typeof third_second === \'undefined\' || typeof third_third === \'undefined\') {
        } else {
            third = Math.min(parseInt(third_first), parseInt(third_second), parseInt(third_third));
            document.getElementById("two").style.display = "none";
            document.getElementById("one").style.display = "none";
            document.getElementById("three").style.display = "none";
            document.getElementById("four").style.display = "";
           // alert(third);
            document.getElementById("display").innerHTML =       \'<h1>Four</h1>  <table > <tr> <th>Page</th> <th>Ans</th> </tr> <tr> <td>First</td> <td>\'+first_Value+\'</td> </tr> <tr> <td>Second</td> <td>\'+second+\'</td> </tr> <tr> <td>Third</td> <td>\'+third+\'</td> </tr> </table>\';


        }
    }

</script>

<body>
    <div class="container">
        <div class="form_one" id="one">
            <h1>First</h1>
            <form id="first_form" name="first_form">
                <input type="radio" id="general" name="first_Val" value="General">
                <label for="general">General</label><br>
                <input type="radio" id="cronic" name="first_Val" value="Cronic">
                <label for="cronic">Cronic</label><br>

            </form>
            <button onclick=getfirstval()>Next</button>

        </div>
        <div class="form_two" id="two" style="display: none;">
            <h1>Second</h1>
            <form id="two_form" name="two_form">
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

            </form><br>
            <button onclick=getsecond()>Next</button>

        </div>

        <div class="form_three" id="three" style="display: none;">
            <h1>Three</h1>
            <form id="three_form" name="three_form">
                <label for="question_one">1. Dunmmy Question</label><br>
                Option 1
                <input type="radio" name="question_1" value=1>
                Option 2
                <input type="radio" name="question_1" value=2>
                Option 3
                <input type="radio" name="question_1" value=3><br><br>
                <label for="question_two">2. Dunmmy Question</label><br>
                Option 1
                <input type="radio" name="question_2" value=1>
                Option 2
                <input type="radio" name="question_2" value=2>
                Option 3
                <input type="radio" name="question_2" value=3>
                <br><br>
                <label for="question_three">3. Dunmmy Question</label><br>
                Option 1
                <input type="radio" name="question_3" value=1>
                Option 2
                <input type="radio" name="question_3" value=2>
                Option 3
                <input type="radio" name="question_3" value=3>

            </form><br>
            <button onclick=getthird()>Next</button>


        </div>

        <div class="form_four" id="four" style="display: none;">

            
            <div id="display">
           
           
            </div>
        </div>

    </div>
</body>';
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