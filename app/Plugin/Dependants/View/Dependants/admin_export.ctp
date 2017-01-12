<?php

$line = array();
$line[] = 'Policy No.';
$line[] = 'Firstname';
$line[] = 'Lastname';
$line[] = 'ID Number';
$line[] = 'Date Of Birth';
$line[] = 'Gender';
$line[] = 'Address';
$line[] = 'Tell Nr';
$line[] = 'Cell Nr';
$line[] = '';
$line[] = 'Relationship';
$line[] = 'Age';
$line[] = 'Cover Status';

$this->CSV->addRow($line);
 foreach ($dependants as $dependant)
 {
    $data = array();
    $data[] = $dependant['Member']['policyno']; 
    $data[] = $dependant['Dependant']['firstname']; 
    $data[] = $dependant['Dependant']['lastname']; 
    $data[] = '\''.$dependant['Dependant']['idnumber']; 
    $data[] = $dependant['Dependant']['dateofbirth'];
    $data[] = $dependant['Gender']['title']; 
    $data[] = $dependant['Dependant']['address']; 
    $data[] = $dependant['Dependant']['telnr'];
    $data[] = $dependant['Dependant']['cellnr']; 
    $data[] = '';
    $data[] = $dependant['Relationship']['title']; 
    $data[] = $dependant['Dependant']['age'];
    
    $is_covered = true;
    if ($dependant['Dependant']['age'] > 21){
            $is_covered = false;
    }
    $data[] = $is_covered ? 'covered' : 'not covered';

     $this->CSV->addRow($data);
 }
 $filename='dependants_' . date('Y-m-d');
 echo  $this->CSV->render($filename);
?>