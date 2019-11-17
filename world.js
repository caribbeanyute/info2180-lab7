
window.onload = function() {
    var anchor = document.getElementById("lookup");
        anchor.onclick = function() {
            var route = ("/world.php?country="+document.getElementById('country').value);
            console.log(route);
            fetch(route)
            .then(response => response.text())
            .then(data => {
                setDiv(data) // Prints result from `response.json()` in getRequest
            })
            .catch(error => console.error(error))
            
            
    }
    
    var anchor2 = document.getElementById("lookup-cit");
        anchor2.onclick = function() {
            var route = ("/world.php?country="+document.getElementById('country').value+"&context=cities");
            console.log(route);
            fetch(route)
            .then(response => response.text())
            .then(data => {
                setDiv(data) // Prints result from `response.json()` in getRequest
            })
            .catch(error => console.error(error))
            
    }
}








function setDiv(p1) {
	var result = document.getElementById("result");
	result.innerHTML = p1;}
  