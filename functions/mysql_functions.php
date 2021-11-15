<?php
function conectareBD($host='localhost', $user='root', $password='', $database='academie')
{
    return mysqli_connect($host, $user, $password, $database);
}

function adaugaCurs($denumire, $data_incepere,$sala)
{
    $link = conectareBD();
    $query = "INSERT INTO curs VALUES(null, '$denumire', '$data_incepere',$sala)";
    return mysqli_query($link, $query);
}
function preiaCursuri()
{
    $link = conectareBD();
    $query = "SELECT * FROM curs";
    $rezultat = mysqli_query($link, $query);
    $cursuri = mysqli_fetch_all($rezultat, MYSQLI_ASSOC);
    return $cursuri;
}

function adaugaInstructor($nume, $email, $specializare)
{
    $link = conectareBD();
    $query = "INSERT INTO instructor VALUES(null, '$nume', '$email', '$specializare')";
    return mysqli_query($link, $query);
}

function preiaInstructori()
{
    $link = conectareBD();
    $query = "SELECT * FROM instructor";
    $rez = mysqli_query($link, $query);
    $instructori = mysqli_fetch_all($rez, MYSQLI_ASSOC);
    return $instructori;
}