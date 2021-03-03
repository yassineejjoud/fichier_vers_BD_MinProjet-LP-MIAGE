<?php
            $servername = 'localhost';
            $username = 'root';
            $password = 'root';
            
            //On essaie de se connecter
            try {
                $conn = new PDO("mysql:host=$servername;dbname=bddtest", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }

            $res = fopen('test.txt', 'rb');
            
            /*Tant que la fin du fichier n'est pas atteninte, c'est-à-dire
             *tant que feof() renvoie FALSE (= tant que !feof() renvoie TRUE)
             *on echo une nouvelle ligne du fichier*/

            while (!feof($res)) {
                $ligne = fgets($res);
            }

            try {
                $sql = "INSERT INTO Clients VALUES $ligne";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
