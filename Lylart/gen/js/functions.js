
function createPoints(nb){ // crée un point dont les coordonées sont relatives au centre

	if (_angleNoiseSetter){
		for (var i = 0; i < _nbPoints; i++) {
			predefAngle[i] += 0.00003; //puissance de bruit angulaire
		}
	}
	if (_radiusNoiseSetter){
		for (var i = 0; i < _nbPoints; i++) {
			predefRadiusKeyNoiseRand[i] += 0.0020; //puissance de bruit de rayon
		}
	}
	if (_rotate==true){
		rotate += listOfSpeed[_rotateSpeedLvl][0]; //rotation
	}

	for (var i = 0; i < nb ; i++) {
			radius[i] = (noise(predefRadiusKeyNoiseRand[i]) * 350) + predefRadius[i];  //création bruit sur la longueur du rayon
			angles[i] = ((noise(predefAngle[i] * 200)) + predefAngle[i]) + rotate; //création bruit sur l'angle du rayon
			centerX = (noise(centerXNoise) *100)-50;//"* 100)-50"-->moyen"* 200)-100"-->Fort
			centerY = (noise(centerYNoise) *100)-50;

		if (_staticCenter){
			centerX = 0;
			centerY = 0;
		}
		//console.log("Y=" + centerY + " ||X=" + centerX); //position courante du centre

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

		//adapte la couleur des markers et croix de centre en Noir ou blanc en fonction de la couleur du background
		colorMoyBg = 0;
		colorMoyBg = (parseInt(bgColor[0][0]) + parseInt(bgColor[0][1]) + parseInt(bgColor[0][2]))/3;
		if(colorMoyBg >= 200){//seuil de clareté
			autoNBCol = 0;
		}else{
			autoNBCol = 255;
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
		stroke(curveColor[0]);
	}
	else {
		if (backgroundKey === 0) { // Correctif //faire en sorte de mettre 1 seule couche de background pour couvrir la coube persistante du mode geometry
			background(bgColor[0]);
			backgroundKey = 1;
		}
		strokeWeight(0.01);// for curveVerte
	}
}
