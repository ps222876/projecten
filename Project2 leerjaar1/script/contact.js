function myFunction() {
  var voornaam = (document.getElementById("voornaam").value)
  var achternaam = (document.getElementById("achternaam").value)
  var mail = (document.getElementById("mail").value)

  if (voornaam != "" && achternaam != "" && mail != "") {
      alert ("Uw gegevens zijn verstuurd")
  }

  else if (voornaam == "" || achternaam == "" || mail == "") {
      alert("Voer jouw gegevens in.")
  }
 
  }
