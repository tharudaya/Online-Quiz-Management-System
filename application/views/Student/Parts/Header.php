<!DOCTYPE html>
<?php
if (!($this->session->userdata('loggedin'))) {

    redirect('Home/showLogin');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OQMS</title>
        <script type="text/javascript">
      var now = new Date().getTime();
      var elapsed = new Date().getTime() - now;
      document.getElementById("timer").innerHtml = elapsed;
      if (elapsed > 300000 /*milliseconds in 5 minutes*/) {
        alert ("5 minutes up!");
        //take whatever action you want!
      }
    </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Online Quiz Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('index.php/Student/index') ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/Student/showSubjects') ?>">Subjects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/Student/showQuizzes') ?>">Quizzes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/Student/showMarks') ?>">Marks</a>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-right">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            echo $this->session->userdata('fname');
                            echo $this->session->userdata('firstName');
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url('index.php/Login/logoutUser') ?>">Logout</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('index.php/Student/editProfile') ?>">Profile</a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>

