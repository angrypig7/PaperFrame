function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

var cookie = document.cookie;
var sess_cookie = getCookie(PHPSESSID);
alert(cookie);
alert("123");
