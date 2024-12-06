fetch('html/navbar.html')
    .then(response => response.text())
    .then(data => {
        document.querySelector('.navbar').innerHTML = data;
    })
    .catch(error => console.error('Hiba a navigáció betöltésekor:', error));