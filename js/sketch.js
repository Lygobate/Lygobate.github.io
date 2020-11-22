
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
	[0.003,"très lent"],
	[0.004,"très lent"],
	[0.005,"très lent"],
	[0.006,"très lent"],
	[0.007,"très lent"],
	[0.008,"très lent"],
	[0.009,"très lent"],
	[0.01,"très lent"],
	[0.02,"très lent"],
	[0.03,"très lent"],
	[0.04,"Maximum"],
	[0.05,"U MAD!!"],
	[0.1,"WTF"],
];

var _background = 'black'; //black or white (menu déroulant) ==> idéal color picker

var _angleNoiseSetter = false; //checkbox --> affiche _angleNoisePower//-->OK
var _angleNoisePower = 10; //slider ||min 0|max 15 | step 1

var _radiusNoiseSetter = true;//checkbox --> affiche _radiusNoisePower //-->OK
var _radiusNoisePower = 10; //slider ||min 0|max 15 | step 1

var _staticCenter = true; //check button //-->OK
var _centerNoisePower = 10; //slider ||min 0|max 15 | step 1

var colorManual = false // checkBox --> masque le menu couleur si "true"
var _nbColors = 1; //menu déroulant max 5
var _col1 = [255]; //3 inputs RVB possible a remplir avec un color picker
var _col2 = [0];
var _col3 = [];
var _col4 = [0];
var _col5= [];
var color = [];
var _colorTransitionDuration = 10 //(secondes) input number || min 0,5|max 60|step 0,5
var _changeDurationAuto = false; //

var _generationLimit = true; //checkBox --> affiche _generationDuration
var _generationDuration;

var _showGeometry = true;//Bouton "Generate" onClick -->



//_____________________ Jquery pour dynamiser les boutons

$(function () {

		$('#nbPoints').on("input change", function () {
			_nbPoints = $('#nbPoints').val();
			$('#valeur_nbPoints').html(_nbPoints);
		});
		$('#crossLine').on("click", function () {
			_crossLine = $('#crossLine').prop("checked");
		});
		$('#staticCenter').on("click", function () {
			_staticCenter = $('#staticCenter').prop("checked");
		});
		$('#closeShape').on("click", function () {
			_closeShape = $('#closeShape').prop("checked");
		});
		$('#rotate').on("click", function () {
			_rotate = $('#rotate').prop("checked");
		});
		$('#showGeometry').on("click", function () {
			_showGeometry = $('#showGeometry').prop("checked");
		});
		$('#rotateSpeed').on("input change", function () {
			_rotateSpeedLvl = $('#rotateSpeed').val();
			$('#valeur_rotateSpeed').html(_rotateSpeedLvl);
			$('#rotateSpeedComment').html(listOfSpeed[_rotateSpeedLvl][1]);
		});
	}
);

//_____________________ paramétrage des boutons






// variables______________________________________

var canvasSize = 800;
var backgroundKey;

const pi = 3.1415926535897932384626433832795;
const white = 255;
const black = 0;
const open = 0;
const close = 1;


var centerX = 0;
var centerY = 0;



var x = [];
var y = [];
var fetchedCoords = [];

var predefAngle = []; //les prédefs sont les clés de random propres à chaque points initialisé une seule fois dans le code
var predefRadius =[];
var predefRadiusKeyNoiseRand = [];
var predefAngleKeyNoiseRand = [];

var angles =[];
var radius =[];
var rotate;

var anglenoise, radiusnoise;
var centerXNoise, centerYNoise;

//

function setup() {
	createCanvas(canvasSize, canvasSize);
	frameRate(65);
	background(100);

	rotate= 0; //variable incrémentale

	centerXNoise = random(10);
	centerYNoise = random(10);

	for (var i = 0; i < _nbPointsMax; i++) {
		predefAngle[i] = random(0,pi*2); //prédétermine des angle pour les points disposés pour le bézier relativement  au centre
		predefRadius[i] = random(0,50);
		predefRadiusKeyNoiseRand[i]	= random(0,35); //prédétermine une clé de randomisation du bruit pour chaque points
		predefAngleKeyNoiseRand[i]	= random(5,10);
	}

	//console.log(predefRadiusKeyNoiseRand);
	//console.log(predefAngle);
}


function createPoints(nb){ // crée un point dont les coordonées sont relatives au centre

	if (_angleNoiseSetter){
		for (var i = 0; i < _nbPoints; i++) {
			predefAngle[i] += 0.00003;
		}
	}
	if (_radiusNoiseSetter){
		for (var i = 0; i < _nbPoints; i++) {
			predefRadiusKeyNoiseRand[i] += 0.0020; //puissance de bruit
		}
	}
	if (_rotate){
		rotate += listOfSpeed[_rotateSpeedLvl][0];
	}


	for (var i = 0; i < nb ; i++) {

		//if (_radiusNoiseSetter) {
			radius[i] = (noise(predefRadiusKeyNoiseRand[i]) * 350) + predefRadius[i];  //création bruit sur la longueur du rayon
			angles[i] = ((noise(predefAngle[i] * 200)) + predefAngle[i]) + rotate; //création bruit sur l'angle du rayon
		//}



			centerX = (noise(centerXNoise) *100)-50;//"* 100)-50"-->moyen"* 200)-100"-->Fort
			centerY = (noise(centerYNoise) *100)-50;
			//correctif a faire : le centre se déplace den diagonale : X = Y ?
			//log centerY et center X, si =, générer une clé de randomisation

		if (!_staticCenter){
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

function isGeometryRevealed() {

	if (_showGeometry){
		backgroundKey = 0;
		background(100);
		function marker(){
				strokeWeight(2);
				ellipse(x[i],y[i],10,10);
				drawingContext.setLineDash([0.5, 3]);
				strokeWeight(1.5);
				line(centerX,centerY,x[i],y[i])
				drawingContext.setLineDash([])
			}

		for (var i = 0; i < _nbPoints ; i++) {
			stroke(255,0,0);
			if(!_closeShape){ //met en blanc les géométries non reliées quand la forme n'est pas fermée
				if (_nbPoints >= 4 && i == 0 ) {
					stroke(255);
					marker();
				}
				else if (_nbPoints >= 4 && i == _nbPoints-1 ) {
					stroke(255);
					marker();
				}
				else {
					marker();
				}
			}
			marker();
		}//fin for

		strokeWeight(1);
		stroke(0);
		line(centerX-10,centerY,centerX+10,centerY);//croix centrale : trait horizontal
		line(centerX,centerY-10,centerX,centerY+10);//croix centrale : trait vertical
		strokeWeight(2); // for curveVertex
		stroke(white);
	}
	else {
		if (backgroundKey === 0) { // Correctif //faire en sorte de mettre 1 seule couche de background pour couvrir la coube persistante du mode géometry
			background(100);
			backgroundKey = 1;
		}
		strokeWeight(0.01);// for curveVerte
	}
}


function draw() {
	translate(canvasSize/2,canvasSize/2);
	noFill();




	centerXNoise += 0.003;
	centerYNoise += 0.003;


	createPoints(_nbPoints);
	stroke(white);
	isGeometryRevealed();
	drawCurveVertex(_nbPoints);
	//console.log(_nbPoints);
	//console.log(x);


}











//
