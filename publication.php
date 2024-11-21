<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication</title>

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

        .delete-button{
            background-color : red;
            color : white;
            padding : 10px 20px;
            cursor : pointer;
            border-radius : 5px;
            font-size : 16px
        }
        .delete-button: hover{
            background-color : darkred;

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
    <h1>Write something...</h1>
    <h4>Ajouter une publication...</h4>
    <form action="" method="POST">
        <table>  
            <tr>
                <td><label for="Publicite">Publicite</label></td>
                <td><input type="text" name="Publicite" required></td>
            </tr>
            <tr>
                <td><label for="Objectif">Objectif</label></td>
                <td><input type="text" name="Objectif" required></td>
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
    
    $recuppub=$_POST["Publicite"];
    $recupobj=$_POST["Objectif"];
    $recupdate=$_POST["Date"];
    echo "Publicite:".$recuppub;
    echo"<br>Objectif:".$recupobj;
    echo"<br>Date:".$recupdate;

   
   $insertpub = "insert into publication(Publicite,Objectif,Date) values ('$recuppub','$recupobj','$recupdate')";
   $bdd->exec($insertpub);
  }
?>

</body>
</html>