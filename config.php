<?php
	// Para conectar ao banco de dados
	$bdhost      = "localhost";
	$bdusuario   = "root";
	$bdsenha     = "q1w2e3r4";
	$basededados = "my_db";

	if (!$con = mysql_connect($bdhost,$bdusuario,$bdsenha)) 
		echo 'Erro ao conectar-se ao MySQL'; 
	elseif (!mysql_select_db($basededados,$con)) 
		echo 'Erro ao selecionar a base de dados';
	else 
		return $con;
?>


<?php
	// Usado para criar o banco de dados inicial
/*
	$con = mysql_connect("localhost","root","q1w2e3r4");
	if (!$con){
			die('Could not connect: ' . mysql_error());
	}*/
	/*if (mysql_query("CREATE DATABASE my_db",$con)){
		echo "Database created";
	}
	else{
		echo "Error creating database: " . mysql_error();
	} 

	//Seleciona o database "my_db"
	mysql_select_db("my_db", $con);	
	$sql = "CREATE TABLE Professores
		( 
			professorID int NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(professorID),
			Nome varchar(15),
			Sobrenome varchar(15),
			Materias varchar(60),
			Dias varchar(10)
		)";
	if (mysql_query($sql,$con)){
		echo "Criou Tabela";
	}
	else {
		echo "Error creating table: " . mysql_error();
	}

	//Seleciona o database "my_db"
	mysql_select_db("my_db", $con);

	//Recria a Tabela
	$sql = "CREATE TABLE Materias
		( 
			materiaID int NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(materiaID),
			Nome varchar(20)
		)";
	if (mysql_query($sql,$con)){
		echo "Criou Tabela";
	}
	else {
		echo "Error creating table: " . mysql_error();
	}

	//Seleciona o database "my_db"
	mysql_select_db("my_db", $con);

	//Recria a Tabela
	$sql = "CREATE TABLE Turmas
		( 
			turmaID int NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(turmaID),
			Nome varchar(20)
		)";
	if (mysql_query($sql,$con)){
		echo "Criou Tabela";
	}
	else {
		echo "Error creating table: " . mysql_error();
	}
	mysql_close($con);
*/?> 