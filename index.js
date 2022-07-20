function query(value){
    var obj;
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        //obj is the response recieved from the php script
        //Json.parse should only be used on responseText if the phpscript sends the data over as a json format
        obj = JSON.parse(this.responseText);
        }
    };
    //this connects to the php script running on the server (in this case, the server is running on localhost with XAMPP)
    //value is the query value you pass to php, so for instance if value is a username, then the php script will take in the username and can run a query with it
    xhttp.open("GET", "http://localhost/phpfile.php?q="+value, true);
    xhttp.send();
}