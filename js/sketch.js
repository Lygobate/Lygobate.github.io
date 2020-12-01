
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



//_____________________ Jquery pour dynamiser les boutons

$(function () {

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
			$('#rotateSpeed').toggle("slow");
			$('.speed').toggle();
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
				$('#stopGeneration').css("display", 'block');
				$('#newCurve').css("display", 'none');
				$('#bgColor').css("display", 'none');
				$('#saveCanvas').css("display", 'block');
			} else {
				_showGeometry = true;
				$('#showGeometry').prop("value", 'Start Generation');
				$('#stopGeneration').css("display", 'none');
				$('#newCurve').css("display", 'block');
				$('#bgColor').css("display", 'inline-block');
				$('#saveCanvas').css("display", 'none');
				loop();//débloque si le noLoop est activé, et qu'on retourne sur le showGeometry
			}
		});
		$('#stopGeneration').on("click", function () {
			if (_stop == false){
				_stop = true;
				$('#stopGeneration').prop("value", 'Play Generation');
				noLoop();
			} else {
				_stop = false;
				loop();
				$('#stopGeneration').prop("value", 'Stop Generation');
			}
		});
		$('#newCurve').on("click",function(){
			setup();
		});
		$('#saveCanvas').on("click",function(){
			saveCanvas(document.getElementById("defaultCanvas0") ,'save_canvas', 'png');
		});
	}
);

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

function checkBoxInit(){
	if (_closeShape==true) {
		$('#closeShape').attr('checked',true);
	}
	if (_staticCenter==true) {
		$('#staticCenter').attr('checked',true);
	}
	if (_angularNoise==true) {
		$('#angularNoise').attr('checked',true);
	}
	if (_radiusNoise==true) {
		$('#radiusNoise').attr('checked',true);
	}
}



// variables______________________________________

var canvasSize = 800;
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
	background(100);

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



function createPoints(nb){ // crée un point dont les coordonées sont relatives au centre

	if (_angleNoiseSetter){
		for (var i = 0; i < _nbPoints; i++) {
			predefAngle[i] += 0.00003;
			//console.log("ok");
		}
	}
	if (_radiusNoiseSetter){
		for (var i = 0; i < _nbPoints; i++) {
			predefRadiusKeyNoiseRand[i] += 0.0020; //puissance de bruit
			//console.log("ok");
		}
	}
	if (_rotate==true){
		rotate += listOfSpeed[_rotateSpeedLvl][0];
	}

//console.log(predefRadiusKeyNoiseRand[0]);

	for (var i = 0; i < nb ; i++) {

		//if (_radiusNoiseSetter) {
			radius[i] = (noise(predefRadiusKeyNoiseRand[i]) * 350) + predefRadius[i];  //création bruit sur la longueur du rayon
			angles[i] = ((noise(predefAngle[i] * 200)) + predefAngle[i]) + rotate; //création bruit sur l'angle du rayon
		//}



			centerX = (noise(centerXNoise) *100)-50;//"* 100)-50"-->moyen"* 200)-100"-->Fort
			centerY = (noise(centerYNoise) *100)-50;
			//correctif a faire : le centre se déplace den diagonale : X = Y ?
			//log centerY et center X, si =, générer une clé de randomisation

		if (_staticCenter){
			centerX = 0;
			centerY = 0;
		}
		//console.log("Y=" + centerY + " ||X=" + centerX);

		x[i] = centerX + (radius[i] * cos(angles[i]));
		y[i] = centerY + (radius[i] * sin(angles[i]));


		//console.log(predefAngle[0]); //valeur incrémentale
		//console.log(predefRadiusKeyNoiseRand[0]); //valeur incrémentale

		//console.log(radius[0]); //bruit naturel (Perlin noise)
		//console.log(angles[0]); //bruit naturel (Perlin noise)

	}

	//console.log(x);
}


function drawCurveVertex(_nbPoints){
	if (_closeShape){
		beginShape();
		for (var i = 0; i <= close; i++) {
			for (var j = 0; j < _nbPoints; j++) {
				curveVertex(x[j],  y[j]);
			}
		}
		endShape()
	}
	else {
		beginShape();
		for (var i = 0; i <= open; i++) {
			for (var j = 0; j < _nbPoints; j++) {
				curveVertex(x[j],  y[j]);
			}
		}
		endShape()
	}
}

function rgb_to_array(color, array){ //substring(5, color.length-1) pour rgba
	array.unshift(color.substring(4, color.length-1).split(","));//[[r,v,b],...] tab 2D
	array.splice(1);
}

function isGeometryRevealed() {

	if (_showGeometry){
		backgroundKey = 0;
		rgb_to_array(bgColorString,bgColor);
		background(bgColor[0]);


		function marker(){
			strokeWeight(2);
			ellipse(x[i],y[i],10,10);
			drawingContext.setLineDash([0.5, 3]);
			strokeWeight(2);
			line(centerX,centerY,x[i],y[i])
			drawingContext.setLineDash([])
		}

		colorMoyBg = 0;
		colorMoyBg = (parseInt(bgColor[0][0]) + parseInt(bgColor[0][1]) + parseInt(bgColor[0][2]))/3;

		if(colorMoyBg <= 255/2){
			autoNBCol = 255;
		}else{
			autoNBCol = 0;
		}


		//le "if" et le "else if" détecte une couleur trop près du rouge
		if (bgColor[0][0]==255 && bgColor[0][1]>=0 && bgColor[0][1]<=180 && bgColor[0][1]<=140 ){
			markerStroke = 0;
		}
		else if (bgColor[0][0]==255 && bgColor[0][1]<=140 && bgColor[0][2]>=0 && bgColor[0][2]<=180) {
			markerStroke = 0;
		}
		else {
			markerStroke = red;
		}

		for (var i = 0; i < _nbPoints ; i++) {
			stroke(markerStroke);
			if(!_closeShape){ //met en blanc les géométries non reliées quand la forme n'est pas fermée
				if (_nbPoints >= 4 && i == 0 ) {
					stroke(autoNBCol);
					marker();
				}
				else if (_nbPoints >= 4 && i == _nbPoints-1 ) {
					stroke(autoNBCol);
					marker();
				}
				else {
					marker();
				}
			}
			marker();
		}//fin for

		strokeWeight(1);
		stroke(autoNBCol);
		line(centerX-10,centerY,centerX+10,centerY);//croix centrale : trait horizontal
		line(centerX,centerY-10,centerX,centerY+10);//croix centrale : trait vertical
		strokeWeight(2); // for curveVertex
		stroke(white);
	}
	else {
		if (backgroundKey === 0) { // Correctif //faire en sorte de mettre 1 seule couche de background pour couvrir la coube persistante du mode geometry
			background(bgColor[0]);
			backgroundKey = 1;
		}
		strokeWeight(0.01);// for curveVerte
	}
}



function draw() {
	translate(canvasSize/2,canvasSize/2);
	noFill();

	createPoints(_nbPoints);

	rgb_to_array(curveColorString,curveColor)
	stroke(curveColor[0]);

	isGeometryRevealed();
	drawCurveVertex(_nbPoints);

	centerXNoise += 0.003;
	centerYNoise += 0.003;


	//console.log(bgColorString);
}










//
