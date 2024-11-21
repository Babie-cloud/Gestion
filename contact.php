<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <?php
       $bdd = new PDO('mysql:host=localhost;dbname=blanchisserie;charset=utf8','root','');
    ?>
    
<style>

    body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: rgb(175, 187, 186) ;
        }
        h {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            max-width: 300px;
            margin: auto;
        }
        input, button {
            padding: 10px;
            margin: 5px 0;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #e2e2e2;
        }

</style>

</head>
<body>
    <?php
    include "menu.php"
    ?>
    
    <h1>CONTACT US</h1>
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
                <td><label for="email">email</label></td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="date">Date</label></td>
                <td><input type="date" name="Date" required></td>
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
    $recupmail=$_POST["email"];
    $recupdate=$_POST["Date"];
    echo "Nom:".$recupNom;
    echo"<br>Prenom:".$recupprenom;
    echo"<br>email:".$recupmail;
    echo"<br>Date:".$recupdate;


    $insertcontact = "insert into contact(Nom,Prenom,email,Date) values ('$recupNom','$recupprenom','$recupmail','$recupdate')";
    $bdd->exec($insertcontact);

   }
?>
</body>
</html>