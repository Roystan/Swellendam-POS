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

$this->CSV->addRow($line);
 foreach ($spouses as $spouse)
 {
$data = array();
$data[] = $spouse['Member']['policyno']; 
$data[] = $spouse['Spouse']['firstname']; 
$data[] = $spouse['Spouse']['lastname']; 
$data[] = '\''.$spouse['Spouse']['idnumber']; 
$data[] = $spouse['Spouse']['dateofbirth'];
$data[] = $spouse['Gender']['title']; 
$data[] = $spouse['Spouse']['address']; 
$data[] = $spouse['Spouse']['telnr'];
$data[] = $spouse['Spouse']['cellnr']; 
$data[] = '';
$data[] = $spouse['Relationship']['title']; 

 $this->CSV->addRow($data);
 }
 $filename='spouses_' . date('Y-m-d');
 echo  $this->CSV->render($filename);
?>