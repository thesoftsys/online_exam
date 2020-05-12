<?php

    session_start();
    include('../includes/connection.php');
    $question_no = "";
    $question = "";
    $op1 = "";
    $op2 = "";
    $op3 = "";
    $op4 = "";
    $answer = "";
    $count = 0;
    $ans = "";

    $queno = $_GET["questionsno"];

    if(isset($_SESSION["answer"][$queno]))
    {
        $ans = $_SESSION["answer"][$queno];
    }

    $res = mysqli_query($db,"SELECT *FROM add_questions WHERE exam_id = '$_SESSION[exam_id]' && question_no = '$_GET[questionsno]' ");
    $count = mysqli_num_rows($res);    

    if($count == 0)
    {
        echo "over";
    }
    else
    {

        while($row = mysqli_fetch_array($res))
        {
            $question_no = $row["question_no"];
            $question = $row["question"];
            $op1 = $row["option_one"];
            $op2 = $row["option_two"];
            $op3 = $row["option_three"];
            $op4 = $row["option_four"];
        }
        ?>

    <br>
    <table>
        <tr>
            <td style="font-weight: bold; font-size:18px; padding-left: 5px;" colspan="2">

                <?php echo "( ".$question_no ." ) ".$question; ?>

            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td>
                <input type="radio" name="r1" value="<?php echo $op1; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)" 
                <?php 
                if($ans == $op1)
                {
                    echo "checked";
                }
               
                
                ?>>
                <?php 
                   
                        echo $op1;
                
                ?>
            </td>
            
                
       
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" value="<?php echo $op2; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)" 

                <?php 
                if($ans == $op2)
                {
                    echo "checked";
                }
                
                ?>>
                 <?php 
                   
                   echo $op2;
           
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" value="<?php echo $op3; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)" 
                
                <?php 
                if($ans == $op3)
                {
                    echo "checked";
                }
                ?>>
                 <?php 
                   
                   echo $op3;
           
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" value="<?php echo $op4; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)" 
                <?php 
                if($ans == $op4)
                {
                    echo "checked";
                }
                
                ?>>
                 <?php 
                   
                   echo $op4;
           
                ?>
            </td>
        </tr>


    </table>



<?php
    }

?>