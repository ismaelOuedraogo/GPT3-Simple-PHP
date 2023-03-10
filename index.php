
<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>GPT3 PHP</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
 
 <a class="navbar-brand" href="#">{} GPT3 PHP</a>
 <span class="navbar-text">
      AI is future
 </span>
</nav>
<?php
// verification si apuis sur bouton GO
 if(isset($_POST['submit'])){
    if (isset($_POST['message'])) {
        require_once 'Openai.php';
        $message = stripslashes($_REQUEST['message']);
        $openai = new Openai();
        $resultat=$openai->request("ada",$message, 5); 
        }
    }    
    ?>
    
  <div class="container h-100">
            <br>
            <br>
      <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
          <h3>Message √† interpret√©</h3>
          <br>
           <!-- <p class="description">Chat GP3</p>-->
              <!-- Form -->
            <form class="form-example" action="" method="post" name="login">
            <div class="form-group">
            <div class="input-group mb-3">
      
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" placeholder="Message" autofocus></textarea>
          
            </div>
            <input type="submit"  class="btn btn-dark btn-customized mt-4"  value="GO" name="submit" >
            </div>
           

            </form>
            <br>
            <br>

            <div class="card text-white bg-dark">
            <div class="card-header">
                R√©sultat
            </div>
                
                <div class="card-body">
                
                    <p class="card-text"><?php 
                    if (!empty($resultat)){
                        echo $resultat ;
                    }else{
                        echo "en attente de message √† interpret√©";
                        
                    }
                    ?></p>
                    
                </div>
            </div>

        </div>
      </div>
  </div>

   
  
</body>
</html>