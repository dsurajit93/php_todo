function validate_data(){
  //alert("Hello");
  var mobile=document.getElementById("mobile").value;
  var pass=document.getElementById("password").value;
  var cpass=document.getElementById("cpassword").value;
  if(isNaN(mobile) || mobile.length!=10){
    document.getElementById("err_mob").innerHTML="Invalid Mobile Number";
    return false;
  }else{
    document.getElementById("err_mob").innerHTML="";
  }
  if(pass.length<6 || pass.length>15){
    document.getElementById("err_pass").innerHTML="Password must be between 6 to 15 character";
    return false;
  }else{
    document.getElementById("err_pass").innerHTML="";
  }
  if(pass!=cpass){
    document.getElementById("err_cpass").innerHTML="Password and Confirm Password must be same";
    return false;
  }else{
    document.getElementById("err_cpass").innerHTML="";
  }
}

function validate_date(){
  //alert("Hello");
  var day=document.getElementById("day").value;
  var time=document.getElementById("time").value;
  //alert(day+" "+time);
  var today = new Date();
 // alert("Today: "+today);
  
  day=day.split("-");
  time=time.split(":");
  var day_f=new Date(day[0],day[1]-1,day[2],time[0],time[1]);
  //alert("Formated Date: "+day_f)
  var day_t=day_f.getTime();
  var today_t=today.getTime();

  //alert("MS: "+day_t+"\n"+today_t);
  

  if(day_t<today_t){
    alert("Invalid Date");
    return false;
  }
}