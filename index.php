<?php

abstract class Humain {

    public function __construct($unNom, $unPrenom, $unAge, $unAgeSecret){

        $this->nom = $unNom;
        $this->prenom = $unPrenom;
        $this->age = $unAge;
        $this->ageSecret = $unAgeSecret;

    }

    public string $nom;
    public $prenom;
    protected int $age;
    private bool $ageSecret;

    public function presentation(){
        echo "salut je suis cool, moi c'est $this->prenom";
    }

    public function getAge(){

        if(!$this->ageSecret){
            return $this->age;
        }else{
            throw new Exception("déso tu ne peux pas afficher un age secret");
        }
    }

    public function setAge(int $age){

        if($age<=18){
            throw new Exception("déso il faut etre majeur");
        }else{
            $this->age = $age;

        }
    }


    public function disTonNom(){
        echo "mon nom de famille c'est $this->nom";
    }
    public function disTonAge(){
        if($this->estVieux()){echo "déso j'ai honte je dirais pas mon age";}
        else{        echo "j'ai $this->age ans";
        }
    }
    private function estVieux()
    {
        if($this->age > 55){
            return true;
        }else{return false;}
    }


}

class Etudiant extends Humain
{
    public function prendreDesNotes(){
        echo "je m'appelle $this->prenom la la la je prends des notes";
    }
}


class Prof extends Etudiant implements Professionel
{

    public function __construct($unNom, $unPrenom, $unAge, $unAgeSecret, $uneMatiere)
    {
        parent::__construct($unNom, $unPrenom, $unAge, $unAgeSecret);

        $this->matiere = $uneMatiere;
    }

    public function presentation()
    {

        echo "je suis cordial et vous ne m'appellerez pas par mon prenom.
        retournez travailler maintenant.
        ";

    }

    private string $matiere;


    public function getMatiere(): string
    {
        return $this->matiere;
    }


    public function payerLesImpots()
    {
        // TODO: Implement payerLesImpots() method.
    }
}

class Boulanger extends Humain implements Professionel
{
    public function faireDuPain()
    {
        echo "tiens voila une baguette";
    }
    public function payerLesImpots()
    {

        echo "je paye des impots sur la boulangerie";
    }
}



$etudiant = new Etudiant("Besson", "Luc", 24, false);

// 500 lignes de code

echo $etudiant->getAge();
$etudiant->setAge(60);
echo "<hr>";
//echo $etudiant->getAge();

$etudiant->disTonAge();
$etudiant->presentation();
echo "<hr>";

$nouveauProf = new Prof("Spielberg", "Steven", 75, false,"cinema");

$nouveauProf->prendreDesNotes();
echo "<hr>";
$nouveauProf->presentation();

$nouveauProf->getAge();
//$etudiant2 = new Etudiant();


interface Professionel
{
    public function payerLesImpots();
    public function disTonNom();
}

class Recruteur extends Humain
{
    public function engager(Professionel $objet)
    {
        echo "bienvenue chez Carglass, {$objet->disTonNom()}";
    }
}

$recruteur = new Recruteur("Corbeau", "Etienne", 45, false);

$boulanger = new Boulanger("LaMiche", "Frederic" ,34, false);

// if le poste est libre
$recruteur->engager($boulanger);

//ca ca marchera pas
$recruteur->engager($etudiant);


class MachineACafe
{
    public static function expresso(){
        echo "voila votre café";
    }
}
// polymorphisme


MachineACafe::expresso();

