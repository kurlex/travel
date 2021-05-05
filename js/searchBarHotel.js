$(document).ready(()=>{
    $("#search").keyup(()=>{

        var queryText = $("#search").val();
        if(queryText!=''){
            $.ajax({
                url:'../includes/actionHotel.php',
                method:'post',
                data:{
                    query : queryText,
                    num : "1"
                },
                success:function(response){
                    $("#input-list1").html(response);
                }
            })
        }
        else{
            $("#input-list1").html('');
        }
    })
    $(document).on('click','.input-item-active1',(d)=>{
        var s = d.currentTarget.lastElementChild.textContent.split(',');
        $("#search").val(s[0]);
        $("#numSearch1").val(s[1]);
    })
    
    $("#search").focusout(()=>{
        setTimeout(() => {
            $(".input").css("display","none");
        }, 500);
    })
    $("#search").focusin(()=>{
        setTimeout(() => {
            $(".input").css("display","block");
        }, 500);
    })

})

