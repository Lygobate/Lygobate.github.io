jscolor.presets.default = {format:'rgb', backgroundColor:'rgba(227,227,227,1)', borderColor:'rgba(255,255,255,1)', mode:'HSV',shadow:false, position:'bottom'};


// ------------ Cookie de bienvenue

$(function(){
	if (typeof $.cookie("firstVisit") == 'undefined') {
		$.cookie("firstVisit",false);
		$('.modal').removeClass('hidden');
		$('.modal,.modal-card,.modal-card-body').addClass("modalInfo");
	}
});


// ------------ les boutons

//max recommamdé 10pts
var _nbPointsMax = 30;
var _nbPoints = 4;// MIN 2 _closeShape = true ||  MIN 4 si _closeShape = false |max 30|step 1 |init 6
var _crossLine = true;	//check button //-->OK
var _closeShape = true;	//check button //-->OK
var _rotate=true; //check button //-->OK
var _rotateSpeedLvl = 5; //slider ||min 0|max 15 | step 0.5
var listOfSpeed = [
	[0,"arrêt"],
	[0.001,"très lent"],
	[0.002,"lent"],
	[0.003,"lent"],
	[0.004,"normal"],
	[0.005,"normal"],
	[0.006,"moyen"],
	[0.007,"soutenu"],
	[0.008,"soutenu"],
	[0.009,"rapide"],
	[0.01,"rapide"],
	[0.02,"Très rapide"],
	[0.03,"Très rapide"],
	[0.04,"Maximum"],
	[0.05,"U MAD!!"],
	[0.1,"WTF"],
];

var _background = 'black'; //black or white (menu déroulant) ==> idéal color picker

var _angleNoiseSetter = true; //checkbox --> affiche _angleNoisePower//-->OK
var _angleNoisePower = 10; //slider ||min 0|max 15 | step 1

var _radiusNoiseSetter = true;//checkbox --> affiche _radiusNoisePower //-->OK
var _radiusNoisePower = 10; //slider ||min 0|max 15 | step 1

var _staticCenter = true; //check button //-->OK
var _centerNoisePower = 10; //slider ||min 0|max 15 | step 1

var colorManual = false // checkBox --> masque le menu couleur si "true"
var _nbColors = 1; //menu déroulant max 5
var _col1 = [255]; //3 inputs RVB possible a remplir avec un color picker
var _col2 = [0];
var _col3 = [0];
var _col4 = [0];
var _col5= [0];
var curveColorString ='rgb(255,255,255)';
var curveColor =[];
var colorList = [];
var _colorTransitionDuration = 10 //(secondes) input number || min 0,5|max 60|step 0,5
var _changeDurationAuto = false; //

var bgColorString = 'rgb(0,0,0)'
var bgColor = []; //valeur par défaut

var colorMoyBg;
var markerStroke;
var autoNBCol;

//auto stop
var _generationLimit = true; //checkBox --> affiche _generationDuration
var _generationDuration;
//manual stop
var _stop = false;

var _showGeometry = true;//Bouton "Generate" onClick -->

var now = new Date();
var annee = now.getFullYear();
var mois = now.getMonth() + 1;
var jour = now.getDate();
var timeCode = now.getTime()

//_____________________ Jquery pour dynamiser les boutons

$(function () {

	$('.lylart_generator_version').html(lylart_generator_version);

	$('#nbPoints').on("input change", function () {
		_nbPoints = $('#nbPoints').val();
		$('#valeur_nbPoints').html(_nbPoints);
	});

	rotateSpeedMenuInit();
	$('#rotate').on("click", function () {
		if (_rotate === true){
			_rotate = false;
		}else{
			_rotate = true;
		}
		$('.speed').toggleClass('fade');
		if ($('#rotateSpeed').prop('disabled')){
			$('#rotateSpeed').removeAttr('disabled');
		}else{
			$('#rotateSpeed').attr('disabled', 'disabled');
		}
	});
	$('#rotateSpeed').on("input change", function () {
		_rotateSpeedLvl = $('#rotateSpeed').val();
		$('#valeur_rotateSpeed').html(_rotateSpeedLvl);
		$('#rotateSpeedComment').html(listOfSpeed[_rotateSpeedLvl][1]);
	});

	$('#closeShape').on("click", function () {
		_closeShape = $('#closeShape').prop("checked");
	});

	/*$('#crossLine').on("click", function () {
		_crossLine = $('#crossLine').prop("checked");
	});*/

	$('#staticCenter').on("click", function () {
		_staticCenter = $('#staticCenter').prop("checked");
	});
	$('#angularNoise').on("click", function () {
		_angleNoiseSetter = $('#angularNoise').prop("checked");
	});
	$('#radiusNoise').on("click", function () {
		_radiusNoiseSetter = $('#radiusNoise').prop("checked");
	});



	$('#curveColor').on("input change", function () {
		curveColorString = $('#curveColor').val();
		//console.log(color);
	});
	$('#bgColor').on("input change", function () {
		bgColorString = $('#bgColor').val();
		//console.log(color);
	});


	$('#showGeometry').on("click", function () {//show géometry fait office de start generation et de reset
		if (_showGeometry === true){
			_showGeometry = false;
			$('#showGeometry').prop("value", 'Reset');
			$('#showGeometry').toggleClass('buttonYellow');
			$('#stopGeneration').css("display", 'block');
			$('#newCurve').css("display", 'none');
			// $('#bgColorLabel').css("display", 'none');
			$('#bgColorLabel>input').attr("disabled", 'disabled');
			$('#saveCanvas').css("display", 'block');
			$('#shareCanvas').css("display", 'block');
			$('#saveCanvas').attr("disabled", 'disabled');
			$('#shareCanvas').attr("disabled", 'disabled');
		} else {
			_showGeometry = true;
			$('#showGeometry').prop("value", 'Start Generation');
			$('#showGeometry').toggleClass('buttonYellow');
			$('#showGeometry').toggleClass('buttonGreen')
			$('#stopGeneration').css("display", 'none');
			$('#newCurve').css("display", 'block');
			// $('#bgColorLabel').css("display", 'inline-block');
			$('#bgColorLabel>input').removeAttr("disabled");
			$('#saveCanvas').css("display", 'none');
			$('#shareCanvas').css("display", 'none');
			loop();//débloque si le noLoop est activé, et qu'on retourne sur le showGeometry
			$('#saveCanvas').removeAttr("disabled");
			$('#shareCanvas').removeAttr("disabled");
		}
	});
	$('#stopGeneration').on("click", function () {
		if (_stop == false){
			_stop = true;
			$('#stopGeneration').prop("value", 'Play Generation');
			$('#stopGeneration').removeClass('buttonRed');
			$('#stopGeneration').toggleClass('buttonGreen')
			noLoop();
			$('#saveCanvas').removeAttr("disabled");
			$('#shareCanvas').removeAttr("disabled");

		} else {
			_stop = false;
			loop();
			$('#stopGeneration').prop("value", 'Stop Generation');
			$('#stopGeneration').toggleClass('buttonGreen')
			$('#stopGeneration').toggleClass('buttonRed');
			$('#saveCanvas').attr("disabled", 'disabled');
			$('#shareCanvas').attr("disabled", 'disabled');
		}
	});
	$('#newCurve').on("click",function(){
		setup();
	});
	$('#saveCanvas').on("click",function(){
		saveCanvas(document.getElementById("defaultCanvas0") ,'generation'+'_'+jour+'-'+mois+'-'+annee+'_'+timeCode, 'png');
	});
});

