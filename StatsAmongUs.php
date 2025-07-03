<?php
include('db.php'); // Inclure la connexion PDO à la base de données

// Variables pour les filtres
$lobbyFilter = isset($_POST['lobbyFilter']) ? $_POST['lobbyFilter'] : '';
$dateFilter = isset($_POST['dateFilter']) ? $_POST['dateFilter'] : '';
$playerFilter = isset($_POST['playerFilter']) ? $_POST['playerFilter'] : '';
$mapFilter = isset($_POST['mapFilter']) ? $_POST['mapFilter'] : '';

// Récupérer les rôles pour le filtre
$roles = ['Shériff', 'Maire', 'Ingénieur', 'Medic', 'Ninja', 'EvilGuesser', 'Morphling', 'Jester', 'Vulture'];


// Requête pour les statistiques des joueurs
$statsQuery = "
    SELECT j.Jou_Nom,
           COUNT(DISTINCT CASE WHEN r.Rol_Equ_ID = 1 THEN p.Par_ID END) AS Crewmate_Games, 
           COUNT(DISTINCT CASE WHEN r.Rol_Equ_ID = 2 THEN p.Par_ID END) AS Impostor_Games,
           COUNT(DISTINCT CASE WHEN r.Rol_Nom = 'Jester' THEN p.Par_ID END) AS Jester_Games,
           COUNT(DISTINCT CASE WHEN r.Rol_Nom = 'Vulture' THEN p.Par_ID END) AS Vulture_Games,
           SUM(CASE WHEN c.Com_IS_T1 = 1 THEN 1 ELSE 0 END) AS T1_Count,
           SUM(CASE WHEN c.Com_IS_Bad_Vot = 1 THEN 1 ELSE 0 END) AS Bad_Vote_Count,
           SUM(c.Com_Task_Nb) AS Total_Tasks,  -- Somme des tâches effectuées
           SUM(CASE WHEN c.Com_Buz = 1 THEN 1 ELSE 0 END) AS Buzz_Count,
           SUM(CASE WHEN c.Com_Rep > 0 THEN 1 ELSE 0 END) AS Reported_Count,
           SUM(c.Com_Kil_Nb) AS Total_Kills,
           SUM(CASE WHEN c.Com_IS_Alive_End = 1 THEN 1 ELSE 0 END) AS Alive_End_Count,
           SUM(CASE WHEN c.Com_Eat_Cad_Nb > 0 THEN 1 ELSE 0 END) AS Eat_Cad_Count,
           COUNT(DISTINCT CASE WHEN r.Rol_Equ_ID = 1 AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Crewmate_Wins,
           COUNT(DISTINCT CASE WHEN r.Rol_Equ_ID = 2 AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Impostor_Wins,
           COUNT(DISTINCT CASE WHEN r.Rol_Nom = 'Jester' AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Jester_Wins,
           COUNT(DISTINCT CASE WHEN r.Rol_Nom = 'Vulture' AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Vulture_Wins,
           COUNT(DISTINCT p.Par_ID) AS Total_Games,
           SUM(p.Par_Task_Max) AS Total_Max_Tasks -- Utilisation de la colonne Par_Task_Max de la table partie
    FROM composition c
    JOIN joueur j ON c.Com_Jou_ID = j.Jou_ID
    JOIN partie p ON c.Com_Par_ID = p.Par_ID
    JOIN role r ON c.Com_Rol_ID = r.Rol_ID
    WHERE 1
";

// Appliquer les filtres
if ($lobbyFilter != '') {
    $statsQuery .= " AND p.Par_Lob_ID = ?";
}
if ($dateFilter != '') {
    $statsQuery .= " AND p.Par_Dat = ?";
}
if ($playerFilter != '') {
    $statsQuery .= " AND j.Jou_ID = ?";
}
if ($mapFilter != '') {
    $statsQuery .= " AND p.Par_Map = ?"; // Appliquer le filtre de Map
}

// Préparer les paramètres pour la requête
$params = [];
if ($lobbyFilter != '') {
    $params[] = $lobbyFilter;
}
if ($dateFilter != '') {
    $params[] = $dateFilter;
}
if ($playerFilter != '') {
    $params[] = $playerFilter;
}
if ($mapFilter != '') {
    $params[] = $mapFilter; // Ajouter le filtre de la carte
}

$statsQuery .= " GROUP BY j.Jou_Nom";

// Exécuter la requête avec les paramètres
$statsStmt = $pdo->prepare($statsQuery);
$params = [];
if ($lobbyFilter != '') {
    $params[] = $lobbyFilter;
}
if ($dateFilter != '') {
    $params[] = $dateFilter;
}
if ($playerFilter != '') {
    $params[] = $playerFilter;
}
if ($mapFilter != '') {
    $params[] = $mapFilter;
}

$statsStmt = $pdo->prepare($statsQuery);
$statsStmt->execute($params);
$statsResult = $statsStmt->fetchAll();

// Requête pour récupérer le nombre de fois que chaque joueur a joué chaque rôle
$rolesPlayedQuery = "
    SELECT j.Jou_Nom, 
           r.Rol_Nom,
           COUNT(*) AS Role_Count
    FROM composition c
    JOIN joueur j ON c.Com_Jou_ID = j.Jou_ID
    JOIN role r ON c.Com_Rol_ID = r.Rol_ID
    GROUP BY j.Jou_Nom, r.Rol_Nom
    ORDER BY j.Jou_Nom, r.Rol_Nom
";
$rolesPlayedStmt = $pdo->prepare($rolesPlayedQuery);
$rolesPlayedStmt->execute();
$rolesPlayedResult = $rolesPlayedStmt->fetchAll();

// Requête pour obtenir le nombre de parties et les victoires par map
$mapStatsQuery = "
    SELECT p.Par_Map,
           COUNT(DISTINCT p.Par_ID) AS Total_Games,
           COUNT(DISTINCT CASE WHEN r.Rol_Equ_ID = 1 AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Crewmate_Wins,
           COUNT(DISTINCT CASE WHEN r.Rol_Equ_ID = 2 AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Impostor_Wins,
           COUNT(DISTINCT CASE WHEN r.Rol_Nom = 'Jester' AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Jester_Wins,
           COUNT(DISTINCT CASE WHEN r.Rol_Nom = 'Vulture' AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Vulture_Wins
    FROM partie p
    JOIN composition c ON p.Par_ID = c.Com_Par_ID
    JOIN role r ON c.Com_Rol_ID = r.Rol_ID
    WHERE 1
";

// Appliquer le filtre sur la map si elle est définie
if ($mapFilter != '') {
    $mapStatsQuery .= " AND p.Par_Map = ?";
}

// Préparer la requête
$mapStatsStmt = $pdo->prepare($mapStatsQuery);

// Vérifier si le filtre de la map est défini
if ($mapFilter != '') {
    // Si le filtre de map est défini, on passe le paramètre à execute()
    $mapStatsStmt->execute([$mapFilter]);
} else {
    // Si le filtre de map est vide, on exécute la requête sans paramètre
    $mapStatsStmt->execute();
}

// Récupérer les résultats
$mapStatsResult = $mapStatsStmt->fetchAll();

// Requête pour récupérer les duos gagnants dans l'équipe des imposteurs
$duosQuery = "
    SELECT c.Com_Par_ID, c.Com_Jou_ID, p.Par_Win_Equ_ID
    FROM composition c
    JOIN partie p ON c.Com_Par_ID = p.Par_ID
    WHERE p.Par_Win_Equ_ID = 2  -- Gagnants sont les imposteurs
    AND c.Com_Rol_ID IN (SELECT Rol_ID FROM role WHERE Rol_Equ_ID = 2)  -- L'équipe des imposteurs
";
$duosStmt = $pdo->prepare($duosQuery);
$duosStmt->execute();

// Tableau pour stocker les duos avec leurs fréquences
$duos = [];

// Créer les duos pour chaque partie gagnée par les imposteurs
while ($row = $duosStmt->fetch()) {
    // Récupérer les joueurs dans cette partie
    $gameID = $row['Com_Par_ID'];

    // Requête pour récupérer les joueurs de cette partie qui étaient dans l'équipe des imposteurs
    $playersQuery = "
        SELECT c.Com_Jou_ID 
        FROM composition c
        JOIN role r ON c.Com_Rol_ID = r.Rol_ID
        WHERE c.Com_Par_ID = ? AND r.Rol_Equ_ID = 2  -- Imposteurs uniquement
    ";
    $playersStmt = $pdo->prepare($playersQuery);
    $playersStmt->execute([$gameID]);
    $players = $playersStmt->fetchAll(PDO::FETCH_COLUMN);

    // Créer des duos et les ajouter au tableau
    for ($i = 0; $i < count($players); $i++) {
        for ($j = $i + 1; $j < count($players); $j++) {
            // Créer un duo trié pour éviter les doublons (A-B et B-A sont considérés comme le même)
            $duo = [$players[$i], $players[$j]];
            sort($duo);
            $duoKey = implode("-", $duo);  // Créer une clé unique pour chaque duo

            if (isset($duos[$duoKey])) {
                $duos[$duoKey]++;  // Incrémenter la fréquence du duo
            } else {
                $duos[$duoKey] = 1;  // Premier enregistrement du duo
            }
        }
    }
}

// Trier les duos par fréquence (du plus fréquent au moins fréquent)
arsort($duos);

// Requête pour récupérer les duos d'imposteurs qui ont perdu (parties où l'équipe des imposteurs a perdu)
$defeatsQuery = "
    SELECT c.Com_Par_ID, c.Com_Jou_ID, p.Par_Win_Equ_ID
    FROM composition c
    JOIN partie p ON c.Com_Par_ID = p.Par_ID
    WHERE p.Par_Win_Equ_ID != 2  -- Gagnant n'est pas l'équipe des imposteurs
    AND c.Com_Rol_ID IN (SELECT Rol_ID FROM role WHERE Rol_Equ_ID = 2)  -- L'équipe des imposteurs
";
$defeatsStmt = $pdo->prepare($defeatsQuery);
$defeatsStmt->execute();

// Tableau pour stocker les duos avec leurs fréquences de défaites
$duosDefeats = [];

// Créer les duos pour chaque partie où les imposteurs ont perdu
while ($row = $defeatsStmt->fetch()) {
    // Récupérer les joueurs dans cette partie
    $gameID = $row['Com_Par_ID'];

    // Requête pour récupérer les joueurs de cette partie qui étaient dans l'équipe des imposteurs
    $playersQuery = "
        SELECT c.Com_Jou_ID 
        FROM composition c
        JOIN role r ON c.Com_Rol_ID = r.Rol_ID
        WHERE c.Com_Par_ID = ? AND r.Rol_Equ_ID = 2  -- Imposteurs uniquement
    ";
    $playersStmt = $pdo->prepare($playersQuery);
    $playersStmt->execute([$gameID]);
    $players = $playersStmt->fetchAll(PDO::FETCH_COLUMN);

    // Créer des duos et les ajouter au tableau
    for ($i = 0; $i < count($players); $i++) {
        for ($j = $i + 1; $j < count($players); $j++) {
            // Créer un duo trié pour éviter les doublons (A-B et B-A sont considérés comme le même)
            $duo = [$players[$i], $players[$j]];
            sort($duo);
            $duoKey = implode("-", $duo);  // Créer une clé unique pour chaque duo

            // Ajouter les données au tableau des duos
            if (isset($duosDefeats[$duoKey])) {
                $duosDefeats[$duoKey]['frequency']++;  // Incrémenter la fréquence du duo
            } else {
                $duosDefeats[$duoKey] = ['frequency' => 1];  // Premier enregistrement du duo
            }
        }
    }
}

// Trier les duos par fréquence (du plus fréquent au moins fréquent)
arsort($duosDefeats);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des Joueurs</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-500">

<!-- Formulaire de filtres -->
<form method="POST" class="bg-gray-300 p-6 rounded-lg shadow-md max-w-4xl mx-auto my-8">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <label for="lobbyFilter" class="block text-sm font-medium text-gray-700">Lobby :</label>
        <select name="lobbyFilter" id="lobbyFilter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
            <option value="">Tous</option>
            <?php
            $lobbiesQuery = "SELECT * FROM lobby";
            $lobbiesResult = $pdo->query($lobbiesQuery);
            while ($row = $lobbiesResult->fetch()) {
                echo "<option value='" . $row['Lob_ID'] . "' " . ($lobbyFilter == $row['Lob_ID'] ? "selected" : "") . ">" . $row['Lob_Nam'] . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <label for="dateFilter" class="block text-sm font-medium text-gray-700">Date :</label>
        <select name="dateFilter" id="dateFilter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
            <option value="">Toutes</option>
            <?php
            $datesQuery = "SELECT DISTINCT Par_Dat FROM partie ORDER BY Par_Dat";
            $datesResult = $pdo->query($datesQuery);
            while ($row = $datesResult->fetch()) {
                echo "<option value='" . $row['Par_Dat'] . "' " . ($dateFilter == $row['Par_Dat'] ? "selected" : "") . ">" . $row['Par_Dat'] . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <label for="playerFilter" class="block text-sm font-medium text-gray-700">Joueur :</label>
        <select name="playerFilter" id="playerFilter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
            <option value="">Tous</option>
            <?php
            $playersQuery = "SELECT * FROM joueur";
            $playersResult = $pdo->query($playersQuery);
            while ($row = $playersResult->fetch()) {
                echo "<option value='" . $row['Jou_ID'] . "' " . ($playerFilter == $row['Jou_ID'] ? "selected" : "") . ">" . $row['Jou_Nom'] . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    <label for="mapFilter" class="block text-sm font-medium text-gray-700">Map :</label>
    <select name="mapFilter" id="mapFilter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
        <option value="">Toutes</option>
        <?php
        // Récupérer les valeurs distinctes de Par_Map dans la table partie
        $mapsQuery = "SELECT DISTINCT Par_Map FROM partie";
        $mapsResult = $pdo->query($mapsQuery);
        while ($row = $mapsResult->fetch()) {
            echo "<option value='" . $row['Par_Map'] . "' " . ($mapFilter == $row['Par_Map'] ? "selected" : "") . ">" . $row['Par_Map'] . "</option>";
        }
        ?>
    </select>
    </div>

    <div class="text-center mt-4">
        <input type="submit" value="Valider" class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-sm cursor-pointer hover:bg-blue-600">
    </div>
</form>

<!-- Affichage des stats -->
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Stats des Joueurs</h2>
    <!-- Section avec plusieurs tableaux côte à côte -->
    <div class="bg-gray-300 p-4 rounded-lg shadow-md mb-6 w-auto ml-0 grid grid-cols-5 gap-4">

        <!-- Tableau 1 : Parties Jouées -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Parties Jouées</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $totalGamesA = $a['Total_Games'];
                    $totalGamesB = $b['Total_Games'];
                    return $totalGamesB <=> $a['Total_Games']; // Trie par nombre de parties décroissant
                });

                foreach ($statsResult as $row) {
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Total_Games'] . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 2 : Ratio Crewmate -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Ratio Crewmate</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    // Calcul du ratio pour chaque joueur
                    $crewmateRatioA = ($a['Crewmate_Games'] / $a['Total_Games']) * 100;
                    $crewmateRatioB = ($b['Crewmate_Games'] / $b['Total_Games']) * 100;
                    return $crewmateRatioB <=> $crewmateRatioA; // Trie par ratio décroissant
                });

                foreach ($statsResult as $row) {
                    // Si le joueur n'a pas de jeux en tant que Crewmate, on l'ignore
                    if ($row['Crewmate_Games'] == 0) {
                        continue;
                    }

                    // Calcul du ratio Crewmate, en pourcentage
                    $crewmateRatio = ($row['Total_Games'] > 0) ? number_format(($row['Crewmate_Games'] / $row['Total_Games']) * 100, 2) . "%" : "0%";

                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Crewmate_Games'] . "</td>
                            <td class='px-2 py-1'>" . $crewmateRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 3 : Ratio Imposteur -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Ratio Imposteur</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    // Calcul du ratio pour chaque joueur
                    $impostorRatioA = ($a['Impostor_Games'] / $a['Total_Games']) * 100;
                    $impostorRatioB = ($b['Impostor_Games'] / $b['Total_Games']) * 100;
                    return $impostorRatioB <=> $impostorRatioA; // Trie par ratio décroissant
                });

                foreach ($statsResult as $row) {
                    // Si le joueur n'a pas de jeux en tant qu'Imposteur, on l'ignore
                    if ($row['Impostor_Games'] == 0) {
                        continue;
                    }

                    // Calcul du ratio Imposteur, en pourcentage
                    $impostorRatio = ($row['Total_Games'] > 0) ? number_format(($row['Impostor_Games'] / $row['Total_Games']) * 100, 2) . "%" : "0%";

                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Impostor_Games'] . "</td>
                            <td class='px-2 py-1'>" . $impostorRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 4 : Ratio Jester -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Ratio Jester</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    // Calcul du ratio pour chaque joueur
                    $jesterRatioA = ($a['Jester_Games'] / $a['Total_Games']) * 100;
                    $jesterRatioB = ($b['Jester_Games'] / $b['Total_Games']) * 100;
                    return $jesterRatioB <=> $jesterRatioA; // Trie par ratio décroissant
                });

                foreach ($statsResult as $row) {
                    // Si le joueur n'a pas de jeux Jester, on l'ignore
                    if ($row['Jester_Games'] == 0) {
                        continue;
                    }

                    // Calcul du ratio Jester, en pourcentage
                    $jesterRatio = ($row['Total_Games'] > 0) ? number_format(($row['Jester_Games'] / $row['Total_Games']) * 100, 2) . "%" : "0%";

                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Jester_Games'] . "</td>
                            <td class='px-2 py-1'>" . $jesterRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 5 : Ratio Vulture -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Ratio Vulture</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    // Calcul du ratio pour chaque joueur
                    $vultureRatioA = ($a['Vulture_Games'] / $a['Total_Games']) * 100;
                    $vultureRatioB = ($b['Vulture_Games'] / $b['Total_Games']) * 100;
                    return $vultureRatioB <=> $vultureRatioA; // Trie par ratio décroissant
                });

                foreach ($statsResult as $row) {
                    // Si le joueur n'a pas de jeux Vulture, on l'ignore
                    if ($row['Vulture_Games'] == 0) {
                        continue;
                    }

                    // Calcul du ratio Vulture, en pourcentage
                    $vultureRatio = ($row['Total_Games'] > 0) ? number_format(($row['Vulture_Games'] / $row['Total_Games']) * 100, 2) . "%" : "0%";

                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Vulture_Games'] . "</td>
                            <td class='px-2 py-1'>" . $vultureRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>



    <!-- Nouvelle section avec 7 tableaux côte à côte -->
    <div class="bg-gray-300 p-4 rounded-lg shadow-md mb-6 w-auto ml-0 grid grid-cols-7 gap-4">

        <!-- Tableau 1 : Tués au T1 -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Tués au T1</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">%</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    // Calcul du nombre moyen de parties avant d'être tué au T1 pour chaque joueur
                    $averagePartiesA = ($a['T1_Count'] > 0) ? (($a['Crewmate_Games'] + $a['Jester_Games'] + $a['Vulture_Games']) / $a['T1_Count']) : PHP_INT_MAX;
                    $averagePartiesB = ($b['T1_Count'] > 0) ? (($b['T1_Count']) / ($b['Crewmate_Games'] + $b['Jester_Games'] + $b['Vulture_Games'])) : PHP_INT_MAX;
                    return $averagePartiesA <=> $averagePartiesB; // Trie par nombre moyen de parties avant d'être tué au T1
                });

                foreach ($statsResult as $row) {
                    if ($row['T1_Count'] == 0) continue;
                    // Calcul du pourcentage de fois tué au T1
                    $totalGames = $row['Crewmate_Games'] + $row['Jester_Games'] + $row['Vulture_Games'];
                    $percentage = ($totalGames > 0) ? number_format(($row['T1_Count'] / $totalGames) * 100, 2) : 0;
                    echo "<tr class='bg-white border-t'>
                    <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                    <td class='px-2 py-1'>" . $row['T1_Count'] . "</td>
                    <td class='px-2 py-1'>" . $percentage . "%</td>
                  </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>


        <!-- Tableau 2 : Voté à tort -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Voté à tort</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">X parties</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $crewmateVultureGamesA = $a['Crewmate_Games'] + $a['Vulture_Games'];
                    $crewmateVultureGamesB = $b['Crewmate_Games'] + $b['Vulture_Games'];
                    $badVoteRatioA = ($a['Bad_Vote_Count'] > 0) ? ($crewmateVultureGamesA / $a['Bad_Vote_Count']) : 0;
                    $badVoteRatioB = ($b['Bad_Vote_Count'] > 0) ? ($crewmateVultureGamesB / $b['Bad_Vote_Count']) : 0;
                    return $badVoteRatioA <=> $badVoteRatioB;
                });

                foreach ($statsResult as $row) {
                    if ($row['Bad_Vote_Count'] == 0) continue;
                    $crewmateVultureGames = $row['Crewmate_Games'] + $row['Vulture_Games'];
                    $badVoteRatio = ($row['Bad_Vote_Count'] > 0) ? number_format(($crewmateVultureGames / $row['Bad_Vote_Count']), 2) : "N/A";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Bad_Vote_Count'] . "</td>
                            <td class='px-2 py-1'>" . $badVoteRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 3 : Tasks -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Tasks</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Moyenne</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $crewmateTasksRatioA = ($a['Crewmate_Games'] > 0) ? ($a['Total_Tasks'] / $a['Crewmate_Games']) : 0;
                    $crewmateTasksRatioB = ($b['Crewmate_Games'] > 0) ? ($b['Total_Tasks'] / $b['Crewmate_Games']) : 0;
                    return $crewmateTasksRatioB <=> $crewmateTasksRatioA;
                });

                foreach ($statsResult as $row) {
                    $crewmateTasksRatio = ($row['Crewmate_Games'] > 0) ? number_format(($row['Total_Tasks'] / $row['Crewmate_Games']), 2) : "0";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $crewmateTasksRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 4 : Reported Count -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Reports</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">X parties</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $reportedRatioA = ($a['Reported_Count'] > 0) ? ($a['Total_Games'] / $a['Reported_Count']) : PHP_INT_MAX;
                    $reportedRatioB = ($b['Reported_Count'] > 0) ? ($b['Total_Games'] / $b['Reported_Count']) : PHP_INT_MAX;
                    return $reportedRatioA <=> $reportedRatioB;
                });

                foreach ($statsResult as $row) {
                    if ($row['Reported_Count'] == 0) continue;
                    $reportedRatio = ($row['Reported_Count'] > 0) ? number_format(($row['Total_Games'] / $row['Reported_Count']), 2) : "N/A";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $reportedRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 5 : Buzzers -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Buzzers</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">X parties</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $buzzRatioA = ($a['Buzz_Count'] > 0) ? ($a['Total_Games'] / $a['Buzz_Count']) : PHP_INT_MAX;
                    $buzzRatioB = ($b['Buzz_Count'] > 0) ? ($b['Total_Games'] / $b['Buzz_Count']) : PHP_INT_MAX;
                    return $buzzRatioA <=> $buzzRatioB;
                });

                foreach ($statsResult as $row) {
                    if ($row['Buzz_Count'] == 0) continue;
                    $buzzRatio = ($row['Buzz_Count'] > 0) ? number_format(($row['Total_Games'] / $row['Buzz_Count']), 2) : "N/A";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Buzz_Count'] . "</td>
                            <td class='px-2 py-1'>" . $buzzRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 6 : Ratio de Kill -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Ratio de Kill</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $killRatioA = ($a['Impostor_Games'] > 0) ? ($a['Total_Kills'] / $a['Impostor_Games']) : 0;
                    $killRatioB = ($b['Impostor_Games'] > 0) ? ($b['Total_Kills'] / $b['Impostor_Games']) : 0;
                    return $killRatioB <=> $killRatioA;
                });

                foreach ($statsResult as $row) {
                    if ($row['Impostor_Games'] == 0) continue;
                    $killRatio = ($row['Impostor_Games'] > 0) ? number_format(($row['Total_Kills'] / $row['Impostor_Games']), 2) : "N/A";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Total_Kills'] . "</td>
                            <td class='px-2 py-1'>" . $killRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 7 : Partie Finie Vivant -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Partie Finie Vivant</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $aliveRatioA = ($a['Total_Games'] > 0) ? ($a['Alive_End_Count'] / $a['Total_Games']) * 100 : 0;
                    $aliveRatioB = ($b['Total_Games'] > 0) ? ($b['Alive_End_Count'] / $b['Total_Games']) * 100 : 0;
                    return $aliveRatioB <=> $aliveRatioA;
                });

                foreach ($statsResult as $row) {
                    $aliveRatio = ($row['Total_Games'] > 0) ? number_format(($row['Alive_End_Count'] / $row['Total_Games']) * 100, 2) . "%" : "0%";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Alive_End_Count'] . "</td>
                            <td class='px-2 py-1'>" . $aliveRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>


    <!-- Nouvelle section avec 5 tableaux côte à côte -->
    <div class="bg-gray-300 p-4 rounded-lg shadow-md mb-6 w-auto ml-0 grid grid-cols-5 gap-4">

        <!-- Tableau 1 : Win Crewmate -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Win Crewmate</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $crewmateWinRatioA = ($a['Crewmate_Games'] > 0) ? ($a['Crewmate_Wins'] / $a['Crewmate_Games']) * 100 : 0;
                    $crewmateWinRatioB = ($b['Crewmate_Games'] > 0) ? ($b['Crewmate_Wins'] / $b['Crewmate_Games']) * 100 : 0;
                    return $crewmateWinRatioB <=> $crewmateWinRatioA; // Trie par ratio décroissant
                });

                foreach ($statsResult as $row) {
                    if ($row['Crewmate_Games'] == 0) continue;
                    $crewmateWinRatio = ($row['Crewmate_Games'] > 0) ? number_format(($row['Crewmate_Wins'] / $row['Crewmate_Games']) * 100, 2) . "%" : "0%";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Crewmate_Wins'] . "</td>
                            <td class='px-2 py-1'>" . $crewmateWinRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 2 : Win Imposteur -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Win Imposteur</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $impostorWinRatioA = ($a['Impostor_Games'] > 0) ? ($a['Impostor_Wins'] / $a['Impostor_Games']) * 100 : 0;
                    $impostorWinRatioB = ($b['Impostor_Games'] > 0) ? ($b['Impostor_Wins'] / $b['Impostor_Games']) * 100 : 0;
                    return $impostorWinRatioB <=> $impostorWinRatioA; // Trie par ratio décroissant
                });

                foreach ($statsResult as $row) {
                    if ($row['Impostor_Games'] == 0) continue;
                    $impostorWinRatio = ($row['Impostor_Games'] > 0) ? number_format(($row['Impostor_Wins'] / $row['Impostor_Games']) * 100, 2) . "%" : "0%";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Impostor_Wins'] . "</td>
                            <td class='px-2 py-1'>" . $impostorWinRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 3 : Win Jester -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Win Jester</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $jesterWinRatioA = ($a['Jester_Games'] > 0) ? ($a['Jester_Wins'] / $a['Jester_Games']) * 100 : 0;
                    $jesterWinRatioB = ($b['Jester_Games'] > 0) ? ($b['Jester_Wins'] / $b['Jester_Games']) * 100 : 0;
                    return $jesterWinRatioB <=> $jesterWinRatioA; // Trie par ratio décroissant
                });

                foreach ($statsResult as $row) {
                    if ($row['Jester_Games'] == 0) continue;
                    $jesterWinRatio = ($row['Jester_Games'] > 0) ? number_format(($row['Jester_Wins'] / $row['Jester_Games']) * 100, 2) . "%" : "0%";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Jester_Wins'] . "</td>
                            <td class='px-2 py-1'>" . $jesterWinRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 4 : Win Vulture -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Win Vulture</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $vultureWinRatioA = ($a['Vulture_Games'] > 0) ? ($a['Vulture_Wins'] / $a['Vulture_Games']) * 100 : 0;
                    $vultureWinRatioB = ($b['Vulture_Games'] > 0) ? ($b['Vulture_Wins'] / $b['Vulture_Games']) * 100 : 0;
                    return $vultureWinRatioB <=> $vultureWinRatioA; // Trie par ratio décroissant
                });

                foreach ($statsResult as $row) {
                    if ($row['Vulture_Games'] == 0) continue;
                    $vultureWinRatio = ($row['Vulture_Games'] > 0) ? number_format(($row['Vulture_Wins'] / $row['Vulture_Games']) * 100, 2) . "%" : "0%";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $row['Vulture_Wins'] . "</td>
                            <td class='px-2 py-1'>" . $vultureWinRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau 5 : Win Global -->
        <div>
            <h3 class="text-lg font-semibold mb-3">Win Global</h3>
            <table class="min-w-max table-auto text-xs text-left">
                <thead>
                <tr class="bg-gray-500">
                    <th class="px-2 py-1 text-white w-auto">Nom</th>
                    <th class="px-2 py-1 text-white w-auto">Nb</th>
                    <th class="px-2 py-1 text-white w-auto">Ratio</th>
                </tr>
                </thead>
                <tbody>
                <?php
                usort($statsResult, function($a, $b) {
                    $totalWinsA = $a['Crewmate_Wins'] + $a['Impostor_Wins'] + $a['Jester_Wins'] + $a['Vulture_Wins'];
                    $totalWinsB = $b['Crewmate_Wins'] + $b['Impostor_Wins'] + $b['Jester_Wins'] + $b['Vulture_Wins'];
                    $winRatioA = ($a['Total_Games'] > 0) ? ($totalWinsA / $a['Total_Games']) * 100 : 0;
                    $winRatioB = ($b['Total_Games'] > 0) ? ($totalWinsB / $b['Total_Games']) * 100 : 0;
                    return $winRatioB <=> $winRatioA; // Trie par ratio décroissant
                });

                foreach ($statsResult as $row) {
                    $totalWins = $row['Crewmate_Wins'] + $row['Impostor_Wins'] + $row['Jester_Wins'] + $row['Vulture_Wins'];
                    $winGlobalRatio = ($row['Total_Games'] > 0) ? number_format(($totalWins / $row['Total_Games']) * 100, 2) . "%" : "0%";
                    echo "<tr class='bg-white border-t'>
                            <td class='px-2 py-1'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-2 py-1'>" . $totalWins . "</td>
                            <td class='px-2 py-1'>" . $winGlobalRatio . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <h3 class="text-xl font-semibold mb-4">Stats par Map</h3>
    <!-- Affichage des statistiques par map -->
        <?php foreach ($mapStatsResult as $row) { ?>
            <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-6 grid grid-cols-5 w-auto ml-0">
                <!-- Section de stats -->
                <div class="bg-white p-4 rounded-lg shadow-sm flex-1 mr-6">
                    <h4 class="text-lg font-semibold text-gray-800"><?php echo $row['Par_Map']; ?></h4>
                    <div class="mt-2">
                        <p class="text-sm text-gray-600"><strong>Nombre de parties jouées :</strong> <?php echo $row['Total_Games']; ?></p>
                        <p class="text-sm text-gray-600"><strong>Victoires Crewmate :</strong> <?php echo $row['Crewmate_Wins']; ?></p>
                        <p class="text-sm text-gray-600"><strong>Victoires Imposteur :</strong> <?php echo $row['Impostor_Wins']; ?></p>
                        <p class="text-sm text-gray-600"><strong>Victoires Jester :</strong> <?php echo $row['Jester_Wins']; ?></p>
                        <p class="text-sm text-gray-600"><strong>Victoires Vulture :</strong> <?php echo $row['Vulture_Wins']; ?></p>
                    </div>
                </div>

                <!-- Graphique en camembert -->
                <div>
                    <canvas id="mapChart-<?php echo $row['Par_Map']; ?>" class="h-70"></canvas>
                    <script>
                        const ctx = document.getElementById('mapChart-<?php echo $row['Par_Map']; ?>').getContext('2d');
                        const mapChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: ['Crewmate', 'Impostor', 'Jester', 'Vulture'], // Labels des catégories
                                datasets: [{
                                    data: [
                                        <?php echo $row['Crewmate_Wins']; ?>,
                                        <?php echo $row['Impostor_Wins']; ?>,
                                        <?php echo $row['Jester_Wins']; ?>,
                                        <?php echo $row['Vulture_Wins']; ?>
                                    ], // Données des victoires pour chaque catégorie
                                    backgroundColor: [
                                        'rgba(54, 162, 235, 0.6)', // Bleu pour Crewmate
                                        'rgba(255, 99, 132, 0.6)', // Rouge pour Impostor
                                        'rgba(255, 159, 64, 0.6)', // Orange pour Jester
                                        'rgba(75, 192, 192, 0.6)'  // Vert pour Vulture
                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)', // Bleu pour Crewmate
                                        'rgba(255, 99, 132, 1)', // Rouge pour Impostor
                                        'rgba(255, 159, 64, 1)', // Orange pour Jester
                                        'rgba(75, 192, 192, 1)'  // Vert pour Vulture
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(tooltipItem) {
                                                return tooltipItem.label + ": " + tooltipItem.raw;
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        <?php } ?>

    <!-- Affichage des statistiques par duo -->
    <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-6 grid grid-cols-5 w-auto ml-0">
        <div>
            <h2 class="text-2xl font-semibold mb-4">Win des Duos Impo</h2>
            <table class="min-w-full table-auto bg-white text-xs leading-tight"> <!-- Taille de la police et interligne plus petits -->
                <thead class="bg-gray-500 text-white">
                <tr>
                    <th class="px-4 py-2">Duo</th>
                    <th class="px-4 py-2">Nb</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Affichage des duos et de leur fréquence
                foreach ($duos as $duoKey => $frequency) {
                    $duoPlayers = explode('-', $duoKey);
                    $playerNames = [];

                    // Récupérer les noms des joueurs pour chaque duo
                    foreach ($duoPlayers as $playerID) {
                        $nameQuery = "SELECT Jou_Nom FROM joueur WHERE Jou_ID = ?";
                        $nameStmt = $pdo->prepare($nameQuery);
                        $nameStmt->execute([$playerID]);
                        $player = $nameStmt->fetch();
                        $playerNames[] = $player['Jou_Nom'];
                    }

                    // Affichage du duo et de sa fréquence (divisée par 2)
                    echo "<tr class='text-center'>
                            <td class='px-4 py-2'>" . implode(" & ", $playerNames) . "</td>
                            <td class='px-4 py-2'>" . ($frequency / 2) . "</td>  <!-- Fréquence divisée par 2 -->
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <div></div>
        <!-- Affichage des statistiques des duos d'imposteurs qui ont perdu -->

        <div>
            <h2 class="text-2xl font-semibold mb-4">Défaites des Duos Impo</h2>
            <table class="min-w-full table-auto bg-white text-xs leading-tight">
                <thead class="bg-gray-500 text-white">
                <tr>
                    <th class="px-4 py-2">Duo</th>
                    <th class="px-4 py-2">Nb</th>  <!-- Nombre de fois que ce duo a perdu -->
                </tr>
                </thead>
                <tbody>
                <?php
                // Affichage des duos d'imposteurs avec leur fréquence de défaites
                foreach ($duosDefeats as $duoKey => $data) {
                    $duoPlayers = explode('-', $duoKey);
                    $playerNames = [];

                    // Récupérer les noms des joueurs pour chaque duo
                    foreach ($duoPlayers as $playerID) {
                        $nameQuery = "SELECT Jou_Nom FROM joueur WHERE Jou_ID = ?";
                        $nameStmt = $pdo->prepare($nameQuery);
                        $nameStmt->execute([$playerID]);
                        $player = $nameStmt->fetch();
                        $playerNames[] = $player['Jou_Nom'];
                    }

                    // Affichage du duo et de la fréquence de défaites
                    echo "<tr class='text-center'>
                           <td class='px-4 py-2'>" . implode(" & ", $playerNames) . "</td>
                           <td class='px-4 py-2'>" . ($data['frequency'] / 2) . "</td>  <!-- Fréquence divisée par 2 -->
                         </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>


    </div>

</div>

</body>
</html>