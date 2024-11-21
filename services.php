<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
 
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
        margin: 5px ;
        font-size: 16px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 60px;
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
    <h1>Nos Services</h1>
    <p>Clean Sevice offre un service rapide et fiable. Les tarifs sont fixes selon le service offert.</p>
    <p> Les services offerts:</p>
    <form action="" method="POST">
        <table>
            <tr>
                <td>
                  <label for="nom_service">Veuillez saisir le service souhaite ?</label><br/>
                   <select name="Service" id="Service">
                    <option value="Lavage a sec">Lavage a sec</option>
                    <option value="Repassage">Repassage</option>
                    <option value="Simple lessive">Simple lessive</option>
                    <option value="Nettoyage avec eau de javel">Nettoyage avec eau de javel</option>
                    <option value="Nettoyage des jeans">Nettoyage des jeans</option>
                    <option value="Nettoyage des doudounes">Nettoyage des doudounes</option>
                    
                   </select>
                </td>
            </tr>
            <tr>
                <td><label for="Tarif">Tarif</label></td>
                <td><input type="decimal" name="Tarif"  placeholder="Ex : 0,00" required></td>
            </tr>
            
        </table>
        <button type="submit" class="submit-button">envoyer</button>
        <button class="delete-button" id="deleteBtn">supprimer</button>
    </form>
    <?php  
        if(isset($_POST["envoyer"]))
           {
             $recupSer=$_POST["nom_service"];
             $recupTar=$_POST["Tarif"];
             echo "nom_service:".$recupSer;
             echo"<br>Tarif:".$recupTar;

             $insertservices = "insert into services(nom_service,Tarif) values ('$recupSer','$recupTar')";
             $bdd->exec($insertservices);  

            }
    ?>
</body>
</html>