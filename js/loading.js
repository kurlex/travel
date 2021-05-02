function rot (id,ins="+"){
  var el=document.getElementById(id);
  el.style.transform="rotate(1deg)";
  ID=setInterval(function () {
  var s=el.style.transform;
  x=Number(s.slice(7,s.length-4));
  if(ins=="+")
  x=x+10;
  else {
    x=x-10;
  }
  el.style.transform="rotate("+x+"deg)";
},20);
return ID;
}

function FadeIn(id,num=50){
  var el=document.getElementById(id);
  var s = 0;
  var x = 0;
  el.style.opacity=String(s);
    var ID=setInterval(function () {
      s+=0.1;
    el.style.opacity=String(s);
    x++;
    if(s>=1)
      clearInterval(ID);

  },num);
}

function FadeOut(id,num=50){
  var el=document.getElementById(id);
  var s = 1;
  el.style.opacity=String(s);
    var ID=setInterval(function () {
        s-=0.1;
    el.style.opacity=String(s);
    if(s<=0)
    clearInterval(ID);
  },num);
}

function tran(id,num,tox,toy)
{
var el=document.getElementById(id);
  el.style.transform="translate(1px,1px)";
    ID=setInterval(function () {
    var s=el.style.transform;
    s=(s.slice(10,s.length-1)).split(',');
    var x=s[0];
    var y=s[1];
    x=Number(x.slice(0,x.length-2));
    y=Number(y.slice(0,y.length-2));
    x=x+tox;
    y=y+toy;
   el.style.transform="translate("+x+"px,"+y+"px)";
  },num);
  return ID;
}

