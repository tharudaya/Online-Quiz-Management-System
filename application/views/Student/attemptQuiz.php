<?php include 'Parts/Header.php'; ?>
<div class="container">
    <div id="timer"></div>
    <h2>Quiz - <?php $row = $quiz->row(0); echo $row->quizName; $id=$row->id; ?></h2>

    <?php
    echo form_open('Student/mark');
    $i=0;
    foreach ($details->result() as $row) {
                ?>  
    
    <h4><?php echo ($i+1).". ".$row->question; ?></h4><br>
    <div class="radio">
        <label><input type="radio" name="ans[<?php echo $i ?>]" value="1"><?php echo $row->a1 ?></label>
    </div>
    <div class="radio">
        <label><input type="radio" name="ans[<?php echo $i ?>]" value="2"><?php echo $row->a2 ?></label>
    </div>
    <div class="radio">
        <label><input type="radio" name="ans[<?php echo $i ?>]" value="3"><?php echo $row->a3 ?></label>
    </div>
    <div class="radio">
        <label><input type="radio" name="ans[<?php echo $i ?>]" value="4"><?php echo $row->a4 ?></label>
    </div>
    <div class="radio">
        <label><input type="radio" name="ans[<?php echo $i ?>]" value="5"><?php echo $row->a5 ?></label>
    </div>
    <br><br>
    
                
                <?php
                $a= $row->correctAnswer;
                
                ?> <input type="text" name="ans2[<?php echo $i ?>]" value="<?php echo $a ?>" hidden="true"> <?php
                $i++;
            } ?>
    <input type="text" name="i" value="<?php echo $i ?>" hidden="true">
    <input type="text" name="quizId" value="<?php echo $id ?>" hidden="true">
    
            <button type="submit" class="btn btn-primary">finish</button>
           <?php echo form_close();
           ?> 
            
    <br><br>

</div>


<?php include 'Parts/Footer.php'; ?>