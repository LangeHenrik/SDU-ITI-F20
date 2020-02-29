 function validate_email(email) {
  //定义正则表达式的变量:邮箱正则
  var emailReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
  //console.log(username);
  if (email != "" && email.search(emailReg) != -1) {
    document.getElementById("test_email").innerHTML = "<font color='green' size='3px'>√邮箱格式正确</font>";
  } else {
    document.getElementById("test_email").innerHTML = "<font color='red' size='3px'>邮箱格式错误</font>";
  }
}

function validate_password2(password2) {
  var password = document.getElementById("password").value;

  if (password == "") {
    document.getElementById("is_test_pw").innerHTML = "<font color='red' size='3px'>密码不为空</font>";
  } else if (password == password2) {
    document.getElementById("is_test_pw").innerHTML = "<font color='green' size='3px'>√两次输入的密码相同</font>";
  } else {
    document.getElementById("is_test_pw").innerHTML = "<font color='red' size='3px'>两次输入的密码不相同</font>";
    console.log("密码有6位，由数字和字母组成!");
  }
}