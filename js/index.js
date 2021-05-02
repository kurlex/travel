var ID1=rot('i1');
var ID2=rot('i2');
var ID3=rot('i3',"a");
var imgs = document.images,
    len = imgs.length + 1, // 1 more for the img slider "is" (search for slider part) 
    counter = 0;

[].forEach.call( imgs, function( img ) {
    if(img.complete)
      incrementCounter();
    else
      img.addEventListener( 'load', incrementCounter, false );
} );


function isDefined(id,ID){
if(id!=null && id!=undefined && id.complete){
  incrementCounter();
clearInterval(ID);
}
}

// check whether the slider is loaded or not
// if so make some changes else wait until loading
//slider part
var IDsi= setInterval(() => {isDefined(document.getElementById("a5"),IDsi)}, 100);
var head = ["USA, Hawii","Tunisia, Douze","India, Taj Mahal","Indonesia, Java"]
    var desc = ["from 1500$","from 70$","from 700$","from 1000$"]
function incrementCounter() {
    counter++;
    if ( counter === len ) {
      if(document.documentElement.clientWidth > 700){
        var x = document.getElementById("a5").offsetHeight;
        document.getElementsByClassName("side")[0].style.height = x.toString()+ "px";
        document.getElementsByClassName("side")[0].style.bottom = (-document.getElementById("a6").offsetHeight + x - 148).toString() + "px"
      }
    setTimeout(() => {
      FadeOut('i1');
      FadeOut('i3');
      FadeOut('i2');
      FadeOut('a4');
        setTimeout(function(){
      clearInterval(ID1);
      clearInterval(ID2);
      clearInterval(ID3);
      clearInterval(IDT1);
      document.getElementById('a4').remove();
    },500);
    var IDT1=tran('i',20,0,-3);  
    }, 500);
    
    }
}
