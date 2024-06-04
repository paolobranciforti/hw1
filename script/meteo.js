// Seleziona il pulsante per il Portogallo
const btnPortogallo = document.getElementById('btn_portogallo');
const btnAmerica = document.getElementById('btn_america');
const btnSpagna = document.getElementById('btn_spagna');

// Aggiungi un gestore di eventi click a tutti e tre i pulsanti
btnPortogallo.addEventListener('click', handleClick);
btnAmerica.addEventListener('click', handleClick);
btnSpagna.addEventListener('click', handleClick);

// Funzione gestore per il click del pulsante
function handleClick() {
    // Ottieni i valori degli attributi lat e lon specifici per il pulsante cliccato
    const lat = this.getAttribute('lat');
    const lon = this.getAttribute('lon');

    // Chiamata alla tua funzione con lat e lon come parametri
    console.log('Latitudine:', lat);
    console.log('Longitudine:', lon);
    getMeteo(lat, lon);
}

// Funzione getMeteo che accetta lat e lon come parametri
async function getMeteo(lat, lon) {
    const url = `https://weatherbit-v1-mashape.p.rapidapi.com/current?lon=${lon}&lat=${lat}`;
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '1daf3c2633msh31436d7d4882cf6p119b52jsn71015388daf9',
            'X-RapidAPI-Host': 'weatherbit-v1-mashape.p.rapidapi.com'
        },
    };

    try {
        const response = await fetch(url, options);
        const json = await response.json();
        console.log(json);
        console.log(json["data"][0]["city_name"]); //per debug
        costruisciTabellaMeteo(json);
        // Esegui altre operazioni con i dati ottenuti
    } catch (error) {
        console.error(error);
    }
}

function costruisciTabellaMeteo(json){
    const tableBody = document.querySelector('#meteoTable tbody');

    tableBody.innerHTML = "";

    // Crea una riga per ogni città nei dati
    const row = document.createElement('tr');

    // Aggiungi le celle con i dati
    const cityNameCell = document.createElement('td');
    cityNameCell.textContent = json["data"][0]["city_name"];
    row.appendChild(cityNameCell);

    const tempCell = document.createElement('td');
    tempCell.textContent = json["data"][0]["app_temp"];
    row.appendChild(tempCell);

    const weatherCell = document.createElement('td');
    weatherCell.textContent = json["data"][0]["weather"]["description"];
    row.appendChild(weatherCell);

    // Aggiungi la riga alla tabella
    tableBody.appendChild(row);
}