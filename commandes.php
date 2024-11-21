



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>commande</title>
<style>
   body{
background-color: rgb(175, 187, 186);
   }
   
</style>
   
</head>
<body>
    <?php
    include "menu.php"
    ?>
    <h2>PRISE DE COMMANDE</h2>
    <form action="" method="POST">
        <table>
        <?php
          $bdd = new PDO('mysql:host=localhost;dbname=blanchisserie;charset=utf8','root','');
        ?>
            <tr>
                <td><label for="Service">Service</label></td>
                <td><input type="text" name="Service" required></td> 
            </tr>
        
        
            <tr>
                <td><label for="Date">Date</label></td>
                <td><input type="Date" name="Date" required></td> 
            </tr>
        
        </table>
        <button type="submit" class="submit-button">envoyer</button>
        <button class="delete-button" id="deleteBtn">supprimer</button>
    </form>
 

 
 <?php  
 if(isset($_POST["envoyer"]))
  {
    
    $recupServ=$_POST["Service"];
    $recupdate=$_POST["Date"];
    
    echo"<br>Service:".$recupServ;
    echo"<br>Date:".$recupdate;

    $insertcommande = "insert into commandes(Service,date_commande) values ('$recupServ','$recupdate')";
    $bdd->exec($insertcommande);


   }
?>

    <style>
    h{
        color : rgb(17, 131, 125);
    }
       
  </style>
</body>
</html>