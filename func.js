//cash 체크
function check(){
var money=document.getElementsByClassName('money');
var sum=parseInt(money[0].innerText);
var my=parseInt(money[1].innerText);
var formcheck = document.formcheck;
if(sum<=my){
  formcheck.submit();
}else{
  alert("금액이 부족합니다.");
}
}
//선택 개수 체크
function numcheck(){
var formcheck = document.num_check;
var check=document.getElementsByClassName('check');
var i=check.length;
var count=0;
for (var j=0;j<i;j++){
  if(check[j].checked){count++};
}
if(count){
  formcheck.submit();
}
else{
  alert("한개 이상 선택 해주세요!");
}
}