/*A faire en front pour le moment____________________________________

		- Il me faut un type button pour regénérer une courbe sans refresh la page.
		Pour cela je pense qu'il faut apeller a nouveau la function "setup" qui initialisera de noouvelles données et une nouvelle courbe.
		- Commencer une mise en forme, placer le tout en dessous, dans un menu lisible. Trouver des boutons switch ON/OFF (trouvable en jquery).
		- récupérer dans 2 variables la largeur de l'écran dynamiquement.
		- générer des

*/



//_____________________ paramétrage des boutons


function rotateSpeedMenuInit(){
	if (_rotate==true) {
		$('.speed,#rotateSpeed').css('display','inline-block');
		$('#rotate').attr('checked',true);
	}
	else {
		$('.speed,#rotateSpeed').css('display','none');
		$('#rotate').attr('checked',false);
	}
}

/*
function checkBoxInit(){
	$(function(){
		if (_closeShape==true) {
			$('#closeShape').attr('checked',true);
		}
		else{
			$('#closeShape').attr('checked',false);
		}
		if (_staticCenter==true) {
			$('#staticCenter').attr('checked',true);
		}
		else{
			$('#staticCenter').attr('checked',false);
		}
		if (_angularNoise==true) {
			$('#angularNoise').attr('checked',true);
		}
		if (_angularNoise==true) {
			$('#angularNoise').attr('checked',false);
		}
		if (_radiusNoise==true) {
			$('#radiusNoise').attr('checked',true);
		}
		if (_radiusNoise==true) {
			$('#radiusNoise').attr('checked',false);
		}
	});
}
*/


// variables______________________________________

var canvasSize = 1000;
let canvahtml;
var backgroundKey;

const pi = 3.1415926535897932384626433832795;
const white = 255;
const black = 0;
const red = [255,0,0];
const open = 0;
const close = 1;


var centerX = 0;
var centerY = 0;
var centerXNoise, centerYNoise;
var x = [];
var y = [];

var predefAngle = []; //les prédefs sont les clés de random propres à chaque points initialisé une seule fois dans le code
var predefRadius =[];
var predefRadiusKeyNoiseRand = [];
var predefAngleKeyNoiseRand = [];

var angles =[];
var radius =[];
var rotate;


//

function setup() {
	canvahtml=createCanvas(canvasSize, canvasSize);
	canvahtml.parent('canvas');
	frameRate(65);

	rotate= 0; //variable incrémentale

	centerXNoise = random(10);
	centerYNoise = random(10);

	for (var i = 0; i < _nbPointsMax; i++) {
		predefAngle[i] = random(0,pi*2); //prédétermine des angle pour les points disposés pour le bézier relativement  au centre
		predefRadius[i] = random(0,50);
		predefAngleKeyNoiseRand[i] = random(0,35);
		predefRadiusKeyNoiseRand[i]	= random(0,35); //prédétermine une clé de randomisation du bruit pour chaque points

		loop();
	}

	//console.log(predefRadiusKeyNoiseRand);
	//console.log(predefAngle);
}



function draw() {
	rgb_to_array(curveColorString,curveColor);
	translate(canvasSize/2,canvasSize/2);
	noFill();

	createPoints(_nbPoints);

	stroke(curveColor[0]);

	isGeometryRevealed();
	drawCurveVertex(_nbPoints);

	centerXNoise += 0.003;
	centerYNoise += 0.003;


	//console.log(bgColorString);
}










//
