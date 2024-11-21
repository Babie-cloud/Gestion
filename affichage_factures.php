

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
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
    
</body>
</html>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=blanchisserie;charset=utf8','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
include "header.php";

// Function to sanitize user inputs
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
  }

// Initialize message variables
$success_message = '';
$error_message = '';

// Handle employee deletion
if(isset($_POST["supprimer"])){
    $id = sanitize_input($_POST["id"]);
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        $deletefactures = "DELETE FROM factures WHERE id = :id";
        $stmt = $bdd->prepare($deletefactures);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if($stmt->execute()){
            $success_message = "La facture a été supprimée avec succès.";
        } else {
            $error_message = "Erreur lors de la suppression de la facture.";
        }
    } else {
        $error_message = "ID de la facture invalide.";
    }
}
?>

<h1><strong>Liste des factures</strong></h1>

<?php
if ($success_message) {
    echo "<div class='message success'>$success_message</div>";
}
if ($error_message) {
    echo "<div class='message error'>$error_message</div>";
}
?>

<div class="factures-list">
    <h2 class="list-title">Liste des factures</h2>
    <table>
        <thead>
            <tr>
        
                <th>date_facture</th>
                <th>montant</th>
                <th>Time</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM factures ORDER BY date_facture,montant,Time ";
            $result = $bdd->query($query);
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    
                    echo "<td>" . htmlspecialchars($row['date_facture']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['montant']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Time']) . "</td>";
                    echo "<td>
                            <form method='POST' action='' onsubmit='return confirm(\"Êtes-vous sûr de vouloir supprimer cette facture ?\");'>
                                <input type='hidden' name='id' value='".htmlspecialchars($row['id'])."'>
                                <input type='submit' class='btn btn-danger' name='supprimer' value='Supprimer'>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Aucune facture trouvée.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>