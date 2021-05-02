var ID1=rot('i1');
var ID2=rot('i2');
var ID3=rot('i3',"a");
var imgs = document.images,
    len = imgs.length, 
    counter = 0;

[].forEach.call( imgs, function( img ) {
    if(img.complete)
      incrementCounter();
    else
      img.addEventListener( 'load', incrementCounter, false );
} );



// check whether the slider is loaded or not
// if so make some changes else wait until loading
//slider part
function incrementCounter() {
    counter++;
    if ( counter === len ) {
        setTimeout(() => {
            FadeOut('i1');
            FadeOut('i3');
            FadeOut('i2');
            FadeOut('a4');
                setTimeout(function(){
                    clearInterval(ID1);
                    clearInterval(ID2);
                    clearInterval(ID3);
                    document.getElementById('a4').remove();
                },500);
            var IDT1=tran('i',20,0,-3); 
            document.getElementsByTagName("body")[0].style.overflow = "auto"
        }, 500);
    
    }
}
