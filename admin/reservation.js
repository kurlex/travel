
arr = document.getElementsByTagName("input");
        for( i = 0 ;i <arr.length;i++)
        arr[i].checked = false;
document.getElementById("checkAll").innerHTML = "Check All";
$(".leftBar").css("height",$("body").css("height"));

req = parseInt(document.getElementById("i").innerHTML);
$("#flight").click(()=>{

    $.ajax({
        url:'../includes/getTable.php',
        method:'post',
        data:{
            id : req
        },
        success:function(res){
            $(".mid").html(res);
        },
        error:function(a,b,c){
            alert(c);
        }
                    })
})



$("#hotel").click(()=>{
    req = parseInt(document.getElementById("i").innerHTML);
    $.ajax({
        url:'../includes/getTablehotel.php',
        method:'post',
        data:{
            id : req
        },
        success:function(res){
            $(".mid").html(res);
        },
        error:function(a,b,c){
            alert(c);
        }
                    })
})


fun()
function fun(){
    $("#left").click(()=>{

        $.ajax({
            url:'../includes/getTable.php',
            method:'post',
            data:{
                id : req - 1
            },
            success:function(res){
                $(".mid").html(res);
                req = parseInt(document.getElementById("i").innerHTML);
                fun();
            },
            error:function(a,b,c){
                alert(c);
            }
                        })
    })
    $("#right").click(()=>{
    
        $.ajax({
            url:'../includes/getTable.php',
            method:'post',
            data:{
                id : req +1 
            },
            success:function(res){
                $(".mid").html(res);
                req = parseInt(document.getElementById("i").innerHTML);
                fun()
            },
            error:function(a,b,c){
                alert(c);
            }
                        })
    }) 
}


function checkAll(){
    ver = document.getElementById("checkAll").innerHTML;
    if(ver[0]=="C"){
        for( i = 0 ;i <arr.length;i++)
            arr[i].checked = true;
        document.getElementById("checkAll").innerHTML = "Uncheck All";
    }
    else{
        for( i = 0 ;i <arr.length;i++)
            arr[i].checked = false;
        document.getElementById("checkAll").innerHTML = "Check All";
    }
}


function expired(db,a){
    aj(2,"",db,a);
}

function confirm(db,a){
    s ="";
    i =0;
    for(;i <arr.length;i++)
        if(arr[i].checked){
            s = arr[i].id;
            break;
        }
    if(s=="")
        return;
    for(i=i+1;i< arr.length;i++){
        if(arr[i].checked)
            s += "," + arr[i].id;
        }
    aj(1,s,db,a);
}


function cache(db,a){
    aj(3,"",db,a);
}

function  aj(opp1 , s,db,id){
    $.ajax({
        url:'../includes/clear.php',
        method:'post',
        data:{
            query : s,
            opp : opp1,
            data : db
        },
        success:function(res){
            $(id).click();
        },
        error:function(a,b,c){
            alert(c);
        }
                    })
}