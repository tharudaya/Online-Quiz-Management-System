<?php include 'Parts/Header.php'; ?>

<div class="container">
    <?php
    if ($this->session->flashdata('msg')) {
        echo "<h3>" . $this->session->flashdata('msg') . "</h3>";
        echo '<hr>';
    }
    
    if ($this->session->flashdata('errmsg')){
        echo "<h3>".$this->session->flashdata('errmsg')."</h3>";
        echo '<hr>';
    }
    ?>
    <h2>Login</h2>
    <hr>
    <?php echo validation_errors(); ?>
    <?php echo form_open('Login/loginUser'); ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
    <?php echo form_close(); ?>
</div>
<?php include 'Parts/Footer.php'; ?>