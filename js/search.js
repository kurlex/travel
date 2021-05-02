
var ID =setInterval(() => {
    $("#slider-range span").addClass("ui-cir");
    if($("#slider-range span").size()!=0){

        $( "#amount" ).val("");
        clearInterval(ID);
    }
}, 30);

var orders = $(".top-menu > div");
for(var i=1;i<orders.size();i++){
    orders[i].addEventListener("click",(d)=>{
        document.getElementById("order").value =d.srcElement.innerHTML.substring(0, 1);
        document.getElementsByClassName("submit-bottom")[0].click();
    })
}

$("#black").click(()=>{
    $("#black").fadeOut();
    $("#white").fadeOut();
    setTimeout(() => {
        $("#holder").html("");
    }, 500);
})




$("#fake-postQuery").click(()=>{
    if(document.getElementById("email").value==document.getElementById("cemail").value)
        $("#postQuery").click();
    else{
        $("#cemail").css("border-color","red");
        setTimeout(() => {
            
        $("#cemail").css("border-color","rgba(0,0,0,0.2)");
        }, 1500); 
    }
});


$(".submit-btn").click(()=>{

    document.getElementById("min_submit").value = document.getElementById("min").innerHTML;
    document.getElementById("max_submit").value = document.getElementById("max").innerHTML;

})