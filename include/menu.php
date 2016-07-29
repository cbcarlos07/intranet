
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="./css/cronometro.css" rel="stylesheet" type="text/css" />
<center>
   <div class="row  " >
        <div class="topo ">
                <div class="logo ">
                    <img src="img/banner5.png"/>
                </div>
        </div>
    </div>    
</center>

<center>
        <div class="col-md-12 ona">
            <div class="ona3">
                <img src="img/ona.png">
            </div>
            <center>
            <div class="contagem" align="right" >
                    <div  id="cronometro"></div>
            </div>
                </center>
        </div>   
</center>   


<script type="text/javascript">
//function atualizaContador(YY,MM,DD,HH,MI,dia, hora, minuto, segundo) {
function atualizaContador(YY,MM,DD,HH,MI,saida) {
	var SS = 00;
	var hoje = new Date();
	var futuro = new Date(YY,MM-1,DD,HH,MI,SS);

	var ss = parseInt((futuro - hoje) / 1000);
	var mm = parseInt(ss / 60);
	var hh = parseInt(mm / 60);
	var dd = parseInt(hh / 24);

	ss = ss - (mm * 60);
	mm = mm - (hh * 60);
	hh = hh - (dd * 24);

	var faltam = '';
        var horas = '';
        var minutos = '';
        var dias = '';
        //dia = dd;
        //hora = hh;
       // minuto = mm;
       // segundo = ss;
	faltam += dd < 10 ? '0'+dd+'&nbsp;:&nbsp;' : ' '+dd+'&nbsp;:&nbsp;' ;
	faltam += hh < 10 ? '0'+hh+'&nbsp;:&nbsp;' : (toString(hh).length)+'&nbsp;:&nbsp;';
	faltam += mm < 10 ? '0'+mm+'&nbsp;:&nbsp;' : mm+'&nbsp;:&nbsp;';
        //dias = dd < 10 ? '0'+dd : dd;
        //horas = hh < 10 ? '0'+hh : hh;
        //minutos = mm < 10 ? '0'+mm : mm;
	faltam += ss < 10 ? '0'+ss : ss;
	if (dd+hh+mm+ss > 0) {
		//document.getElementById(dia).innerHTML = dias;
                //document.getElementById(hora).innerHTML = horas;
                //document.getElementById(minuto).innerHTML = minutos;
                
               // document.getElementById(segundo).innerHTML = faltam;
                document.getElementById(saida).innerHTML = faltam;
		setTimeout(function(){atualizaContador(YY,MM,DD,HH,MI,saida)},1000);
                //setTimeout(function(){atualizaContador(YY,MM,DD,HH,MI,dia,hora,minuto,segundo)},1000);
                
	} else {
                document.getElementById(saida).innerHTML = 'ESTAMOS EM VISITA';
		//document.getElementById(dia).innerHTML = 'ESTAMOS EM VISITA';
                //document.getElementById(hora).innerHTML = '';
                //document.getElementById(minuto).innerHTML = '';
                //document.getElementById(segundo).innerHTML = '';
		setTimeout(function(){atualizaContador(YY,MM,DD,HH,MI,saida)},1000);
                //setTimeout(function(){atualizaContador(YY,MM,DD,HH,MI,dia,hora,minuto,segundo)},1000);
	}
}

window.onload=function(){
	//atualizaContador('2016','10','06','09','00','dia','hora','minuto','segundo');
        atualizaContador('2016','10','06','09','00','cronometro');
}
</script>

   