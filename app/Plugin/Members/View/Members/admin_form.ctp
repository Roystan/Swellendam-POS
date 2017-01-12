<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'Members'), array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->data['Member']['firstname'] . ' ' . $this->data['Member']['lastname'], array(
		'plugin' => 'members', 'controller' => 'members', 'action' => 'edit',
		$this->data['Member']['id']
	));
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__d('croogo', 'Add'), array('plugin' => 'members', 'controller' => 'members', 'action' => 'add'));
}
?>

<?php $dependant_not_covered = false; ?>

<?php echo $this->Form->create('Member');?>

<div class="row-fluid">
    <div class="span8">

        <ul class="nav nav-tabs">
            <?php
                    echo $this->Croogo->adminTab(__d('croogo', 'Profile'), '#member-main');
                    if ($this->request->params['action'] == 'admin_edit'):
                            $linked_spouses_count =  $spouses ? "(" . sizeof($spouses) . ")" : "";
                            $linked_dependants_count =  $dependants ? "(" . sizeof($dependants) . ")" : "";
                            if ($this->data['Member']['category_id'] == 2):
                                    echo $this->Croogo->adminTab(__d('croogo', 'Spouse ' . $linked_spouses_count), '#spouses-view');
                            endif;
                            echo $this->Croogo->adminTab(__d('croogo', 'Dependant/s ' . $linked_dependants_count), '#dependants-view');
                    endif;
                    echo $this->Croogo->adminTab(__d('croogo', 'Account Details'), '#member-details');
                    if ($this->request->params['action'] == 'admin_edit'):
                            echo $this->Croogo->adminTab(__d('croogo', 'Payment History'), '#payment-view');
                    endif;
                    echo $this->Croogo->adminTabs();
            ?>
        </ul>

        <div class="tab-content">

            <div id="member-main" class="tab-pane">
                <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('policyno', array(
                        'label' => __d('croogo', 'Policyno *'),
                    ));
                    echo $this->Form->input('title_id', array(
                        'label' => __d('croogo', 'Title *'),
                    ));
                    echo $this->Form->input('firstname', array(
                        'label' => __d('croogo', 'Firstname *'),
                    ));
                    echo $this->Form->input('lastname', array(
                        'label' => __d('croogo', 'Lastname *'),
                    ));
                    echo $this->Form->input('address', array(
                        'label' => __d('croogo', 'Address'),
                    ));
                    echo $this->Form->input('idnumber', array(
                        'label' => __d('croogo', 'Idnumber *'),
                    ));
                    echo $this->Form->input('dateofbirth', array(
                        'label' => __d('croogo', 'Date Of Birth'),
                        'minYear' => date('Y') - 120,
                    ));
                    echo $this->Form->input('gender_id', array(
                        'label' => __d('croogo', 'Gender'),
                    ));
                    $this->Form->inputDefaults(array(
                        'class' => 'span10',
                        'label' => false,
                    ));
                    echo $this->Form->input('category_id', array(
                        'label' => __d('croogo', 'Category'),
                    ));
                    $this->Form->inputDefaults(array(
                        'class' => 'span10',
                        'label' => false,
                    ));
                    echo $this->Form->input('telnr', array(
                        'label' => __d('croogo', 'Telephone Nr'),
                    ));
                    echo $this->Form->input('cellnr', array(
                        'label' => __d('croogo', 'Cellphone Nr'),
                    ));
                    if ($this->request->params['action'] == 'admin_edit'):
                        echo $this->Form->input('status_id', array(
                            'label' => __d('croogo', 'Status'),
                        ));
                    endif;

                ?>
            </div>
            <div id="member-details" class="tab-pane">
                <?php
                echo $this->Form->input('coveramount', array(
                    'label' => __d('croogo', 'Cover Amount'),
                ));
                echo $this->Form->input('premium', array(
                    'label' => __d('croogo', 'Premium'),
                ));
				
                ?>
            </div>
            <div id="spouses-view" class="tab-pane">

                <?php 
                
                if (!$spouses) { 
                    
                ?>

                <?php
                    echo '<br /><center>'.$this->Html->link(__d('croogo', 'Add Spouse'), array('plugin' => 'spouses', 'admin' => 'true', 'controller' => 'spouses', 'action' => 'add', $this->data['Member']['id']), array('button' => 'success')).'</center>';
                ?>

                <?php 
                
                } else { 
                    
                ?>

                    <div class="row-fluid">
                        <div class="span12">
                            <table class="table table-striped">
                                <?php
                                    $tableHeaders = $this->Html->tableHeaders(array(
                                        __d('croogo', 'Firstname'),
                                        __d('croogo', 'Lastname'),
                                        __d('croogo', 'Idnumber'),
                                        __d('croogo', 'Relationship'),
                                        __d('croogo', 'Actions'),
                                    ));
                                ?>
                                <thead>
                                    <?php echo $tableHeaders; ?>
                                </thead>
                                <?php
                                $rows = array();
                                foreach ($spouses as $spouse):
                                    $actions[] = $this->Croogo->adminRowAction('',
                                            array('plugin' => 'spouses', 'controller' => 'spouses', 'action' => 'edit', $spouse['Spouse']['id']),
                                            array('icon' => 'pencil', 'tooltip' => __d('croogo', 'Edit this item'))
                                    );
                                    $actions[] = $this->Croogo->adminRowActions($spouse['Spouse']['id']);
                                    $actions = $this->Html->div('item-actions', implode(' ', $actions));
                                    $spouse_relationship = '';

                                    foreach ($relationships AS $id => $relationship):
                                        if ($spouse['Spouse']['relationship_id'] == $id):
                                            $spouse_relationship = $relationship;
                                        endif;
                                    endforeach;
        									
                                    $rows[] = array(
                                        $spouse['Spouse']['firstname'],
                                        $spouse['Spouse']['lastname'],
                                        $spouse['Spouse']['idnumber'],
                                        $spouse_relationship,
                                        $actions,
                                    );
                                endforeach;

                                echo $this->Html->tableCells($rows);
                                ?>
                            </table>
                        </div>
                    </div>

                <?php 
                    
                } 
                
                ?>

            </div>
            <div id="dependants-view" class="tab-pane">

                <?php if ($dependants) { ?>

                <div class="row-fluid">
                    <div class="span12">
                        <table class="table table-striped">
                            <?php
                                $tableHeaders = $this->Html->tableHeaders(array(
                                    __d('croogo', 'Firstname'),
                                    __d('croogo', 'Lastname'),
                                    __d('croogo', 'Idnumber'),
                                    __d('croogo', 'Relationship'),
                                    __d('croogo', 'Age'),
                                    __d('croogo', 'Actions'),
                                ));
                            ?>
                            <thead>
                                <?php echo $tableHeaders; ?>
                            </thead>
                            <?php
                            $rows = array();

                            foreach ($dependants as $dependant):
                                    $actions = array();
                                    $actions[] = $this->Croogo->adminRowActions($dependant['Dependant']['id']);
                                    $actions[] = $this->Croogo->adminRowAction(
                                        '',
                                        array('plugin' => 'dependants', 'admin' => 'true', 'controller' => 'dependants', 'action' => 'edit', $dependant['Dependant']['id']),
                                        array('icon' => 'pencil', 'tooltip' => __d('croogo', 'Edit Dependant'))
                                    );
                                    if ($dependant['Dependant']['age'] > 21) {

                                        $dependant_not_covered = true;

                                        $actions[] = $this->Croogo->adminRowAction(
                                            '',
                                            false,
                                            array('icon' => 'flag', 'tooltip' => __d('croogo', 'Dependant not covered'))
                                        );
                                    }
                                    $actions = $this->Html->div('item-actions', implode(' ', $actions));

                                    $dependant_relationship = '';
                                    foreach ($relationships AS $id => $relationship):
                                        if ($dependant['Dependant']['relationship_id'] == $id):
                                                $dependant_relationship = $relationship;
                                        endif;
                                    endforeach;

                                    $rows[] = array(
                                        $dependant['Dependant']['firstname'],
                                        $dependant['Dependant']['lastname'],
                                        $dependant['Dependant']['idnumber'],
                                        $dependant_relationship,
                                        $dependant['Dependant']['age'],
                                        $this->Html->div('item-actions', $actions),
                                    );
                            endforeach;

                            echo $this->Html->tableCells($rows);
                            ?>
                        </table>
                    </div>
                </div>

            <?php } 
            
            echo '<br /><center>'.$this->Html->link(__d('croogo', 'Add Dependant'), array('plugin' => 'dependants', 'admin' => 'true', 'controller' => 'dependants', 'action' => 'add', $this->data['Member']['id'], $this->data['Member']['firstname'], $this->data['Member']['lastname']), array('button' => 'success')).'</center>';

            if ($dependant_not_covered):
                echo '<br /><br /><center><span style="color:#CF0606;text-align:center;">Flagged dependants is over 21!</span></center>';
            endif;

            ?>

            </div>
            <div id="payment-view" class="tab-pane">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <table class="table table-striped">
                                <?php

                                    $tableHeaders = $this->Html->tableHeaders(array(
                                        __d('croogo', 'Amount'),
                                        __d('croogo', 'Date For'),
                                        __d('croogo', 'Date Of Payment'),
                                    ));
                                ?>
                                <thead>
                                    <?php echo $tableHeaders; ?>
                                </thead>
                                <?php
                                    $rows = array();
                                    if($payments) {                                
                                        foreach ($payments as $payment):
                                            $actions = array();

                                            $rows[] = array(
                                                'R'.$payment['Payment']['amount_received'],
                                                $payment['Payment']['date_for'],
                                                $payment['Payment']['date_created'],
                                            );
                                        endforeach;
                                    } else {

                                    }

                                    echo $this->Html->tableCells($rows);
                                ?>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

            <?php echo $this->Croogo->adminTabs(); ?>
        </div>
    </div>

    <div class="span4">
	<?php
            echo $this->Html->beginBox(__d('croogo', 'Saving')) .
                $this->Form->button(__d('croogo', 'Save'), array('button' => 'success')) .
                $this->Html->link(
                __d('croogo', 'Cancel'), 
                array('action' => 'index'),
                array('button' => 'danger')
            ) .
            $this->Html->endBox();

            if ($this->request->params['action'] == 'admin_edit'):
                if($this->data['Member']['entrydate']) {
                    echo $this->Html->beginBox(__d('croogo', 'Entry Date')) .
                        $this->Form->input('entrydate', array('Entry Date' => __d('croogo', 'Entry Date'), 'readonly' => 'true')) .
                    $this->Html->endBox();
                } else {
                    echo $this->Html->beginBox(__d('croogo', 'Entry Date')) .
                        $this->Form->input('entrydate', array('Entry Date' => __d('croogo', 'Entry Date'))) .
                    $this->Html->endBox();
                }
            endif;	

            echo $this->Croogo->adminBoxes();
	?>
    </div>

</div>
<?php echo $this->Form->end(); ?>
