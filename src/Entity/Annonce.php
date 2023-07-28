<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AnnonceRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 255)]
    private ?string $localisation = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?\DateTime $miseEnService = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finition = null;

    #[ORM\Column(length: 255)]
    private ?string $energie = null;

    #[ORM\Column(length: 255)]
    private ?int $puissanceFiscal = null;

    #[ORM\Column(length: 255)]
    private ?int $emissionCO2 = null;

    #[ORM\Column(length: 255)]
    private ?string $boiteDeVitesse = null;

    #[ORM\Column(length: 255)]
    private ?string $nbDePortes = null;

    #[ORM\Column(length: 255)]
    private ?string $nbDePlaces = null;

    #[ORM\Column]
    private ?\DateTime $dateDernierCT = null;

    #[ORM\Column(length: 255)]
    private ?string $kmParcourus = null;

    #[ORM\Column(length: 255)]
    private ?string $couleurEXT = null;

    #[ORM\Column(length: 255)]
    private ?string $couleurINT = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $equipements = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTime $DateDispo = null;

    #[ORM\Column(length: 255)]
    private ?string $societeFinancement = null;

    #[ORM\Column]
    private ?array $contratOption = null;

    #[ORM\Column(length: 255)]
    private ?string $dureeContrat = null;

    #[ORM\Column(length: 255)]
    private ?\DateTime $dateFinContrat = null;

    #[ORM\Column(length: 255)]
    private ?string $maxKmContrat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prixKmsSupp = null;

    #[ORM\Column(length: 255)]
    private ?string $apport = null;

    #[ORM\Column(length: 255)]
    private ?string $recupApport = null;

    #[ORM\Column(length: 255)]
    private ?string $loyerMensuel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nbMoisOffert = null;

    #[ORM\Column(length: 255)]
    private ?string $typeContrat = null;

    #[ORM\Column(length: 255)]
    private ?string $typeCession = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageAvant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageArriere = null;

    #[ORM\Column]
    private ?bool $active = false;

    #[ORM\Column]
    private ?bool $bestOffer = false;

    #[ORM\ManyToOne(inversedBy: 'annonce')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $droppedUser = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $optionAchat = null;

    #[ORM\Column(length: 255)]
    private ?string $imageInterieur = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $Localisation): self
    {
        $this->localisation = $Localisation;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMiseenservice(): ?\DateTimeInterface
    {
        return $this->miseEnService;
    }

    public function setMiseenservice(\DateTimeInterface $miseenservice): self
    {
        $this->miseEnService = $miseenservice;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getFinition(): ?string
    {
        return $this->finition;
    }

    public function setFinition(string $finition): self
    {
        $this->finition = $finition;

        return $this;
    }

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(string $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getPuissanceFiscal(): ?string
    {
        return $this->puissanceFiscal;
    }

    public function setPuissanceFiscal(string $puissanceFiscal): self
    {
        $this->puissanceFiscal = $puissanceFiscal;

        return $this;
    }

    public function getEmissionCO2(): ?string
    {
        return $this->emissionCO2;
    }

    public function setEmissionCO2(string $emissionCO2): self
    {
        $this->emissionCO2 = $emissionCO2;

        return $this;
    }

    public function getBoiteDeVitesse(): ?string
    {
        return $this->boiteDeVitesse;
    }

    public function setBoiteDeVitesse(string $boiteDeVitesse): self
    {
        $this->boiteDeVitesse = $boiteDeVitesse;

        return $this;
    }

    public function getNbDePortes(): ?string
    {
        return $this->nbDePortes;
    }

    public function setNbDePortes(string $nbDePortes): self
    {
        $this->nbDePortes = $nbDePortes;

        return $this;
    }

    public function getNbDePlaces(): ?string
    {
        return $this->nbDePlaces;
    }

    public function setNbDePlaces(string $nbDePlaces): self
    {
        $this->nbDePlaces = $nbDePlaces;

        return $this;
    }

    public function getDateDernierCT(): ?\DateTimeInterface
    {
        return $this->dateDernierCT;
    }

    public function setDateDernierCT(?\DateTimeInterface $dateDernierCT): self
    {
        $this->dateDernierCT = $dateDernierCT;

        return $this;
    }

    public function getKmParcourus(): ?string
    {
        return $this->kmParcourus;
    }

    public function setKmParcourus(string $kmParcourus): self
    {
        $this->kmParcourus = $kmParcourus;

        return $this;
    }

    public function getCouleurEXT(): ?string
    {
        return $this->couleurEXT;
    }

    public function setCouleurEXT(string $couleurEXT): self
    {
        $this->couleurEXT = $couleurEXT;

        return $this;
    }

    public function getCouleurINT(): ?string
    {
        return $this->couleurINT;
    }

    public function setCouleurINT(string $couleurINT): self
    {
        $this->couleurINT = $couleurINT;

        return $this;
    }

    public function getEquipements(): ?string
    {
        return $this->equipements;
    }

    public function setEquipements(string $equipements): self
    {
        $this->equipements = $equipements;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getDateDispo(): ?\DateTimeInterface
    {
        return $this->DateDispo;
    }

    public function setDateDispo(DateTimeInterface $DateDispo): self
    {
        $this->DateDispo = $DateDispo;

        return $this;
    }

    public function getSocieteFinancement(): ?string
    {
        return $this->societeFinancement;
    }

    public function setSocieteFinancement(string $societeFinancement): self
    {
        $this->societeFinancement = $societeFinancement;

        return $this;
    }

    public function getContratOption(): ?array
    {
        return $this->contratOption;
    }

    public function setContratOption(array $contratOption): self
    {
        $this->contratOption = $contratOption;

        return $this;
    }

    public function getDureeContrat(): ?string
    {
        return $this->dureeContrat;
    }

    public function setDureeContrat(string $dureeContrat): self
    {
        $this->dureeContrat = $dureeContrat;

        return $this;
    }

    public function getDateFinContrat(): ?\DateTimeInterface
    {
        return $this->dateFinContrat;
    }

    public function setDateFinContrat(\DateTimeInterface $dateFinContrat): self
    {
        $this->dateFinContrat = $dateFinContrat;

        return $this;
    }

    public function getMaxKmContrat(): ?string
    {
        return $this->maxKmContrat;
    }

    public function setMaxKmContrat(string $maxKmContrat): self
    {
        $this->maxKmContrat = $maxKmContrat;

        return $this;
    }

    public function getPrixKmsSupp(): ?string
    {
        return $this->prixKmsSupp;
    }

    public function setPrixKmsSupp(string $prixKmsSupp): self
    {
        $this->prixKmsSupp = $prixKmsSupp;

        return $this;
    }

    public function getApport(): ?string
    {
        return $this->apport;
    }

    public function setApport(string $apport): self
    {
        $this->apport = $apport;

        return $this;
    }

    public function getRecupApport(): ?string
    {
        return $this->recupApport;
    }

    public function setRecupApport(string $recupApport): self
    {
        $this->recupApport = $recupApport;

        return $this;
    }

    public function getLoyerMensuel(): ?string
    {
        return $this->loyerMensuel;
    }

    public function setLoyerMensuel(string $loyerMensuel): self
    {
        $this->loyerMensuel = $loyerMensuel;

        return $this;
    }

    public function getNbMoisOffert(): ?string
    {
        return $this->nbMoisOffert;
    }

    public function setNbMoisOffert(string $nbMoisOffert): self
    {
        $this->nbMoisOffert = $nbMoisOffert;

        return $this;
    }

    public function getTypeContrat(): ?string
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(string $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    public function getTypeCession(): ?string
    {
        return $this->typeCession;
    }

    public function setTypeCession(string $typeCession): self
    {
        $this->typeCession = $typeCession;

        return $this;
    }

    public function getImageAvant(): ?string
    {
        return $this->imageAvant;
    }

    public function setImageAvant(string $imageAvant): self
    {
        $this->imageAvant = $imageAvant;

        return $this;
    }

    public function getImageArriere(): ?string
    {
        return $this->imageArriere;
    }

    public function setImageArriere(string $imageArriere): self
    {
        $this->imageArriere = $imageArriere;

        return $this;
    }


    public function getBestOffer(): ?bool
    {
        return $this->bestOffer;
    }

    public function setBestOffer(bool $bestOffer): self
    {
        $this->bestOffer = $bestOffer;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getDroppedUser(): ?User
    {
        return $this->droppedUser;
    }

    public function setDroppedUser(?User $droppedUser): self
    {
        $this->droppedUser = $droppedUser;

        return $this;
    }

    public function getOptionAchat(): ?string
    {
        return $this->optionAchat;
    }

    public function setOptionAchat(?string $optionAchat): self
    {
        $this->optionAchat = $optionAchat;

        return $this;
    }

    public function getImageInterieur(): ?string
    {
        return $this->imageInterieur;
    }

    public function setImageInterieur(string $imageInterieur): self
    {
        $this->imageInterieur = $imageInterieur;

        return $this;
    }
    public function __toString()
    {
        return $this->energie;
    }
}
