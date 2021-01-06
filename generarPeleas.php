 <?php
        $idTorneo = $_GET['id'];

        include('dbmanager/config.php');
        $cma = 0;
        $sqlPMA = "SELECT first_name, last_name, birthdate, sexo, belt_id2, datediff(curdate(),birthdate)/360 AS edad FROM fighter 
                        INNER JOIN pupil ON fighter.pupil_id1 = pupil.pupil_id 
                        WHERE sexo = 'Mujer'
                        and datediff(curdate(),birthdate)/360 >= 7 
                        and datediff(curdate(),birthdate)/360 < 11 order by belt_id2 ASC";
        $resultPMA = $mysqli->query($sqlPMA);
        $nombre = array();
        $c = 0;
        if($resultPMA->num_rows > 0){
            while($row = $resultPMA->fetch_assoc()){
                $cma++;
                $idMA[$cma] = $row['pupil_id1'];
            }
        }
        $elementos = sizeof($idMA);
        $c = 1;
        if ($elementos % 2 == 0) {
            while ($c < $elementos) {
                $id1 = $idMA[$c++];
                $id2 = $idMA[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
        } else {
            while ($c < $elementos) {
                $id1 = $idMA[$c++];
                $id2 = $idMA[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
            $id1 = $idMA[$c--];
            $id2 = $idMA[$c];
            $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
        }
        ?>


        <?php
        $cmb = 0;
        $sqlPMB = "SELECT first_name, last_name, birthdate, sexo, belt_id2, datediff(curdate(),birthdate)/360 AS edad FROM fighter 
                        INNER JOIN pupil ON fighter.pupil_id1 = pupil.pupil_id 
                        WHERE sexo = 'Mujer' 
                        and datediff(curdate(),birthdate)/360 >= 11 
                        and datediff(curdate(),birthdate)/360 < 16 order by belt_id2 ASC";
        $resultPMB = $mysqli->query($sqlPMB);
        if($resultPMB->num_rows > 0){
            while($row = $resultPMB->fetch_assoc()){
                $cmb++;
                $idMB[$cmb] = $row['pupil_id1'];
            }
        }
        $elementos = sizeof($idMB);
        $c = 1;
        if ($elementos % 2 == 0) {
            while ($c < $elementos) {
                $id1 = $idMB[$c++];
                $id2 = $idMB[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
        } else {
            while ($c < $elementos) {
                $id1 = $idMB[$c++];
                $id2 = $idMB[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
            $id1 = $idMB[$c--];
            $id2 = $idMB[$c];
            $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
        }
        ?>


        <?php
        $cmc = 0;
        $sqlPMC = "SELECT first_name, last_name, birthdate, sexo, belt_id2, datediff(curdate(),birthdate)/360 AS edad FROM fighter 
                        INNER JOIN pupil ON fighter.pupil_id1 = pupil.pupil_id 
                        WHERE sexo = 'Mujer'
                        and datediff(curdate(),birthdate)/360 >= 16 
                        and datediff(curdate(),birthdate)/360 < 21 order by belt_id2 ASC";
        $resultPMC = $mysqli->query($sqlPMC);
        if($resultPMC->num_rows > 0){
            while($row = $resultPMC->fetch_assoc()){
                $cmc++;
                $idMC[$cmc] = $row['pupil_id1'];
            }
        }
        $elementos = sizeof($idMC);
        $c = 1;
        if ($elementos % 2 == 0) {
            while ($c < $elementos) {
                $id1 = $idMC[$c++];
                $id2 = $idMC[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
        } else {
            while ($c < $elementos) {
                $id1 = $idMC[$c++];
                $id2 = $idMC[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
            $id1 = $idMC[$c--];
            $id2 = $idMC[$c];
            $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
        }
        ?>


        <?php
        $cmd = 0;
        $sqlPMD = "SELECT pupil_id1, first_name, last_name, birthdate, sexo, belt_id2, datediff(curdate(),birthdate)/360 AS edad FROM fighter 
                        INNER JOIN pupil ON fighter.pupil_id1 = pupil.pupil_id 
                        WHERE sexo = 'Mujer'
                        and datediff(curdate(),birthdate)/360 >= 21 order by belt_id2 ASC";
        $resultPMD = $mysqli->query($sqlPMD);
        if($resultPMD->num_rows > 0){
            while($row = $resultPMD->fetch_assoc()){
                $cmd++;
                $idMD[$cmd] = $row['pupil_id1'];
            }
        }
        $elementos = sizeof($idMD);
        $c = 1;
        if ($elementos % 2 == 0) {
            while ($c < $elementos) {
                $id1 = $idMD[$c++];
                $id2 = $idMD[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
        } else {
            while ($c < $elementos) {
                $id1 = $idMD[$c++];
                $id2 = $idMD[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
            $id1 = $idMD[$c--];
            $id2 = $idMD[$c];
            $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
        }
        ?>


        <?php
        $cha = 0;
        $sqlPHA = "SELECT first_name, last_name, birthdate, sexo, belt_id2, datediff(curdate(),birthdate)/360 AS edad FROM fighter 
                        INNER JOIN pupil ON fighter.pupil_id1 = pupil.pupil_id 
                        WHERE sexo = 'Hombre'
                        and datediff(curdate(),birthdate)/360 >= 7 
                        and datediff(curdate(),birthdate)/360 < 11 order by belt_id2 ASC";
        $resultPHA = $mysqli->query($sqlPHA);
        if($resultPHA->num_rows > 0){
            while($row = $resultPHA->fetch_assoc()){
                $cha++;
                $idHA[$cha] = $row['pupil_id1'];
            }
        }
        $elementos = sizeof($idHA);
        $c = 1;
        if ($elementos % 2 == 0) {
            while ($c < $elementos) {
                $id1 = $idHA[$c++];
                $id2 = $idHA[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
        } else {
            while ($c < $elementos) {
                $id1 = $idHA[$c++];
                $id2 = $idHA[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
            $id1 = $idHA[$c--];
            $id2 = $idHA[$c];
            $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
        }
        ?>



        <?php
        $chb = 0;
        $sqlPHB = "SELECT first_name, last_name, birthdate, sexo, belt_id2, datediff(curdate(),birthdate)/360 AS edad FROM fighter 
                        INNER JOIN pupil ON fighter.pupil_id1 = pupil.pupil_id 
                        WHERE sexo = 'Hombre' 
                        and datediff(curdate(),birthdate)/360 >= 11 
                        and datediff(curdate(),birthdate)/360 < 16 order by belt_id2 ASC";
        $resultPHB = $mysqli->query($sqlPHB);
        if($resultPHB->num_rows > 0){
            while($row = $resultPHB->fetch_assoc()){
                $chb++;
                $idHB[$chb] = $row['pupil_id1'];
            }
        }
        $elementos = sizeof($idHB);
        $c = 1;
        if ($elementos % 2 == 0) {
            while ($c < $elementos) {
                $id1 = $idHB[$c++];
                $id2 = $idHB[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
        } else {
            while ($c < $elementos) {
                $id1 = $idHB[$c++];
                $id2 = $idHB[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
            $id1 = $idHB[$c--];
            $id2 = $idHB[$c];
            $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
        }
        ?>


        <?php
        $chc = 0;
        $sqlPHC = "SELECT first_name, last_name, birthdate, sexo, belt_id2, datediff(curdate(),birthdate)/360 AS edad FROM fighter 
                        INNER JOIN pupil ON fighter.pupil_id1 = pupil.pupil_id 
                        WHERE sexo = 'Hombre'
                        and datediff(curdate(),birthdate)/360 >= 16 
                        and datediff(curdate(),birthdate)/360 < 21 order by belt_id2 ASC";
        $resultPHC = $mysqli->query($sqlPHC);
        if($resultPHC->num_rows > 0){
            while($row = $resultPHC->fetch_assoc()){
                $chc++;
                $idHC[$chc] = $row['pupil_id1'];
            }
        }
        $elementos = sizeof($idHC);
        $c = 1;
        if ($elementos % 2 == 0) {
            while ($c < $elementos) {
                $id1 = $idHC[$c++];
                $id2 = $idHC[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
        } else {
            while ($c < $elementos) {
                $id1 = $idHC[$c++];
                $id2 = $idHC[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
            $id1 = $idHC[$c--];
            $id2 = $idHC[$c];
            $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
        }
        ?>


        <?php
        $chd = 0;
        $sqlPHD = "SELECT pupil_id1, first_name, last_name, birthdate, sexo, belt_id2, datediff(curdate(),birthdate)/360 AS edad FROM fighter 
                        INNER JOIN pupil ON fighter.pupil_id1 = pupil.pupil_id 
                        WHERE sexo = 'Hombre'
                        and datediff(curdate(),birthdate)/360 >= 21 order by belt_id2 ASC";
        $resultPHD = $mysqli->query($sqlPHD);
        if ($resultPHD->num_rows > 0) {
            while ($row = $resultPHD->fetch_assoc()) {
                $chd++;
                // $nombre[$chd] = $row['first_name'];
                $idHD[$chd] = $row['pupil_id1'];
                // echo $nombre[$chd].$chd;
            }
        }
        // echo sizeof($nombre);
        $elementos = sizeof($idHD);
        $c = 1;
        if ($elementos % 2 == 0) {
            while ($c < $elementos) {
                $id1 = $idHD[$c++];
                $id2 = $idHD[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
        } else {
            while ($c < $elementos) {
                $id1 = $idHD[$c++];
                $id2 = $idHD[$c++];
                $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
            }
            $id1 = $idHD[$c--];
            $id2 = $idHD[$c];
            $sqlPelea = "INSERT INTO `fight` (`fight_id`,`tournament_id2`, `pupil_id2`, `pupil_id3`, `winner`) 
                                VALUES (NULL, '$idTorneo', '$id1', '$id2', 'No Definido')";
                $pelea = $mysqli->query($sqlPelea);
        }
        // Vaciar la tabla fighter
        $sqlDeleteFighter = "DELETE FROM fighter";
        $deleteFighter = $mysqli->query($sqlDeleteFighter);
        header('location: torneo.php?id='.$idTorneo);
        $mysqli->close();
        ?>