<div class="senior_citizens">
	<h2><?php 'admin_view'; ?></h2>

<?php 

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'SeniorCitizens'), '/' . $this->request->url)
	->addCrumb(__d('croogo', 'Print PDF'),array('controller'=>'senior_citizens','action'=>'view_pdf', $this->data['SeniorCitizen']['id']), array('target'=>'_blank'));

?>

<table width="100%" cellpadding="0" cellspacing="2">
	<tr>
                <td style="" width="42%">						
			<img src="<?php echo $this->webroot.'/img/dove_cross.png' ?>" alt="test alt attribute" width="100"  border="0" />
		</td>
		<td style="font-size: 20px;" width="100%"> 
			<strong>Senior Citizen:</strong> <?php echo $this->data['SeniorCitizen']['firstname'] . ' ' . $this->data['SeniorCitizen']['lastname']; ?><br/><br/><br/><br/>
		</td>
	</tr>
	<tr>
            <td style="" width="50%">
                <table width="100%" cellspacing="0" cellpadding="8" style="">
                    <tr >	
                        <td>
                                <strong>Address</strong><br/>
                                <strong>ID Number: </strong><br/>
                                <strong>Date Of Birth: </strong><br/>
                                <strong>Gender: </strong><br/>
                                <strong>Telephone: </strong><br/>
                                <strong>Cellphone: </strong><br/>
                        </td>	
                        <td>
                                <?php echo $this->data['SeniorCitizen']['address']; ?><br/>
                                <?php echo $this->data['SeniorCitizen']['idnumber']; ?><br/>
                                <?php echo $this->data['SeniorCitizen']['dateofbirth']; ?><br/>
                                <?php echo $this->data['Gender']['title']; ?><br/>
                                <?php echo $this->data['SeniorCitizen']['telnr'] ? $this->data['SeniorCitizen']['telnr'] : "N/A"; ?><br/>
                                <?php echo $this->data['SeniorCitizen']['cellnr'] ? $this->data['SeniorCitizen']['cellnr'] : "N/A"; ?><br/>
                        </td>	
                    </tr>				
                </table>

            </td>
            <td style="" width="50%">
                <table width="50%" cellspacing="0" cellpadding="8" style="">
                    <tr >	
                        <td style="width: 30%;">
                                <strong>Policy No: </strong><br/>
                                <strong>Premium: </strong><br/>
                                <strong>Entry Date: </strong><br/><br/><br/><br/>			
                        </td>							
                        <td style="width: 30%;">
                                <?php echo $this->data['SeniorCitizen']['policyno']; ?><br/>
                                <?php echo $this->data['SeniorCitizen']['premium']; ?><br/>
                                <?php echo $this->data['SeniorCitizen']['entrydate']; ?><br/><br/><br/><br/>			
                        </td>							
                    </tr>						
                </table>
            </td>
	</tr>
</table>
</div>



