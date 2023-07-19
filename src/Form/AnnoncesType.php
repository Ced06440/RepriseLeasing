<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\File;

class AnnoncesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            // Debut Vehicule //

            ->add('immatriculation', TextType::class, [
                "required" => true,
                "constraints" => new Length(0,7),
                "attr" =>[
                    "placeholder" => "Immatriculation",
                ]
                
            ])

            ->add('localisation', ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "localisation",
                ],
                "choices" => [
                    "Ain (01)" => "01",
                    "Aisne (02)" => "02",
                    "Allier (03)" => "03",
                    "Alpes de Hautes-Provence (04)" => "04",
                    "Haute-Alpes (05)" => "05",
                    "Alpes-Maritimes (06)" => "06",
                    "Ardêche (07)" => "07",
                    "Ardennes (08)" => "08",
                    "Ariège (09)" => "09",
                    "Aube (10)" => "10",
                    "Aude (11)" => "11",
                    "Aveyron (12)" => "12",
                    "Bouches-du-Rhône (13)" => "13",
                    "Calvados (14)" => "14",
                    "Cantal (15)" => "15",
                    "Charente (16)" => "16",
                    "Charente (17)" => "17",
                    "Charente-Maritime (18)" => "18",
                    "Cher (19)" => "19",
                    "Corrèze (20)" => "20",
                    "Corse-du-Sud (2A)" => "2A",
                    "Haute-Corse (2B)" => "2B",
                    "Côte-d'Or (21)" => "21",
                    "Côtes d'Armor (22)" => "22",
                    "Creuse (23)" => "23",
                    "Dordogne (24)" => "24",
                    "Doubs (25)" => "25",
                    "Drôme (26)" => "26",
                    "Eure (27)" => "27",
                    "Eure-et-Loire (28)" => "28",
                    "Finistère (29)" => "29",
                    "Gard (30)" => "30",
                    "Haute-Garonne (31)" => "31",
                    "Gers (32)" => "32",
                    "Gironde (33)" => "33",
                    "Hérault (34)" => "34",
                    "Ile-et-Vilaine (35)" => "35",
                    "Indre (36)" => "36",
                    "Indre-et-Loire (37)" => "37",
                    "Isère (38)" => "38",
                    "Jura (39)" => "39",
                    "Landes (40)" => "40",
                    "Loir-et-Cher (41)" => "41",
                    "Loire (42)" => "42",
                    "Haute-Loire (43)" => "43",
                    "Loire-Atlantique (44)" => "44",
                    "Loiret (45)" => "45",
                    "Lot (46)" => "46",
                    "Lot-et-Garonne (47)" => "47",
                    "Lozère (48)" => "48",
                    "Maine-et-Loire (49)" => "49",
                    "Manche (50)" => "50",
                    "Marne (51)" => "51",
                    "Haute-Marne (52)" => "52",
                    "Mayenne (53)" => "53",
                    "Meurthe-et-Moselle (54)" => "54",
                    "Meuse (55)" => "55",
                    "Morbihan (56)" => "56",
                    "Moselle (57)" => "57",
                    "Nièvre (58)" => "58",
                    "Nord (59)" => "59",
                    "Oise (60)" => "60",
                    "Orne (61)" => "61",
                    "Pas-de-Calais (62)" => "62",
                    "Puy-de-Dôme (63)" => "63",
                    "Pyrénées-Atlantique (64)" => "64",
                    "Hautes-Pyrénées (65)" => "65",
                    "Pyrénées-Orientales (66)" => "66",
                    "Bas-Rhin (67)" => "67",
                    "Haut-Rhin (68)" => "68",
                    "Rhônes (69)" => "69",
                    "Haute-Saône (70)" => "70",
                    "Saône-et-loire (71)" => "71",
                    "Sarthe (72)" => "72",
                    "Savoie (73)" => "73",
                    "Haute-Savoie (74)" => "74",
                    "Paris (75)" => "75",
                    "Seine-Maritime (76)" => "76",
                    "Seine-et-Marne (77)" => "77",
                    "Yvelines (78)" => "78",
                    "Deux-Sévres (79)" => "79",
                    "Somme (80)" => "80",
                    "Tarn (81)" => "81",
                    "Tarn-et-Garonne (82)" => "82",
                    "Var (83)" => "83",
                    "Vaucluse (84)" => "84",
                    "Vendée (85)" => "85",
                    "Vienne (86)" => "86",
                    "Haute-Vienne (87)" => "87",
                    "Vosges (88)" => "88",
                    "Yonne (89)" => "89",
                    "Territoire-de-Belfort (90)" => "90",
                    "Essone (91)" => "91",
                    "Hauts-de-Seine (92)" => "92",
                    "Seine-Saint-Denis (93)" => "93",
                    "Val-de-Marne (94)" => "94",
                    "Val-d'Oise (95)" => "95",

                ]
            ])

            ->add('DateDispo', DateType::class, [
                'widget' => 'single_text',
            ])

            ->add('type', ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "Type",
                ],
                "choices" => [
                    "Véhicule particulier" => "Particulier",
                    "Véhicule utilitaire" => "Utilitaire",
                ]
            ])

            ->add('miseEnService', DateType::class, [
                "label" => "Date de mise en circulation",
                "widget" => "single_text",
                "required" => true,
            ])

            ->add('marque', TextType::class,[
                "required" => true,
            ])

            ->add('modele', TextType::class,[
                "required" => true,
            ])

            ->add('finition', TextType::class,[
                "required" => false,
            ])

            ->add('energie', ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "Energie",
                ],
                "choices" => [
                    "Diesel" => "Diesel",
                    "Essence" => "Essence",
                    "GNV (Gaz Naturel Vehicule)" => "GNV",
                    "Electrique" => "Electrique",
                    "Hybride" => "Hybride",
                    "Biocarburant" => "Biocarburant",
                ]
            ])

            ->add('puissanceFiscal', IntegerType::class,[
                "required" => true,
                "constraints" => new Length(0,3)
            ])

            ->add('emissionCO2', IntegerType::class,[
                "required" => true,
                "constraints" => new Length(0,2)
            ])

            ->add('boiteDeVitesse', ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "Boite de vitesse",
                ],
                "choices" => [
                    "Manuel" => "Manuel",
                    "Automatique" => "Automatique",
                    "Semi-automatique" => "Semi-automatique",
                ]
            ])

            ->add('nbDePortes', ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "Nombre de portes",
                ],
                "choices" => [
                    "3 portes" => "3 portes",
                    "5 portes" => "5 portes",
                ]
            ])

            ->add('nbDePlaces', ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "Nombre de places",
                ],
                "choices" => [
                    "2 places" => "2 places",
                    "3 places" => "3 places",
                    "4 places" => "4 places",
                    "5 places" => "5 places",
                    "6 et plus" => "6 et plus",
                ]
            ])

            ->add('dateDernierCT', DateType::class, [
                "label" => "Date de mise en circulation",
                "widget" => "single_text",
                "required" => true,
            ])

            ->add('kmParcourus', IntegerType::class, [])

            ->add('couleurEXT', TextType::class, [
                "required" => true,
            ])

            ->add('couleurINT', TextType::class, [
                "required" => true,
            ])

            ->add('equipements', TextareaType::class, [
                "required" => false,
            ])

            // Fin Vehicule //
            // Debut Contrat //

            ->add('societeFinancement', ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "Sociéte de financement",
                ],
                "choices" => [
                    "ALD Automotive-contrats professionnels seulement" => "ALD Automotive-contrats professionnels seulement",
                    "BNP Paribas Lease Group" => "BNP Paribas Lease Group",
                    "CA Consumer Finance" => "CA Consumer Finance",
                    "Financo = Professionnel à Professionnel uniquement-N° SIRET Impératif" => "Financo = Professionnel à Professionnel uniquement-N° SIRET Impératif",
                    "Kinto France - (Toyota - Lexus)" => "Kinto France - (Toyota - Lexus)",
                    "LEASYS - Professionnel uniquement" => "LEASYS - Professionnel uniquement",
                    "Mobi Fleet" => "Mobi Fleet",
                    "Opel Bank" => "Opel Bank",
                    "Yuccaloc" => "Yuccaloc",
                    "Mercedes Benz FS- A contacter avant le dépôt d'annonce" => "Mercedes Benz FS- A contacter avant le dépôt d'annonce",
                    "Volvo Fleat Services (Temsys) contrats professionnels seulement" => "Volvo Fleat Services (Temsys) contrats professionnels seulement",
                    "Volkswagen Bank" => "Volkswagen Bank",
                    "Viaxel-A contacter avant le dépôt d'annonce" => "Viaxel-A contacter avant le dépôt d'annonce",
                    "Toyota Finance-Uniquement vers professionnels" => "Toyota Finance-Uniquement vers professionnels",
                    "TEMsys- contrats professionnels seulement" => "TEMsys- contrats professionnels seulement",
                    "P Lease" => "P Lease",
                    "Natixis BPCE Lease- contrats professionnels seulement" => "Natixis BPCE Lease- contrats professionnels seulement",
                    "Lixxbail- contrats professionnels seulement" => "Lixxbail- contrats professionnels seulement",
                    "ALPHABET-contrats professionnels seulement" => "ALPHABET-contrats professionnels seulement",
                    "Lease Plan-A contacter avant le dépôt d'annonce" => "Lease Plan-A contacter avant le dépôt d'annonce",
                    "Honda Finance-Uniquement vers professionnels" => "Honda Finance-Uniquement vers professionnels",
                    "Ford Lease- Bremany Lease" => "Ford Lease- Bremany Lease",
                    "FCA Capital-A contacter avant le dépôt d'annonce" => "FCA Capital-A contacter avant le dépôt d'annonce",
                    "DIAC" => "DIAC",
                    "Credipar (PSA Banque)" => "Credipar (PSA Banque)",
                    "Cofica Bail -contrats professionnels seulement" => "Cofica Bail -contrats professionnels seulement",
                    "CM-CIC Bail-contrats professionnels seulement" => "CM-CIC Bail-contrats professionnels seulement",
                    "CGI FINANCE/CGL/Sefia/Autosphère/Prioris - A contacter avant tout dépôt" => "CGI FINANCE/CGL/Sefia/Autosphère/Prioris - A contacter avant tout dépôt",
                    "CAPITOLE FINANCE" => "CAPITOLE FINANCE",
                    "BMW Finance" => "BMW Finance",
                    "Audi Finance" => "Audi Finance",
                    "ARVAL-contrats professionnels seulement" => "ARVAL-contrats professionnels seulement",
                    "ALPHERA Lease" => "ALPHERA Lease",
                ]
            ])

            ->add('contratOption', ChoiceType::class, [
                "multiple" => true,
                "expanded" => true,
                "attr" =>[
                    "placeholder" => "Contrat option",
                ],
                "choices" => [
                    "Assurance décès/invalidité" => "Assurance décès/invalidité",
                    "Assurance perte financière" => "Assurance perte financière",
                    "Extension de garantie" => "Extension de garantie",
                    "Contrat d’entretien (hors pneumatiques)" => "Contrat d’entretien (hors pneumatiques)",
                    "Pneumatiques" => "Pneumatiques",
                    "Véhicule de remplacement" => "Véhicule de remplacement",
                ]
            ])

            ->add('dureeContrat', IntegerType::class, [
                "required" => true,
                "label" => "Duree Contrat"
            ])

            ->add('dateFinContrat', DateType::class, [
                "label" => "Date de fin de contrat",
                "widget" => "single_text",
                "required" => true,
            ])

            ->add('maxKmContrat', IntegerType::class, [
                "label" => "Kilométres alloués pour la durée du contrat",
                "required" => true,
            ])

            ->add('prixKmsSupp', IntegerType::class, [
                "label" => "Prix du kilométres supplémentaires",
                "required" => false,
            ])

            ->add('apport', ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "apport",
                ],
                "choices" => [
                    "oui" => "oui",
                    "non" => "non",
                ]
            ])

            ->add('recupApport', ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "Récuperer son apport",
                ],
                "choices" => [
                    "Aucun apport" => "Aucun apport",
                    "Je ne souhaite pas récuperer mon apport initial" => "Je ne souhaite pas récuperer mon apport initial",
                    "Je souhaite récuperer la totalité de mon apport" => "Je souhaite récuperer la totalité de mon apport",
                    "Je souhaite récuperer une partie de mon apport" => "Je souhaite récuperer une partie de mon apport",
                ]
            ])

            ->add('loyerMensuel', IntegerType::class, [
                "label" => "Loyer mensuel",
                "required" => true,
            ])

            ->add('nbMoisOffert', IntegerType::class, [
                "label" => "Nombre de mois offerts",
                "required" => false,
            ])

            ->add("typeContrat", ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "Récuperer son apport",
                ],
                "choices" => [
                    "Location à Longue Durée (LLD)" => "LLD",
                    "LOA" => "Location avec Option d'Achat (LOA)",
                ]
            ])

            ->add("typeCession", ChoiceType::class, [
                "required" => true,
                "attr" =>[
                    "placeholder" => "Récuperer son apport",
                ],
                "choices" => [
                    "Tout type de cession" => "Tout type de cession",
                    "Cession Particulier à Particulier uniquement" => "Cession Particulier à Particulier uniquement",
                    "Cession Professionnel à Professionnel uniquement" => "Cession Professionnel à Professionnel uniquement",
                ]
            ])

            // Fin Contrat //

            ->add("imageAvant", FileType::class, [
                "label" => "image de l'avant de votre voiture",
                "mapped" => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpg',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image document',
                    ])
                ],
            ])

            ->add('imageArriere', FileType::class, [
                "label" => "image de l'arriere de votre voiture",
                "mapped" => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpg',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image document',
                    ])
                ],
            ])

            ->add('submit', SubmitType::class, [
                'label' => "Déposez son annonce",
                "attr" => [
                    'class' => "btn btn-primary mt-4"
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
