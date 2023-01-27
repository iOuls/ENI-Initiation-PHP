<?php

class Form
{
    private string $formulaire;

    public function __construct()
    {
        $this->formulaire = '<form><fieldset>';
    }

    function setText(string $id, string $name, int $rows, int $cols){
        $this->formulaire .= '<textarea id="' . $id . '" name="'
            . $name . '" rows="' . $rows . '" cols="' . $cols . '"></textarea><br>';
    }

    function setSubmit(string $value){
        $this->formulaire .= '<input type="submit" value="' . $value . '"><br>';
    }

    function getForm(){
        $this->formulaire .= '</form></fieldset>';
        echo $this->formulaire;
    }

    public function getFormulaire(): string
    {
        return $this->formulaire;
    }

    public function setFormulaire(string $formulaire): void
    {
        $this->formulaire = $formulaire;
    }


}
/*
$test = new Form();
$test->setText('id1', 'nom1', 1,1);
$test->setText('id2', 'nom2', 2,2);
$test->setSubmit('unBouton');
$test->setSubmit('unAutreBouton');
$test->getForm();
*/