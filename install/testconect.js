function testConexion(server, user, pass, database) {
    var xmlhttp;
    if (server.length == 0 && user.length == 0 && pass.length == 0 && database.length == 0) {
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
    } else {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            alert(xmlhttp.responseText);
        }
    }
    server = encodeURIComponent(server);
    user = encodeURIComponent(user);
    pass = encodeURIComponent(pass);
    database = encodeURIComponent(database);
    var url = ("conect.php?server="+server+"&user="+user+"&pass="+pass+"&db="+database);
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
