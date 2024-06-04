//aggiungi preferiti
function addLike(event) {
    const star = event.currentTarget.querySelector(".preferiti");
    const circuitName = event.currentTarget.querySelector(".name").textContent;
    star.src = "images/star.png";

    fetch("addprefer.php?circuitName=" + encodeURIComponent(circuitName))
        .then(onResponse)
        .catch(error => console.error('Error:', error));
}

function onResponse(response) {
    if (response.ok) {
        return response.text().then(text => {
            console.log("Circuito aggiunto ai preferiti:", text);
        });
    } else {
        console.error('Errore nella risposta del server:', response.statusText);
    }
}

const circuits = document.querySelectorAll("section.circuit-section .circuit");
for (const circuit of circuits) {
    circuit.addEventListener('click', addLike);
}







