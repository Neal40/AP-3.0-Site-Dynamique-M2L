<?php
class formation{
    use Hydrate;
    private ?int $IDFORMA= null;
    private ?string $INTITULE= null;
    private ?string $DESCRIPTIF= null;
    private ?int $DUREE= null;
    private ?string $DATEOUVERTINSCRIPTIONS= null;
    private ?string $DATECLOTUREINSCRIPTIONS= null;
    private ?int $EFFECTIF= null;

    public function __construct(?int $unIdForma, ?string $unIntitule, ?string $unDescriptif, ?int $uneDuree, ?string $uneDateOuvertureInscription, ?string $uneDateClotureInscriptions, ?int $unEffectif){
        $this->IDFORMA = $unIdForma;
        $this->INTITULE = $unIntitule;
        $this->DESCRIPTIF = $unDescriptif;
        $this->DUREE = $uneDuree;
        $this->DATEOUVERTINSCRIPTIONS = $uneDateOuvertureInscription;
        $this->DATECLOTUREINSCRIPTIONS = $uneDateClotureInscriptions;
        $this->EFFECTIF = $unEffectif;
    }

    public function getIDFORMA(){
        return $this->IDFORMA;
    }

    public function setIDFORMA(?int $unIdFormation){
        $this->IDFORMA = $unIdFormation;
    }

    public function getINTITULE(){
        return $this->INTITULE;
    }

    public function setINTITULE(?string $unINTITULE){
        $this->INTITULE = $unINTITULE;
    }

    public function getDESCRIPTIF(){
        return $this->DESCRIPTIF;
    }

    public function setDESCRIPTIF(?string $unDESCRIPTIF){
        $this->DESCRIPTIF = $unDESCRIPTIF;
    }

    public function getDUREE(){
        return $this->DUREE;
    }

    public function setDUREE(?int $uneDUREE){
        $this->DUREE = (int) $uneDUREE;
    }

    public function getDATEOUVERTINSCRIPTIONS(){
        return $this->DATEOUVERTINSCRIPTIONS;
    }

    public function setDATEOUVERTINSCRIPTIONS(string $uneDATEOUVERTINSCRIPTIONS){
        $this->DATEOUVERTINSCRIPTIONS =  $uneDATEOUVERTINSCRIPTIONS;
    }

    public function getDATECLOTUREINSCRIPTIONS(){
        return $this->DATECLOTUREINSCRIPTIONS;
    }

    public function setDATECLOTUREINSCRIPTIONS(string $uneDATECLOTUREINSCRIPTIONS){
        $this->DATECLOTUREINSCRIPTIONS =  $uneDATECLOTUREINSCRIPTIONS;
    }

    public function getEFFECTIF(){
        return $this->EFFECTIF;
    }

    public function setEFFECTIF(?int $unEFFECTIF){
        $this->EFFECTIF = $unEFFECTIF;
    }











}