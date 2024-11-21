<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Facture</title>
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
    <h1>FACTURE</h1>
      <form action="" method="POST">
        <table>
            <tr>
                <td><label for="montant">montant</label></td>
                <td><input type="text" name="montant" required></td>
            </tr>
            <tr>
                <td><label for="date_facture">date_facture</label></td>
                <td><input type="date" name="date_facture" required></td>
            </tr>
            <tr>
                <td><label for="Time">Time</label></td>
                <td><input type="Time" name="Time" required></td>
            </tr>
        </table>
        <button type="submit" class="submit-button">envoyer</button>
        <button class="delete-button" id="deleteBtn">supprimer</button>
    </form>
       
    <?php  
 if(isset($_POST["envoyer"]))
  {
    $recupmontant=$_POST["montant"];
    $recupdate=$_POST["date_facture"];
    $recuptime=$_POST["Time"];
    echo "Nom:".$recupmontant;
    echo"<br>date_facture:".$recupdate;
    echo"<br>Time:".$recuptime;
    $insertFacture = "insert into factures(montant,date_facture,Time) values ('$recupmontant','$recupdate','$recuptime')";
    $bdd->exec($insertFacture);

   }
?>
</body>
</html>