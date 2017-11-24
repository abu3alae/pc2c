function geoAr(){
    var GeoMonths = new Array('يناير', 'فبراير', 'مارس', 'أبريل', 'ماي', 'يونيو', 'يوليوز', 'غشت', 'شتنبر', 'أكتوبر', 'نونبر', 'دجنبر');    
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();
    var geoDate = day+' '+GeoMonths[month]+' '+year;
    document.getElementById('miladi').innerHTML = geoDate;
}

function hijri(ctrl) {
	var days = new Array("الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت");
	var hijriMonths = new Array("محرم", "صفر", "ربيع الأول", "ربيع الثاني", "جمادى الأولى", "جمادى الثانية", "رجب", "شعبان", "رمضان", "شوال", "ذو القعدة", "ذو الحجة");
	var hijriDay = hijriCalc(ctrl);
	var hijriDate = days[hijriDay[0]] + " " + hijriDay[1] + " " + hijriMonths[hijriDay[2]] + " " + hijriDay[3];
        document.getElementById('hijri').innerHTML = hijriDate;
}

﻿function modulo(n,m){
    return ((n%m)+m)%m;
}

function hijriCalc(ctrl){
    var today = new Date();
    if(ctrl) {
	ctrlmili = 1000*60*60*24*ctrl; 
	todaymili = today.getTime()+ctrlmili;
	today = new Date(todaymili);
    }
    day = today.getDate();
    month = today.getMonth();
    year = today.getFullYear();
    m = month+1;
    y = year;
    if(m<3) {
	y -= 1;
	m += 12;
    }

    a = Math.floor(y/100.);
    b = 2-a+Math.floor(a/4.);
    switch(y){
        case (y==1853):
            if(m>10)  b = -10;
	    if(m==10) {
	        b = 0;
	        if(day>4) b = -10;
	    }
            break;
        case (y<1853):
            b = 0;
            break;
    }

    hijDayNum = Math.floor(365.25*(y+4716))+Math.floor(30.6001*(m+1))+day+b-1524;

    b = 0;
    if(hijDayNum>2299160){
	a = Math.floor((hijDayNum-1867216.25)/36524.25);
	b = 1+a-Math.floor(a/4.);
    }
    bb = hijDayNum+b+1524;
    cc = Math.floor((bb-122.1)/365.25);
    dd = Math.floor(365.25*cc);
    ee = Math.floor((bb-dd)/30.6001);
    day =(bb-dd)-Math.floor(30.6001*ee);
    month = ee-1;
    if(ee>13) {
	cc += 1;
	month = ee-13;
    }
    year = cc-4716;

    if(ctrl) {
	weekNbr = modulo(hijDayNum+1-ctrl,7)+1;
    } else {
	weekNbr = modulo(hijDayNum+1,7)+1;
    }

    iyear = 10631./30.;
    epochastro = 1948084;
    epochcivil = 1948085;

    shift1 = 8.01/60.;
	
    var z = hijDayNum-epochastro;
    var cyc = Math.floor(z/10631.);
    z = z-10631*cyc;
    var j = Math.floor((z-shift1)/iyear);
    var hijriYear = 30*cyc+j;
    z = z-Math.floor(j*iyear+shift1);
    var hijriMonth = Math.floor((z+28.5001)/29.5);
    if(hijriMonth === 13) hijriMonth === 12;
    var hijriDay = z-Math.floor(29.5001*hijriMonth-29);

    var hijriTable = new Array();
    
    hijriTable[0] = weekNbr-1; //weekday number
    hijriTable[1] = hijriDay; //hijri date
    hijriTable[2] = hijriMonth-1; //hijri month
    hijriTable[3] = hijriYear; //islamic year

    return hijriTable;
}