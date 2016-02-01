


<?php
include ("ClassMundo.php");
include ("ClassCepa.php");
include ("ClassEnfermedad.php");
include ("ClassPaisano.php");
include ("ClassFichero.php");


//inicializo las clases
$fichero = new ClassFichero;
$paisano = new ClassPaisano;
$mundo = new ClassMundo($paisano,$fichero);
$cepa = new ClassCepa($mundo);
$hongo = new ClassEnfermedad($mundo);


echo $mundo->getTemperaturaMedia();
$mundo->setTemperaturaMedia(4);
echo $mundo->getTemperaturaMedia();


echo "av er " . $cepa->calCrecPesoRacimo();


echo "<div></div>";
echo $mundo->getTemperaturaMedia();
$mundo->setTemperaturaMedia(90);
echo $mundo->getTemperaturaMedia();


echo "av er " . $cepa->calCrecPesoRacimo();

echo "<div></div>";
echo $mundo->getTemperaturaMedia();
$mundo->setTemperaturaMedia(20);
echo $mundo->getTemperaturaMedia();


echo "av er " . $cepa->calCrecPesoRacimo();



echo "<div></div>";
echo "<div>----------------------------------------------</div>";
echo "<div>hongo</div>";

$mundo->setLluvia(20);
echo "lluvia de mundo: " . $mundo->getLluvia();

$paisano->setSulfatar(0);
echo "sulfato de paisano: " . $paisano->getSulfatar();
echo "sulfato del mundo por el paisano" . $mundo->getSulfate();

$hongo->calcularCrecimientoHongo();
echo "<div></div>";
echo "<div>----------------------------------------------</div>";


$mundo->setLluvia(80);
echo "lluvia de mundo: " . $mundo->getLluvia();
$paisano->setSulfatar(0);
echo "sulfato de paisano: " . $paisano->getSulfatar();
echo "sulfato del mundo por el paisano" . $mundo->getSulfate();

$hongo->calcularCrecimientoHongo();
echo "<div></div>";
echo "<div>----------------------------------------------</div>";



$mundo->setLluvia(101);
echo "lluvia de mundo: " . $mundo->getLluvia();

$paisano->setSulfatar(0);
echo "sulfato de paisano: " . $paisano->getSulfatar();
echo "sulfato del mundo por el paisano" . $mundo->getSulfate();

$hongo->calcularCrecimientoHongo();
echo "<div></div>";
echo "<div>----------------------------------------------</div>";



$mundo->setLluvia(200);
echo "lluvia de mundo: " . $mundo->getLluvia();

$paisano->setSulfatar(0);
echo "sulfato de paisano: " . $paisano->getSulfatar();
echo "sulfato del mundo por el paisano" . $mundo->getSulfate();

$hongo->calcularCrecimientoHongo();
echo "<div></div>";
echo "<div>----------------------------------------------</div>";

$mundo->setLluvia(10);
echo "lluvia de mundo: " . $mundo->getLluvia();

$paisano->setSulfatar(0);
echo "sulfato de paisano: " . $paisano->getSulfatar();
echo "sulfato del mundo por el paisano" . $mundo->getSulfate();

$hongo->calcularCrecimientoHongo();
echo "<div></div>";
echo "<div>----------------------------------------------</div>";


$mundo->setLluvia(70);
echo "lluvia de mundo: " . $mundo->getLluvia();

$paisano->setSulfatar(1);
echo "sulfato de paisano: " . $paisano->getSulfatar();
echo "sulfato del mundo por el paisano" . $mundo->getSulfate();


$hongo->calcularCrecimientoHongo();
echo "<div></div>";
echo "<div>----------------------------------------------</div>";





?>