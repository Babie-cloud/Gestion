<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Client</title>

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

<?php
    include "menu.php"
?>;

</style>
</head>
<body>
    <?php
    include "menu.php"
    ?>
    <h1>Faites vos commandes en ligne!</h1>
    <h4>Veuillez saisir vos coordonnees...</h4>
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
                <td><label for="telephone">telephone</label></td>
                <td><input type="telephone" name="telephone" required></td>
            </tr>
            <tr>
                <td><label for="email">email</label></td>
                <td><input type="email" name="email" required></td>
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
    $recupTel=$_POST["telephone"];
    $recupmail=$_POST["email"];
    echo "Nom:".$recupNom;
    echo"<br>telephone:".$recupTel;
    echo"<br>Prenom:".$recupprenom;

    $insertClient = "insert into clients(nom,email,telephone) values ('$recupNom','$recupTel','$recupmail')";
    $bdd->exec($insertClient);

   }
?>


<br>
<p> Pour passer vos commandes en ligne, veuillez les enregistrer via ce lien <a href="commandes.php">commande</a>.</p>
<p>Vous trouverez une variete de choix, vous ne le regreterez pas on vous l'assure.<p> 
</body>
</html>