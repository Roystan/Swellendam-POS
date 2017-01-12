<?php
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb(__d('croogo', ''), array('plugin' => 'settings', 'controller' => 'settings', 'action' => 'dashboard'), array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Members'), '/' . $this->request->url)
	->addCrumb(__d('croogo', 'Export CSV'),array('controller'=>'members','action'=>'export'), array('target'=>'_blank'));
ddd
?>
<?php $this->start('actions'); ?>
<?php
	echo $this->Croogo->adminAction(
		__d('croogo', 'New Member'),
		array('action' => 'add'),
		array('button' => 'success')
	);
    
//    echo $this->element('sql_dump');
    
?>
<?php $this->end(); ?>
<div class="row-fluid">
	<div class="span12">
		<table class="table table-bordered">
		<?php
			$tableHeaders = $this->Html->tableHeaders(array(
				$this->Paginator->sort('policyno', __d('croogo', 'Policy No')),
                $this->Paginator->sort('lastname', __d('croogo', 'Lastname')),
				$this->Paginator->sort('firstname', __d('croogo', 'Firstname')),
				$this->Paginator->sort('idnumber', __d('croogo', 'Id Number')),
                                $this->Paginator->sort('premium', __d('croogo', 'Premium')),
				$this->Paginator->sort('Category.title', __d('croogo', 'Category')),
                                $this->Paginator->sort('status_id', __d('croogo', 'Status')),
                                $this->Paginator->sort('status_id', __d('croogo', 'Payment Date Due')),
					__d('croogo', 'Actions'),
				''
			));
		?>
			<thead>
				<?php echo $tableHeaders; ?>
			</thead>

			<tbody>
			<?php foreach ($members as $member):
                            
                            if(!$member['Member']['next_payment_date'] || ($member['Member']['next_payment_date'] >= date('Y-m-d'))){
			
                                    $member['Member']['in_arrears'] = 0;

                            } else {

                                    $diff = abs(strtotime(date('Y-m-d')) - strtotime($member['Member']['latest_payment_date']));
                                    
                                    $years = floor($diff / (365*60*60*24));
                                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

                                    $member['Member']['in_arrears'] = $months;
                            }
                            
                        ?>
                            <tr class=<?php echo $member['Member']['in_arrears'] ? "label-important" : "" ?>>
                                    <td style=<?php echo $member['Member']['in_arrears'] ? "'color: #ffffff'" : "" ?>>
                                            <?php echo $member['Member']['policyno']; ?>
                                    </td>
                                    <td style=<?php echo $member['Member']['in_arrears'] ? "'color: #ffffff'" : "" ?>>
                                            <?php echo $member['Member']['lastname']; ?>
                                    </td>
                                    <td style=<?php echo $member['Member']['in_arrears'] ? "'color: #ffffff'" : "" ?>>
                                            <?php echo $member['Member']['firstname']; ?>
                                    </td>
                                    <td style=<?php echo $member['Member']['in_arrears'] ? "'color: #ffffff'" : "" ?>>
                                            <?php echo $member['Member']['idnumber']; ?>
                                    </td>
                                    <td style=<?php echo $member['Member']['in_arrears'] ? "'color: #ffffff'" : "" ?>>
                                            <?php echo $member['Member']['premium']; ?>
                                    </td>
                                    <td style=<?php echo $member['Member']['in_arrears'] ? "'color: #ffffff'" : "" ?>>
                                            <?php echo $member['Category']['title']; ?>
                                    </td>
                                    <td>
                                    <?php
                                    if ($member['Member']['in_arrears']){
                                        
                                        $prefix = "";
                                        $num = $member['Member']['in_arrears'] % 100; // protect against large numbers
                                        
                                        if($num < 11 || $num > 13){
                                                 switch($num % 10){
                                                        case 1: $prefix = 'st';
                                                            break;
                                                        case 2: $prefix = 'nd';
                                                            break;
                                                        case 3: $prefix = 'rd';
                                                            break;
                                                }
                                        } else {
                                            $prefix = 'th';
                                        }
                                    ?>
                                        <span class="label label-info"><?php echo  __d('croogo', $member['Member']['in_arrears'].''.$prefix.' month in arrears'); ?></span>

                                    <?php
                                    } else {
                                        if($member['Member']['next_payment_date']) {
                                            echo $this->Html->status($member['Member']['in_arrears'] ? 0 : 1);
                                        } else {
                                    ?>
                                        <span class="label label-info"><?php echo __d('croogo', 'no payment history'); ?></span>
                                    <?php    
                                        }
                                    }
                                    ?>
                                    </td>
                                    <td style=<?php echo $member['Member']['in_arrears'] ? "'color: #ffffff'" : "" ?>>
                                            <?php echo $member['Member']['next_payment_date']; ?>
                                    </td>
                                    <td>
                                            <div class="item-actions">
                                            <?php
                                                    echo $this->Croogo->adminRowActions($member['Member']['id']);
                                                    echo ' ' . $this->Croogo->adminRowAction('',
                                                            array('action' => 'view', $member['Member']['id']),
                                                            array('icon' => 'zoom-in', 'tooltip' => __d('croogo', 'View member details'))
                                                    );
                                                    echo ' ' . $this->Croogo->adminRowAction('',
                                                            array('action' => 'edit', $member['Member']['id']),
                                                            array('icon' => 'pencil', 'tooltip' => __d('croogo', 'Edit this member'))
                                                    );
                                                    echo ' ' . $this->Croogo->adminRowAction('',
                                                            array('action' => 'capture_payment', $member['Member']['id']),
                                                            array('icon' => 'credit-card', 'tooltip' => __d('croogo', 'Capture Payment'))
                                                    );
                                                    echo ' ' . $this->Croogo->adminRowAction('',
                                                            array('action' => 'delete', $member['Member']['id']),
                                                            array('icon' => 'trash', 'tooltip' => __d('croogo', 'Delete this member')),
                                                                    __d('croogo', 'Are you sure you want to delete this member?')
                                                    );
                                            ?>
                                            </div>
                                    </td>
                            </tr>
			<?php endforeach ?>
			</tbody>

		</table>

		<div class="row-fluid">
			<div id="bulk-action" class="control-group">
			<?php
				/*echo $this->Form->input('Member.action', array(
					'label' => __d('croogo', 'Applying to selected'),
					'div' => 'input inline',
					'options' => array(
						'publish' => __d('croogo', 'Publish'),
						'unpublish' => __d('croogo', 'Unpublish'),
						'promote' => __d('croogo', 'Promote'),
						'unpromote' => __d('croogo', 'Unpromote'),
						'delete' => __d('croogo', 'Delete'),
					),
					'empty' => true,
				));*/
			?>
				<div class="controls">
				<?php
					/*$jsVarName = uniqid('confirmMessage_');
					echo $this->Form->button(__d('croogo', 'Submit'), array(
						'type' => 'button',
						'onclick' => sprintf('return Members.confirmProcess(app.%s)', $jsVarName),
					));
					$this->Js->set($jsVarName, __d('croogo', '%s selected items?'));*/
				?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Form->end(); ?>

