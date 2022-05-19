
var user = document.querySelector('#user');
var pass = document.querySelector('#pass');
var errors = document.getElementById('errors');
user.addEventListener('keyup',function(){
    if(user.value.length == 0){
		user.style.border='red thin solid';
    }else{
		user.style.border='green thin solid';
    }
});
 function validate(){
    if(user.value.length == 0){
		errors.innerHTML ='vui lòng nhập tên từ 2 kí tự trở lên ';
		return false;
	}
 }