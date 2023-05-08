function bestellen() {
    alert("Uw gegevens zijn verstuurd.");
  }

function checkbox(){
    var checkboxes = document.getElementsByClassName("checkbox");
    var mijn_winkelwagen =  document.getElementsByClassName("mijn-winkelwagen")[0];
    var checkboxescheck = false;
    mijn_winkelwagen.innerHTML = "";
    for (var i = 0; i < checkboxes.length ; i++)
    {
        if (checkboxes[i].checked)
        {
           var fietsnaam = checkboxes[i].getAttribute("data-naamfiets");
           var prijs = checkboxes[i].getAttribute("data-prijs");
           var dag = checkboxes[i].getAttribute("data-dag");
           console.log(fietsnaam)
           console.log(prijs)
           console.log(dag)
           prijsafgerond = Math.round(prijs*100)/100;

           mijn_winkelwagen.innerHTML += fietsnaam + "€" + prijsafgerond +" " + dag + "<br>" + "<br>";

         checkboxescheck = true;


        }

        if(checkboxescheck)
        {
            document.getElementById("btn")
            btn.disabled = false;
        }
        else
        { 
            document.getElementById("btn")
            btn.disabled = true
        }

        console.log(checkboxes[i]);
    }

    
    
}