<div class="members">
    <h2><?php 'admin_view'; ?></h2>

<?php 

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'Members'), '/' . $this->request->url)
	->addCrumb(__d('croogo', 'Print PDF'),array('controller'=>'members','action'=>'view_pdf', $this->data['Member']['id']), array('target'=>'_blank'));

?>

    <table width="100%" cellpadding="0" cellspacing="2">
        <tr>
            <td style="" width="42%">						
                <img src="<?php echo $this->webroot.'/img/dove_cross.png' ?>" alt="test alt attribute" width="100"  border="0" />
            </td>
            <td style="font-size: 20px;" width="100%"> 
                <strong>Main Member:</strong> <?php echo $this->data['Member']['firstname'] . ' ' . $this->data['Member']['lastname']; ?><br/><br/><br/><br/>
            </td>
        </tr>
        <tr>
            <td style="" width="50%">
                <table width="100%" cellspacing="0" cellpadding="8" style="">
                    <tr>
                        <td>
                            <strong>Address</strong><br/>
                            <strong>ID Number: </strong><br/>
                            <strong>Date Of Birth: </strong><br/>
                            <strong>Gender: </strong><br/>
                            <strong>Telephone: </strong><br/>
                            <strong>Cellphone: </strong><br/>

                        </td>
                        <td>
                            <?php echo $this->data['Member']['address']; ?><br/>
                            <?php echo $this->data['Member']['idnumber']; ?><br/>
                            <?php echo $this->data['Member']['dateofbirth']; ?><br/>
                            <?php echo $this->data['Gender']['title']; ?><br/>
                            <?php echo $this->data['Member']['telnr'] ? $this->data['Member']['telnr'] : "N/A"; ?><br/>
                            <?php echo $this->data['Member']['cellnr'] ? $this->data['Member']['cellnr'] : "N/A"; ?><br/>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="" width="50%">
                <table width="50%" cellspacing="0" cellpadding="8" style="">
                    <tr>
                        <td>
                            <strong>Policy #: </strong><br/>
                            <strong>Category: </strong><br/>
                            <strong>Premium: </strong><br/>
                            <strong>Cover Amount: </strong><br/>
                            <strong>Entry Date: </strong><br/><br/>
                        </td>
                        <td>
                            <?php echo $this->data['Member']['policyno']; ?><br/>
                            <?php echo $this->data['Category']['title']; ?><br/>
                            <?php echo $this->data['Member']['premium'] ? 'R'.$this->data['Member']['premium'] : 'N/A'; ?><br/>
                            <?php echo $this->data['Member']['coveramount'] ? 'R'.$this->data['Member']['coveramount'] : 'N/A'; ?><br/>
                            <?php echo $this->data['Member']['entrydate']; ?><br/><br/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <hr>

<?php if ($spouses) { ?>

    <center><p style="font-size: 18px"><strong>Spouse</strong></p></center>

    <table class="table table-striped">
								<?php
									$tableHeaders = $this->Html->tableHeaders(array(
										__d('croogo', 'Firstname'),
										__d('croogo', 'Lastname'),
										__d('croogo', 'Idnumber'),
										__d('croogo', 'DOB'),
										__d('croogo', 'Gender'),
										__d('croogo', 'Relationship'),
                                                                                __d('croogo', 'Cover Status'),
									));
								?>
        <thead>
									<?php echo $tableHeaders; ?>
        </thead>
								<?php
								$rows = array();
								foreach ($spouses as $spouse):
									$spouse_relationship = '';
									foreach ($spouse_relationships AS $id => $spouse_relationship):
										if ($spouse['Spouse']['relationship_id'] == $id) {
											$spouse_relationship = $spouse_relationship;
                                                                                        break;
                                                                                }
									endforeach;
                                                                        
									$rows[] = array(
										$spouse['Spouse']['firstname'],
										$spouse['Spouse']['lastname'],
										$spouse['Spouse']['idnumber'],
										$spouse['Spouse']['dateofbirth'],
										$spouse['Gender']['title'],
										$spouse_relationship,
                                                                                'covered',
									);
								endforeach;

								echo $this->Html->tableCells($rows);
								?>
    </table>

<?php } ?>

<?php if($dependants) { ?>
    <center><p style="font-size: 18px"><strong>Dependants</strong></p></center>

    <table class="table table-striped">
								<?php
                                                                
									$tableHeaders = $this->Html->tableHeaders(array(
										__d('croogo', 'Firstname'),
										__d('croogo', 'Lastname'),
										__d('croogo', 'Idnumber'),
										__d('croogo', 'DOB'),
										__d('croogo', 'Gender'),
										__d('croogo', 'Relationship'),
                                                                                __d('croogo', 'Cover Status'),
									));
								?>
        <thead>
									<?php echo $tableHeaders; ?>
        </thead>
								<?php
								$rows = array();
                                                                
								foreach ($dependants as $dependant):
                                                                    
                                                                        $is_covered = true;
                                                                        
                                                                        if ($dependant['Dependant']['age'] > 21):
                                                                                $is_covered = false;
                                                                        endif;
                                                                        
                                                                        $cover_status = $is_covered ? 'covered' : 'not covered';
                                                                    
									$dependant_relationship = '';
									$dependant_gender = '';
									foreach ($relationships AS $id => $relationship):
										if ($dependant['Dependant']['relationship_id'] == $id):
											$dependant_relationship = $relationship;
										endif;
									endforeach;
									foreach ($genders AS $id => $gender):
										if ($dependant['Dependant']['gender_id'] == $id):
											$dependant_gender = $gender;
										endif;
									endforeach;
									
									$rows[] = array(
										$dependant['Dependant']['firstname'],
										$dependant['Dependant']['lastname'],
										$dependant['Dependant']['idnumber'],
										$dependant['Dependant']['dateofbirth'],
										$dependant_gender,
										$dependant_relationship,
                                                                                $cover_status,
									);
								endforeach;

								echo $this->Html->tableCells($rows);
								?>
    </table>

<?php } ?>
    
</div>



