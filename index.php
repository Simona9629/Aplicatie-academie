<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Academie</h1>
        <h2>Formular adaugare curs</h2>
        <form method="post" >
            <table>
                <tr>
                    <td><label for="curs">Curs</label></td>
                    <td><input type="text" name="curs" id="curs"/></td>
                </tr>
                <tr>
                    <td><label for="data">Data</label></td>
                    <td><input type="date" name="data" id="data"/></td>
                </tr>
                <tr>
                    <td><label for="sala">Sala</label></td>
                    <td><input type="number" name="sala" id="sala"/></td>
                </tr>
                <tr>
                    <td><input type="submit" name="inregistrare" value="Adauga"/></td>
                </tr>
            </table>
        </form>
        
        <br>
      
        <h2>Formular adaugare instructor</h2>
        <form method="post" >
            <table>
                <tr>
                    <td><label for="nume">Instructor</label></td>
                    <td><input type="text" name="nume" id="nume"/></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" id="email"/></td>
                </tr>
                <tr>
                    <td><label>Specializare</label></td>
                    <td><input type="text" name="specializare" id="specializare"/></td>
                </tr>
                <tr>
                    <td><input type="submit" name="adauga_instructor" value="Adauga"/></td>
                </tr>
            </table>
        </form>
        <?php
        // put your code here
        require_once 'functions/mysql_functions.php';
        
        if (isset($_POST['inregistrare'])) {
            $denumire = $_POST['curs'];
            $data_incepere = $_POST['data'];
            $sala = $_POST['sala'];
            
            $rezultat_curs = adaugaCurs($denumire, $data_incepere, $sala);  
            if ($rezultat_curs) {
                print '<p style="color: green"> Curs adaugat cu succes</p>';
            } else {
                print '<p style="color: red"> ERROR: Cursul nu a fost adaugat </p>';
            }
        }
        
        $cursuri = preiaCursuri();

//        foreach ($cursuri as $curs) {
//            print 'Detalii curs: <br>';
//            foreach ($curs as $detaliu => $valoare) {
//                print $detaliu . ' : ' . $valoare . '<br>';
//            }
//            print '<br>';
//        }
        foreach ($cursuri as $curs) {
            print $curs['denumire'] . ' [data_incepere: ' . $curs['data_incepere'] . '] are loc in sala ' . $curs['sala'];
            print '<br>';
        }
        print '<br>';
        print '<br>';
        
        if (isset($_POST['adauga_instructor'])) {
            $nume = $_POST['nume'];
            $email = $_POST['email'];
            $specializare = $_POST['specializare'];
            
            $rezultat_instr = adaugaInstructor($nume, $email, $specializare);
            if ($rezultat_instr) {
                print '<p style="color: green"> Instructor adaugat cu succes</p>';
            } else {
                print '<p style="color: red"> ERROR: Instructorul nu a fost adaugat </p>';
            }
        }
        print '<br>';
        
        $instructori = preiaInstructori();

//        foreach ($instructori as $instr) {
//            print 'Contact instructor: <br>';
//            foreach ($instr as $detaliu => $valoare) {
//                print $detaliu . ' : ' . $valoare . '<br>';
//            }
//            print '<br>';
//        }
        foreach ($instructori as $i) {
            print $i['nume']. ' [email: ' . $i['email'] . '] - specializare ' . $i['specializare'];
            print '<br>';
        }
        
        ?>
        
    </body>
</html>
