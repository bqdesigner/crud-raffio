var report = document.getElementById("report").addEventListener('click', function() {
    var div = document.getElementById("report-space");
    if (div.style.display === "flex") {
      div.style.display = "none";
    } else {
      div.style.display = "flex";
    }
  })
function submitForm() {
    event.preventDefault();
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(){
        if (ajax.readyState == 4 && ajax.status == 200) {
            alert (ajax.responseText);
        }

        var infoReport = document.getElementById("infoReport").value;
        console.log(infoReport);

        var parametros = "infoReport"+encodeURIComponent(infoReport);

        ajax.open("POST", "actions/report.php", true);
        ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send(parametros);
    }
    // return false;
}