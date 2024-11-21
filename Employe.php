<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employe</title>
    <?php
      $bdd = new PDO('mysql:host=localhost;dbname=blanchisserie;charset=utf8','root','');
    ?>

<style>
    h{
        color : rgb(17, 131, 125);
    }
       
  
  /* Styles généraux */
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    color: #333;
    }

  h1, h2, h3 {
    color: #2c3e50;
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
 }

  /* En-tête */
  header {
    background-color: #3498db;
    color: white;
    padding: 20px 0;
    text-align: center;
  }

  .header-title {
    font-size: 2.5em;
    margin: 0;
  }

  /* Navigation */
  nav {
    margin-top: 15px;
   }

  nav a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
   }

  nav a:hover {
    background-color: #2980b9;
    border-radius: 5px;
  }

  /* Sections */
   .section {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 20px 0;
    padding: 20px;
  }

  /* Boutons */
  .button {
    background-color: #e67e22;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
     }

   .button:hover {
    background-color: #d35400;
  }

  /* Pied de page */
  footer {
    text-align: center;
    padding: 90px 0;
    background-color: rgb(111, 146, 144);
    color: white;
    margin-top: 7px;
     }

</style>
</head>
<body>
    <?php
    include "menu.php"
    ?>
    
    <h1>Nos employes</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="Nom">Nom</label></td>
                <td><input type="text" name="Nom" required></td>
            </tr>
            
            <tr>
                <td><label for="Prenom">Prenom</label></td>
                <td><input type="text" name="Prenom" required></td>
            </tr>
            <tr>
                <td><label for="telephone">Telephone</label></td>
                <td><input type="int" name="Telephone" required></td>
            </tr>
            <tr>
                <td><label for="Post">Post</label></td>
                <td><input type="varchar" name="Post" required></td>
            </tr>
        </table>
        <button type="submit" class="submit-button">envoyer</button>
        <button class="delete-button" id="deleteBtn">supprimer</button>
    </form>

<?php  
 if(isset($_POST["envoyer"]))
  {
    $recupNom=$_POST["Nom"];
    $recupprenom=$_POST["Prenom"];
    $recupTel=$_POST["Telephone"];
    $recuppost=$_POST["Post"];
    echo "Nom:".$recupNom;
    echo"<br>Telephone:".$recupTel;
    echo"<br>Prenom:".$recupprenom;
    echo"<br>Post:".$recuppost;

    $insertEmploye = "insert into employe(Nom,Prenom,Post,Telephone) values ('$recupNom','$recupprenom','$recuppost','$recupTel')";
    $bdd->exec($insertEmploye);

  }
  ?>
</body>
<footer>For more information, you can contact us on :<br> 
        mail : cleanroom@gmail.com <br>
        facebook : Clean Room <br>
        Instagram : Clean_Room<br>
        www.CleanRoom.com<br>
</footer>
</html>