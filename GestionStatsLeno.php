<?php
include('db.php'); // Inclure la connexion PDO à la base de données

// Traitement pour ajouter une nouvelle composition avec vérification
if(isset($_POST['addComposition'])){
    // Récupérer les valeurs soumises dans le formulaire
    $playerID = $_POST['playerID']; // ID du joueur
    $gameID = $_POST['gameID']; // ID de la partie
    $roleID = $_POST['roleID']; // ID du rôle
    $Com_IS_T1 = $_POST['Com_IS_T1']; // Premier tour
    $Com_IS_Bad_Vot = $_POST['Com_IS_Bad_Vot']; // Mauvais vote
    $Com_Task_Nb = $_POST['Com_Task_Nb']; // Nombre de tâches
    $Com_Buz = $_POST['Com_Buz']; // Buzz
    $Com_Rep = $_POST['Com_Rep']; // Réparations
    $Com_Kil_Nb = $_POST['Com_Kil_Nb']; // Nombre de kills
    $Com_IS_Alive_End = $_POST['Com_IS_Alive_End']; // Vivant à la fin
    $Com_Eat_Cad_Nb = $_POST['Com_Eat_Cad_Nb']; // Nombre de cadavres mangés

    // Vérifier si la composition existe déjà (en fonction du joueur et de la partie)
    $checkCompositionQuery = "SELECT * FROM composition WHERE Com_Jou_ID = ? AND Com_Par_ID = ?";
    $stmt = $pdo->prepare($checkCompositionQuery);
    $stmt->execute([$playerID, $gameID]);

    if($stmt->rowCount() > 0) {
        // Si la composition existe déjà
        echo "Cette composition existe déjà pour ce joueur et cette partie.";
    } else {
        // Si la composition n'existe pas, insérer dans la table
        $insertCompositionQuery = "
            INSERT INTO composition (
                Com_Jou_ID, Com_Par_ID, Com_Rol_ID, 
                Com_IS_T1, Com_IS_Bad_Vot, Com_Task_Nb, 
                Com_Buz, Com_Rep, Com_Kil_Nb, 
                Com_IS_Alive_End, Com_Eat_Cad_Nb
            ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ";
        $stmt = $pdo->prepare($insertCompositionQuery);
        $stmt->execute([
            $playerID, $gameID, $roleID,
            $Com_IS_T1, $Com_IS_Bad_Vot, $Com_Task_Nb,
            $Com_Buz, $Com_Rep, $Com_Kil_Nb,
            $Com_IS_Alive_End, $Com_Eat_Cad_Nb
        ]);

        // Vérification si l'insertion a réussi
        if ($stmt->rowCount() > 0) {
            echo "Composition ajoutée avec succès!";
        } else {
            echo "Erreur lors de l'ajout de la composition.";
        }
    }
}

// Vérification de l'existence et ajout d'un nouveau joueur
if(isset($_POST['addPlayer'])){
    $playerName = $_POST['playerName'];
    $checkPlayerQuery = "SELECT * FROM joueur WHERE Jou_Nom = ?";
    $stmt = $pdo->prepare($checkPlayerQuery);
    $stmt->execute([$playerName]);

    if($stmt->rowCount() == 0) {
        $addPlayerQuery = "INSERT INTO joueur (Jou_Nom) VALUES (?)";
        $stmt = $pdo->prepare($addPlayerQuery);
        $stmt->execute([$playerName]);
        echo "Joueur ajouté avec succès!";
    } else {
        echo "Ce joueur existe déjà.";
    }
}

// Vérification de l'existence et ajout d'un nouveau lobby
if(isset($_POST['addLobby'])){
    $lobbyName = $_POST['lobbyName'];
    $checkLobbyQuery = "SELECT * FROM lobby WHERE Lob_Nam = ?";
    $stmt = $pdo->prepare($checkLobbyQuery);
    $stmt->execute([$lobbyName]);

    if($stmt->rowCount() == 0) {
        $addLobbyQuery = "INSERT INTO lobby (Lob_Nam) VALUES (?)";
        $stmt = $pdo->prepare($addLobbyQuery);
        $stmt->execute([$lobbyName]);
        echo "Lobby ajouté avec succès!";
    } else {
        echo "Ce lobby existe déjà.";
    }
}

// Autres traitements pour ajouter un rôle, une équipe, une partie, etc...

// Traitement pour ajouter une nouvelle partie avec un ID unique
if (isset($_POST['addGame'])) {
    $gameDate = $_POST['gameDate'];
    $winningTeam = $_POST['winningTeam']; // ID de l'équipe gagnante
    $lobbyID = $_POST['lobbyID']; // ID du lobby
    $gameMaxTasks = $_POST['gameMaxTasks']; // Nombre de tâches max
    $gameNumber = $_POST['gameNumber']; // N° de la game dans la soirée

    // Insérer directement la partie sans vérifier si elle existe déjà
    $addGameQuery = "
        INSERT INTO partie (Par_Dat, Par_Win_Equ_ID, Par_Lob_ID, Par_Task_Max, Par_Num_Dat)
        VALUES (?, ?, ?, ?, ?)
    ";
    $stmt = $pdo->prepare($addGameQuery);
    $stmt->execute([$gameDate, $winningTeam, $lobbyID, $gameMaxTasks, $gameNumber]);
    echo "Partie ajoutée avec succès!";
}


// Récupérer les paramètres de filtrage
$filterDate = isset($_POST['filterDate']) ? $_POST['filterDate'] : '';
$filterOwner = isset($_POST['filterOwner']) ? $_POST['filterOwner'] : '';
$filterWinningTeam = isset($_POST['filterWinningTeam']) ? $_POST['filterWinningTeam'] : '';

// Construire la requête avec les filtres
$gamesQuery = "
    SELECT p.Par_ID, p.Par_Dat, l.Lob_Nam, e.Equ_Nom AS WinningTeam, COUNT(c.Com_Jou_ID) AS Nb_Compositions
    FROM partie p
    JOIN lobby l ON p.Par_Lob_ID = l.Lob_ID
    LEFT JOIN composition c ON c.Com_Par_ID = p.Par_ID
    LEFT JOIN equipe e ON p.Par_Win_Equ_ID = e.Equ_ID
    WHERE 1=1
";

// Ajouter des conditions de filtrage à la requête
if (!empty($filterDate)) {
    $gamesQuery .= " AND p.Par_Dat = :filterDate";
}
if (!empty($filterOwner)) {
    $gamesQuery .= " AND l.Lob_Proprio = (SELECT Jou_ID FROM joueur WHERE Jou_Nom = :filterOwner)";
}
if (!empty($filterWinningTeam)) {
    $gamesQuery .= " AND e.Equ_Nom = :filterWinningTeam";
}

$gamesQuery .= " GROUP BY p.Par_ID";

// Préparer la requête
$stmt = $pdo->prepare($gamesQuery);

// Lier les paramètres de filtrage
if (!empty($filterDate)) {
    $stmt->bindParam(':filterDate', $filterDate);
}
if (!empty($filterOwner)) {
    $stmt->bindParam(':filterOwner', $filterOwner);
}
if (!empty($filterWinningTeam)) {
    $stmt->bindParam(':filterWinningTeam', $filterWinningTeam);
}

// Exécuter la requête
$stmt->execute();

// Récupérer les résultats
$gamesResult = $stmt->fetchAll();

$gamesResult = $pdo->query($gamesQuery);

// Gestion de l'affichage des joueurs inscrits dans une partie
$playersInGame = [];
if(isset($_POST['gameIDSearch'])) {
    $gameID = $_POST['gameID']; // Partie ID à rechercher
    $playersInGameQuery = "
        SELECT j.Jou_Nom, r.Rol_Nom 
        FROM composition c
        JOIN joueur j ON c.Com_Jou_ID = j.Jou_ID
        JOIN role r ON c.Com_Rol_ID = r.Rol_ID
        WHERE c.Com_Par_ID = ?
    ";
    $stmt = $pdo->prepare($playersInGameQuery);
    $stmt->execute([$gameID]);
    $playersInGame = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie de données</title>
    <link rel="stylesheet" href="css/stylesStats.css">
</head>
<body>

<div class="container">
    <div class="section-left">
        <!-- Création Joueur -->
        <h2>Créer un nouveau joueur</h2>
        <form method="post">
            <input type="text" name="playerName" placeholder="Nom du joueur" required>
            <input type="submit" name="addPlayer" value="Ajouter Joueur">
        </form>

        <!-- Liste des parties créées -->
        <h2>Liste des Parties Créées</h2>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Propriétaire</th>
                <th>Gagnants</th>
                <th>N°game</th>
                <th>Joueurs</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Modifier la requête pour récupérer le numéro de la partie (Par_Num_Dat)
            $gamesQuery = "
            SELECT p.Par_ID, p.Par_Dat, l.Lob_Nam, e.Equ_Nom AS WinningTeam, 
            COUNT(c.Com_Jou_ID) AS Nb_Compositions, p.Par_Num_Dat
            FROM partie p
            JOIN lobby l ON p.Par_Lob_ID = l.Lob_ID
            LEFT JOIN composition c ON c.Com_Par_ID = p.Par_ID
            LEFT JOIN equipe e ON p.Par_Win_Equ_ID = e.Equ_ID
            GROUP BY p.Par_ID
            ORDER BY p.Par_ID DESC
        ";

            $gamesResult = $pdo->query($gamesQuery);

            if ($gamesResult->rowCount() > 0) {
                while ($row = $gamesResult->fetch()) {
                    echo "<tr>
                        <td>" . $row['Par_ID'] . "</td>
                        <td>" . $row['Par_Dat'] . "</td>
                        <td>" . $row['Lob_Nam'] . "</td>
                        <td>" . $row['WinningTeam'] . "</td>
                        <td>" . $row['Par_Num_Dat'] . "</td> <!-- Affichage du N° game soirée -->
                        <td>" . $row['Nb_Compositions'] . "</td>
                      </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Aucune partie disponible.</td></tr>";  // J'ai mis 6 colonnes à afficher
            }
            ?>
            </tbody>
        </table>


        <!-- Création 50/50 -->
        <h2>Créer un nouveau 50/50</h2>
        <h2>(On verra plus tard)</h2>
        <form method="post">
            <h3>N° de la game</h3>
            <select name="gameID">
                <?php
                $gamesQuery = "SELECT * FROM partie";
                $result = $pdo->query($gamesQuery);
                while($row = $result->fetch()){
                    echo "<option value='" . $row['Par_ID'] . "'>" . $row['Par_ID'] . "</option>";
                }
                ?>
            </select>
            <h3>Gagnant du 50/50</h3>
            <select name="winnerID">
                <?php
                $playersQuery = "SELECT * FROM joueur";
                $result = $pdo->query($playersQuery);
                while($row = $result->fetch()){
                    echo "<option value='" . $row['Jou_ID'] . "'>" . $row['Jou_Nom'] . "</option>";
                }
                ?>
            </select>
            <h3>Perdant du 50/50</h3>
            <select name="loserID">
                <?php
                $playersQuery = "SELECT * FROM joueur";
                $result = $pdo->query($playersQuery);
                while($row = $result->fetch()){
                    echo "<option value='" . $row['Jou_ID'] . "'>" . $row['Jou_Nom'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" name="add50_50" value="Ajouter 50/50">
        </form>
    </div>

    <div class="section-center">
        <!-- Création Partie -->
        <h2>Créer une nouvelle partie</h2>
        <form method="post">
            <h3>Date</h3>
            <input type="date" name="gameDate" required>
            <h3>N° de la game dans la soirée</h3>
            <input type="number" name="gameNumber" min="1" required> <!-- Champ pour entrer le N° de la game -->
            <h3>Equipe Gagnante</h3>
            <select name="winningTeam">
                <?php
                $teamsQuery = "SELECT * FROM equipe";
                $result = $pdo->query($teamsQuery);
                while($row = $result->fetch()){
                    echo "<option value='" . $row['Equ_ID'] . "'>" . $row['Equ_Nom'] . "</option>";
                }
                ?>
            </select>
            <h3>Nombre de tâches max</h3>
            <input type="number" name="gameMaxTasks" min="0" required>
            <h3>Propriétaire du Lobby</h3>
            <select name="lobbyID">
                <?php
                $lobbiesQuery = "SELECT * FROM lobby";
                $result = $pdo->query($lobbiesQuery);
                while($row = $result->fetch()){
                    echo "<option value='" . $row['Lob_ID'] . "'>" . $row['Lob_Nam'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" name="addGame" value="Ajouter Partie">
        </form>


        <!-- Gérer une Partie -->
        <h2>Gérer une Partie</h2>
        <form method="post">
            <h3>Entrer l'ID de la Partie</h3>
            <input type="number" name="gameID" placeholder="ID de la partie" required>
            <input type="submit" name="gameIDSearch" value="OK">
        </form>

        <?php
        if (!empty($playersInGame)) {
            echo "<h3>Liste des joueurs dans cette partie</h3>";
            echo "<ul>";
            foreach ($playersInGame as $player) {
                echo "<li>" . $player['Jou_Nom'] . " - Rôle : " . $player['Rol_Nom'] . "</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>

    <div class="section-large">
        <!-- Création Composition -->
        <h2>Créer une nouvelle composition</h2>
        <form method="post" id="compositionForm">
            <h3>Joueur</h3>
            <select name="playerID" id="playerID">
                <?php
                $playersQuery = "SELECT * FROM joueur";
                $result = $pdo->query($playersQuery);
                while($row = $result->fetch()){
                    echo "<option value='" . $row['Jou_ID'] . "'>" . $row['Jou_Nom'] . "</option>";
                }
                ?>
            </select>

            <h3>N° de la game</h3>
            <select name="gameID">
                <?php
                $gamesQuery = "SELECT * FROM partie ORDER BY Par_ID DESC";
                $result = $pdo->query($gamesQuery);
                while($row = $result->fetch()){
                    echo "<option value='" . $row['Par_ID'] . "'>" . $row['Par_ID'] . "</option>";
                }
                ?>
            </select>

            <h3>Rôle du joueur</h3>
            <select name="roleID" id="roleID">
                <?php
                $rolesQuery = "SELECT * FROM role";
                $result = $pdo->query($rolesQuery);
                while($row = $result->fetch()){
                    echo "<option value='" . $row['Rol_ID'] . "' data-equipe='" . $row['Rol_Equ_ID'] . "'>" . $row['Rol_Nom'] . "</option>";
                }
                ?>
            </select>

            <!-- Champs supplémentaires -->
            <h3>S'est fait T1 ?</h3>
            <select name="Com_IS_T1">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>

            <h3>S'est fait voter à Tort ?</h3>
            <select name="Com_IS_Bad_Vot">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>

            <h3>Nombre de tâches finies à la fin?</h3>
            <input type="number" name="Com_Task_Nb" min="0" required>

            <h3>Le joueur a t il buzzé ?</h3>
            <select name="Com_Buz">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>

            <h3>Combien de fois le joueur a t il reporté un cadavre ?</h3>
            <input type="number" name="Com_Rep" min="0" required>

            <h3>Nombre de kills du joueur ?</h3>
            <input type="number" name="Com_Kil_Nb" min="0" required id="Com_Kil_Nb">

            <h3>Vivant à la fin ?</h3>
            <select name="Com_IS_Alive_End">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>

            <h3>Nombre de cadavres mangés en vulture ?</h3>
            <input type="number" name="Com_Eat_Cad_Nb" min="0" required id="Com_Eat_Cad_Nb">

            <input type="submit" name="addComposition" value="Ajouter Composition">
        </form>
    </div>
</div>

</body>
</html>
