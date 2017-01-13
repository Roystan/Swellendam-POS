<h2 class="hidden-desktop"><?php echo $title_for_layout; ?></h2>
<?php
$this->Html
    ->addCrumb(__d('croogo', ''), array('plugin' => 'settings', 'controller' => 'settings', 'action' => 'dashboard'), array('icon' => 'refresh'))
	->addCrumb(__d('croogo', 'Dashboard'), '/' . $this->request->url);
?>

<div class="span4">
	<?php
        
                $todays_payment_summary_tbl = '<table cellpadding="4" cellspacing="4">';
                $total = 0;
                
                $todays_payment_summary_tbl .= '
                        <tr rowspan="2">
                                <td colspan="2" align="center">---------------------------------------------------------------</td>
                        </tr>
                        <tr border-bottom="1" nobr="true">
                                <td style="font-weight:bold;width:90%;" align="left">Member / Senior Citizen</td>
                                <td style="font-weight:bold;width:90%;" align="left">Amount</td>
                        </tr>
                        <tr rowspan="2">
                                <td colspan="2" align="center">---------------------------------------------------------------</td>
                        </tr>
                        ';
                
                
                foreach ($todays_member_payment_summary_arr as $todays_member_payment_summary) {
                    $total += $todays_member_payment_summary['Payment']['amount_received'];
                    $todays_payment_summary_tbl .= 
                            '<tr>
                                    <td>' . '<font face="courier" size=2 color="blue"><strong>M</strong></font>  ' . $todays_member_payment_summary['Member']['firstname'] . ' ' . $todays_member_payment_summary['Member']['lastname'] . '</td>
                                    <td>R' . $todays_member_payment_summary['Payment']['amount_received'] . '</td>
                            </tr>';
                }
                
                foreach ($todays_senior_citizen_payment_summary_arr as $todays_senior_citizen_payment_summary) {
                    $total += $todays_senior_citizen_payment_summary['Payment']['amount_received'];
                    $todays_payment_summary_tbl .= 
                            '<tr>
                                    <td>' . '<font face="courier" size=2 color="orange"><strong>S</strong></font>  ' .$todays_senior_citizen_payment_summary['SeniorCitizen']['firstname'] . ' ' . $todays_senior_citizen_payment_summary['SeniorCitizen']['lastname'] . '</td>
                                    <td>R' . $todays_senior_citizen_payment_summary['Payment']['amount_received'] . '</td>
                            </tr>';
                }
                
                $todays_payment_summary_tbl .= '
                            <tr rowspan="2">
                                <td colspan="2" align="center">---------------------------------------------------------------</td>
                            </tr>
                            <tr>
                                    <td style="font-weight:bold;width:90%;">Total</td>
                                    <td style="font-weight:bold;width:90%;">R' . $total . '</td>
                            </tr>';
                
                $todays_payment_summary_tbl .= '</table>';
        
		echo $this->Html->beginBox(__d('croogo', 'Todays payment summary')) .
                        $todays_payment_summary_tbl . 
		$this->Html->endBox();

		echo $this->Croogo->adminBoxes();
	?>
</div>
