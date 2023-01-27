<?php

require_once 'Form.php';

class Form2 extends Form
{

    public function __construct()
    {
        parent::__construct();
    }

    function setCheckbox(string $id, string $name){
        parent::setFormulaire( parent::getFormulaire().'<input type="checkbox" id="'. $id .'" name="'. $name .'"><br>');
    }

    function setRadio(string $id, string $name){
        parent::setFormulaire( parent::getFormulaire().'<input type="radio" id="'. $id .'" name="'. $name .'"><br>');
    }

}

$test = new Form2();
$test->setText('id1', 'nom1', 1,1);
$test->setText('id2', 'nom2', 2,2);

$test->setCheckbox('idcb1', 'nomcb1');
$test->setCheckbox('idcb2', 'nomcb2');
$test->setRadio('idrd1', 'nomrd1');
$test->setRadio('idrd2', 'nomrd2');

$test->setSubmit('unBouton');
$test->setSubmit('unAutreBouton');
$test->getForm();