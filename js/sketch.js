
// ------------ les boutons

//max recommamdé 10pts
var _nbPoints = 30;// MIN 2 _closeShape = true ||  MIN 4 si _closeShape = false
var _crossLine = true;	//check button //-->OK
var _staticCenter = true; //check button
var _closeShape = true;	//check button //-->OK
var _rotate=true; //check button //-->OK
var _rotateSpeed = 5; //slider ||min 0|max 15 | step 0.5
var _background = 'black'; //black or white (menu déroulant) ==> idéal color picker

var _angleNoiseSetter = false; //checkbox --> affiche _angleNoisePower
var _angleNoisePower = 10; //slider
var _radiusNoiseSetter = false;//checkbox --> affiche _radiusNoisePower
var _radiusNoisePower = 10; //slider

var _nbColors = 1; //menu déroulant max 5
var _col1 = [255]; //3 inputs RVB possible a remplir avec un color picker
var _col2 = [0];
var _col3 = []
var color = [];
var _colorTransitionDuration = 10 //(secondes) input number || min 0,5|max 60|step 0,5
var _changeDurationAuto = false; //

var _generationLimit = true; //checkBox --> affiche _generationDuration

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
            _rotateSpeed = $('#rotateSpeed').val();
            $('#valeur_rotateSpeed').html(_rotateSpeed);
        });
    }
);

//_____________________ paramétrage des boutons






// variables______________________________________

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
var xnoise, ynoise;

//

function setup() {
    createCanvas(600, 600);
    frameRate(65);
    background(100);

    anglenoise = random(10);
    radiusnoise = random(10);
    xnoise = random(10);
    ynoise = random(10);

    rotate= 0;

    for (var i = 0; i < _nbPoints; i++) {
        predefAngle[i] = random(0,pi*2); //prédétermine des angle pour les points disposés pour le bézier relativement  au centre
        predefRadius[i] = random(0,50);
        predefRadiusKeyNoiseRand[i]	= random(5,10); //prédétermine une clé de randomisation du bruit pour chaque points
        predefAngleKeyNoiseRand[i]	= random(5,10);
    }

    //console.log(predefRadiusKeyNoiseRand);
    //console.log(predefAngle);
}


function createPoints(nb){ // crée un point dont les coordonées sont relatives au centre

    for (var i = 0; i < nb ; i++) {
        radius[i] = (noise(predefRadiusKeyNoiseRand[i]) * 350) + predefRadius[i];  //création bruit sur la longueur du rayon
        angles[i] = ((noise(predefAngle[i] * 200)) + predefAngle[i]) + rotate; //création bruit sur l'angle du rayon



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
        stroke(255,0,0);
        line(centerX-10,centerY,centerX+10,centerY);//croix centrale : trait horizontal
        line(centerX,centerY-10,centerX,centerY+10);//croix centrale : trait vertical
        strokeWeight(2); // for curveVertex
        stroke(white);
    }
    else {
        strokeWeight(0.01);// for curveVerte
    }
}


function draw() {
    translate(width/2,height/2);
    noFill();










    if (_rotate){
        rotate += predefAngle[0]/1000;
    }

    for (var i = 0; i < _nbPoints; i++) {
        predefRadiusKeyNoiseRand[i] += 0.0020; //puissance de bruit
        predefAngle[i] += 0.00003;

    }







    createPoints(_nbPoints);
    stroke(white);
    isGeometryRevealed();
    drawCurveVertex(_nbPoints);
    //console.log(fetchedCoords[5]);
    //console.log(x);


}











//
