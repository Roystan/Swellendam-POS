<?php

$line = array();
$line[] = 'Policy No';
$line[] = 'Firstname';
$line[] = 'Lastname';
$line[] = 'ID Number';
$line[] = 'Date Of Birth';
$line[] = 'Gender';
$line[] = 'Address';
$line[] = 'Tell Nr';
$line[] = 'Cell Nr';
$line[] = 'Cover Amount';
$line[] = '';

$this->CSV->addRow($line);
 foreach ($senior_citizens as $senior_citizen)
 {
$data = array();
$data[] = $senior_citizen['SeniorCitizen']['policyno']; 
$data[] = $senior_citizen['SeniorCitizen']['firstname']; 
$data[] = $senior_citizen['SeniorCitizen']['lastname']; 
$data[] = $senior_citizen['SeniorCitizen']['idnumber']; 
$data[] = $senior_citizen['SeniorCitizen']['dateofbirth'];
$data[] = $senior_citizen['Gender']['title']; 
$data[] = $senior_citizen['SeniorCitizen']['address']; 
$data[] = $senior_citizen['SeniorCitizen']['telnr'];
$data[] = $senior_citizen['SeniorCitizen']['cellnr']; 
$data[] = $senior_citizen['SeniorCitizen']['coveramount']; 
$data[] = '';

 $this->CSV->addRow($data);
 }
 $filename='senior_citizens_' . date('Y-m-d');
 echo  $this->CSV->render($filename);
?>