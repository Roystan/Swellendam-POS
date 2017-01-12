<?php

require_once APP . 'Vendor' . DS . 'escpos-php-master' . DS . 'example' . DS . 'member_receipt.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;

try {
    /* Date is kept the same for testing */
    // $date = date('l jS \of F Y h:i:s A');
    //$date = "Monday 6th of April 2015 02:56:25 PM";
    $date = date('l jS \of F Y');

    /* Start the printer */
    //$logo = EscposImage::load("resources/escpos-php.png", false);
    $printer = new Printer($connector);

    /* Print top logo */
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    //$printer -> graphics($logo);

    /* Information for the receipt */
    $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
    $printer -> text("Swellendam\n FuneralServices");
    $printer -> feed(2);
    $printer -> selectPrintMode();
    $printer -> setEmphasis(true);
    $printer -> text("Kantoor ure");
    $printer -> setEmphasis(false);
    $printer -> feed(1);
    $printer -> text("Maandag - Vrydag: 08:00-17:30");
    $printer -> feed(1);
    $printer -> text("Saterdag: 08:00-12:00");
    $printer -> feed(2);
    $printer -> text("Reg. 2010/036648/23");
    $printer -> feed(2);

    /* Title of receipt */
    $printer -> setEmphasis(true);
    $printer -> text("MEMBER KWITANSIE INVOICE" . ($redirect ? " AFDRUK" : ""));
    $printer -> setEmphasis(false);
    $printer -> feed(2);

    $printer -> setJustification(Printer::JUSTIFY_LEFT);
    $printer -> text("Datum:          " . $this->data['Payment']['date_for'] . "\n");
    $printer -> text("Klerk:          " . $this->Session->read('Auth.User.username') . "\n");
    $printer -> text("Kwitansie No.:    " . $payment_log_id . "\n");
    $printer -> text("Member:         " . $member['Member']['firstname'] . " " . $member['Member']['lastname'] . "\n");
    $printer -> text("Bedrag Ontvang: " . "R" . $this->data['Payment']['amount_received']);
    
    $printer -> selectPrintMode();

    /* Footer */
    $printer -> feed(2);
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> text("Dankie vir u betaling \n ontvang vandag.");
    $printer -> feed(2);
    $printer -> text("------------------------------");
    $printer -> feed(1);
    $printer -> text($date);
    $printer -> feed(5);

    /* Cut the receipt and open the cash drawer */
    $printer -> cut();
    $printer -> pulse();

    $printer -> close();

} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}

?>

<table width="100%" cellpadding="0" cellspacing="2" align="center">
    <?php
        if (!$redirect) {
    ?>
        <tr>
            <td style="font-size: 20px;" width="100%"> 
                <strong>Thank you for your payment of R <?php echo $this->data['Payment']['amount_received']; ?></strong><br/><br/><br/>
            </td>
        </tr>
    <?php 
        } 
    ?>
    <tr>
        <td style="font-size: 20px;" width="50%"> 
            <?php
                if($redirect) {
                    echo "<strong>Member receipt copy printed.</strong><br/><br/><br/>";
                    
                    echo $this->Html->link(
			__d('croogo', 'Back'), 
                        array('plugin' => 'members', 'admin' => 'true', 'controller' => 'members', 'action' => 'index'),
			array('button' => 'danger'));
                } else {
                    echo $this->Html->link(
			__d('croogo', 'Print Copy'), 
                        array('plugin' => 'members', 'admin' => 'true', 'controller' => 'members', 'action' => 'print_receipt', $this->data['Payment']['id'], true, $payment_log_id),
			array('button' => 'success'));
                } ?>
        </td>
    </tr>
</table>


