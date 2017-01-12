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
$line[] = 'Premium';
$line[] = '';
$line[] = 'Category';

$this->CSV->addRow($line);
 foreach ($members as $member)
 {
$data = array();
$data[] = $member['Member']['policyno']; 
$data[] = $member['Member']['firstname']; 
$data[] = $member['Member']['lastname']; 
$data[] = '\''.$member['Member']['idnumber']; 
$data[] = $member['Member']['dateofbirth'];
$data[] = $member['Gender']['title']; 
$data[] = $member['Member']['address']; 
$data[] = $member['Member']['telnr'];
$data[] = $member['Member']['cellnr']; 
$data[] = $member['Member']['coveramount']; 
$data[] = $member['Member']['premium']; 
$data[] = '';
$data[] = $member['Category']['title']; 

 $this->CSV->addRow($data);
 }
 $filename='members_' . date('Y-m-d');
 echo  $this->CSV->render($filename);
?>