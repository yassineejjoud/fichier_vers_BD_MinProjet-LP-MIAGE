<?php
            //requette de creation de la Base de donnees
            // CREATE TABLE Client(
            //     cin varchar(10),
            //     nom varchar(30),
            //     prenom varchar(30),
            //     email varchar(60),
            //     tel varchar(10)
            // )


            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On essaie de se connecter
            try {
                $conn = new PDO("mysql:host=$servername;dbname=bddtest", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie , clients ajoutés avec succes';
            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }



            $file= new SplFileObject('data.txt');
            while(!$file->eof())
            {
          	$line=$file->fgets();
          	list($cin,$nom,$prenom,$email,$tel)=explode(';',$line);
    
         	$sth = $conn->prepare('INSERT INTO client values(?,?,?,?,?)');
        	$sth->bindValue(1,$cin,PDO::PARAM_STR);
        	$sth->bindValue(2,$nom,PDO::PARAM_STR);       
       		$sth->bindValue(3,$prenom,PDO::PARAM_STR);
        	$sth->bindValue(4,$email,PDO::PARAM_STR);
        	$sth->bindValue(5,$tel,PDO::PARAM_STR);
        	$sth->execute();   

}




           /* $res = fopen('test.txt', 'rb');
            
            /*Tant que la fin du fichier n'est pas atteninte, c'est-à-dire
             *tant que feof() renvoie FALSE (= tant que !feof() renvoie TRUE)
             *on echo une nouvelle ligne du fichier*/

           /* while (!feof($res)) {
               // $ligne = fgets($res);
            /*}
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
             // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            if ($_FILES['file']['type'] != 'text/plain') {
            }
            try {
                $sql = "INSERT INTO client VALUES $ligne";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                */

                
            
