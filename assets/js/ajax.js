// traitement des favoris

function addFavorite()
{
     // je souahhite trouver l'id du post liké
     // Je cible l'élément parent qui contient un id unique par poste
     let parent = this.parentElement;
     //console.log(parent);

     let xhr = new XMLHttpRequest();

     xhr.open("POST", "data.php", true);

     // Quand on transmet en post il faut préciser le content type pour s'assurer d'un traitement correct
     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

     // Nous transmesttons un nouvel argument afin de transmettre notre demande ajax dans les meilleurs conditions possible
     xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

     xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            let result = xhr.responseText;
            //console.log("Result: " + result);

            // Si l'operation est un succes (retour en true), alors on injecte une nouvelle classe
            if(result == "true")
            {
                parent.classList.add("favorite");
            }
        }
     }

     xhr.send("id=" + parent.id);
}

let favButtons = document.getElementsByClassName("btn-favorite");

//console.log(favButtons);
// Je créé une boucle pour cibler mes éléments
for(let i = 0; i< favButtons.length; i++)
{
    favButtons.item(i).addEventListener("click", addFavorite);
}

// traitement de la deconnexion

function deconnectSession()
{
    let xhr = new XMLHttpRequest();


    let url ="data.php?a=deconnect";

    xhr.open("GET", url, true);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            let result = xhr.responseText;
            //console.log(result);

            if(result == "true")
            {
                let objectBtnAsFav = document.getElementsByClassName("favorite");
                let btnAsFav = Object.values(objectBtnAsFav);
                //console.log(btnAsFav);
                btnAsFav.forEach((item, index) => {
                    item.classList.remove("favorite");
                });
            }
        }
    }
    
    xhr.send();
}

let btnDeconnect = document.getElementById("btn-deconnect");
btnDeconnect.addEventListener("click", deconnectSession);


// traitement du dislike favorite

function removeFavorite()
{
    // Je souahite retrouver l'id du post
    let parent = this.parentElement.parentElement;
    //console.log(parent);
    let xhr = new XMLHttpRequest();
    


    xhr.open("POST", "data.php", true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status== 200);
        {
            let result = xhr.responseText;
            //console.log(result);

            if(result == "true")
            {
                parent.classList.remove("favorite");
            }
        }
    }


    xhr.send("id= " + parent.id + "&a=remove");
}



let unFavButtons = document.getElementsByClassName("marker");
//console.log(unFavButtons);

for(i=0; i<unFavButtons.length; i++)
{
    unFavButtons.item(i).addEventListener("click", removeFavorite);
}