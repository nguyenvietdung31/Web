//SIDEBAR JS 
var toggle1 = document.getElementById('toggle1');
var toggle2 = document.getElementById('toggle2');
var arrow1 = document.getElementById('arrow1');
var arrow2 = document.getElementById('arrow2');
var showcat= document.querySelectorAll('.showcat');
var showbrand= document.querySelectorAll('.showbrand');

toggle1.addEventListener('click',()=>{
    for(var i = 0; i< showcat.length; i++){
        if(showcat[i].style.display == 'block'){
            showcat[i].style.display = 'none';
            arrow1.style.transform = 'rotate(0deg)';
            arrow1.style.color = '#ccc';

        }else{
            showcat[i].style.display = 'block';
            arrow1.style.transform = 'rotate(180deg)';
            arrow1.style.color = '#50c7c7';
        }
    }
});

toggle2.addEventListener('click',()=>{
    for(var i = 0; i< showbrand.length; i++){
        if(showbrand[i].style.display == 'block'){
            showbrand[i].style.display = 'none';
            arrow2.style.transform = 'rotate(0deg)';
            arrow2.style.color = '#ccc';
        }else{
            showbrand[i].style.display = 'block';
            arrow2.style.transform = 'rotate(180deg)';
            arrow2.style.color = '#50c7c7';
        }
    }
});

// Login form and register form 
var user = document.querySelector('#user');
var pass = document.querySelector('#pass');

var fullname = document.querySelector('#fullname');
var mobile = document.querySelector('#mobile');
var address = document.querySelector('#address');
var email = document.querySelector('#email');
var errors = document.getElementById('error');

var login = document.getElementById('login');
user.addEventListener('keyup',function(){
	var u_check = document.querySelector('.u_check');
	var u_times = document.querySelector('.u_times');
	// kiểm tra thông tin người dùng nhập ô username
	if(user.value.length == 0 || user.value.length < 2){
		user.style.border='red thin solid';
		u_times.style.display='block';
		u_check.style.display = 'none';
	}else{
        user.style.border ='green thin solid';
        u_times.style.display ='none';
        u_check.style.display ='block';
    }
	
});

pass.addEventListener('keyup',function(){
	var p_check = document.querySelector('.p_check');
	var p_times = document.querySelector('.p_times');
	if(pass.value.length == 0 || pass.value.length < 6){
		pass.style.border='red thin solid';
		p_times.style.display='block';
		p_check.style.display = 'none';
	}else{
        pass.style.border ='green thin solid';
        p_times.style.display ='none';
        p_check.style.display ='block';
    }
	
});

fullname.addEventListener('keyup',function(){
	var f_check = document.querySelector('.f_check');
	var f_times = document.querySelector('.f_times');
	if(fullname.value.length == 0 || fullname.value.length < 4){
		fullname.style.border='red thin solid';
		f_times.style.display='block';
		f_check.style.display = 'none';
	}else{
        fullname.style.border ='green thin solid';
        f_times.style.display ='none';
        f_check.style.display ='block';
    }
	
});

mobile.addEventListener('keyup',function(){
	var m_check = document.querySelector('.m_check');
	var m_times = document.querySelector('.m_times');
	// kiểm tra thông tin người dùng nhập ô username
	if(mobile.value.length == 0 || mobile.value.length !=10){
		mobile.style.border='red thin solid';
		m_times.style.display='block';
		m_check.style.display = 'none';
	}else{
        mobile.style.border ='green thin solid';
        m_times.style.display ='none';
        m_check.style.display ='block';
    }
	
});

address.addEventListener('keyup',function(){
	var a_check = document.querySelector('.a_check');
	var a_times = document.querySelector('.a_times');
	// kiểm tra thông tin người dùng nhập ô username
	if(address.value.length == 0 ){
		address.style.border='red thin solid';
		a_times.style.display='block';
		a_check.style.display = 'none';
	}else{
        address.style.border ='green thin solid';
        a_times.style.display ='none';
        a_check.style.display ='block';
    }
	
});

email.addEventListener('keyup',function(){
	var e_check = document.querySelector('.f_check');
	var e_times = document.querySelector('.e_times');
	// kiểm tra thông tin người dùng nhập ô username
	if(email.value.length == 0){
		email.style.border='red thin solid';
		e_times.style.display='block';
		e_check.style.display = 'none';
	}else{
        email.style.border ='green thin solid';
        e_times.style.display ='none';
        e_check.style.display ='block';
    }
	
});

function validate_register(){
	if(user.value.length == 0 || user.value.length <2){
		errors.innerHTML ='vui lòng nhập tên từ 2 kí tự trở lên ';
		return false;
	}else if(pass.value.length == 0 || pass.value.length <6){
		errors.innerHTML ='Vui lòng nhập mật khẩu từ 6 ký tự trở lên ';
		return false;
	}else if(fullname.value.length == 0 || fullname.value.length < 4){
		errors.innerHTML ='Họ và tên không được để chống  ';
		return false;
	}else if(mobile.value.length == 0 || mobile.value.length !=10){
		errors.innerHTML ='Số điện thoại không được để chống và gồm 10 số  ';
		return false;
	}else if(address.value.length == 0){
		errors.innerHTML ='Địa chỉ không được để chống   ';
		return false;
	}else if(email.value.length == 0){
		errors.innerHTML ='Email không được để chống  ';
		return false;
	}
}

function validate(){
	if(user.value.length == 0 || user.value.length <2){
		errors.innerHTML ='vui lòng nhập tên từ 2 kí tự trở lên ';
		return false;
	}else if(pass.value.length == 0 || pass.value.length <6){
		errors.innerHTML ='Vui lòng nhập mật khẩu từ 6 ký tự trở lên ';
		return false;
	}
}
// Info order 
function info_order(){
	if(names.value.length == 0 ||names.value.length <2){
		message.innerHTML ='vui lòng nhập tên từ 2 kí tự trở lên ';
		return false;
	}else if(mobi.value.length == 0 || mobi.value.length !=10){
		message.innerHTML ='Số điện thoại bao gồm 10 số không được để trống ';
		return false;
	}else if(ads.value.length == 0 ){
		message.innerHTML ='Địa chỉ không được để trống  ';
		return false;
	}else if(email.value.length == 0){	
		message.innerHTML ='Email không được để trống ';
		return false;
	}
}
// search product 
var 