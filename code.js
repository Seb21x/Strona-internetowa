API_KEY = "01c33019d47dd5d132bf4c18958ac181";

    async function infoapi() {
    artistName = document.getElementById("artistName").value;
    url = `https://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=${encodeURIComponent(artistName)}&api_key=${API_KEY}&format=json`;
    response = await fetch(url);
    data = await response.json();
    if (data.error) {
        document.getElementById("artistInfo").innerText = "Nie znaleziono informacji o artyście.";
    } else {
        artist = data.artist;
        document.getElementById("artistInfo").innerHTML = `
        <h2>${artist.name}</h2>
        <p>${artist.bio.summary}</p>
    `;
    }
}

function ciekawostkaklik() {
    const info = document.getElementById("extra-info");
    if (info.children.length === 0) {
        const ciekawostka = document.createElement("p");
        ciekawostka.textContent = "Tupac Shakur i The Notorious B.I.G., ikony rapu lat 90., zginęli w wyniku tajemniczych strzelanin, które do dziś budzą kontrowersje. Tupac został postrzelony w Las Vegas 7 września 1996 roku i zmarł sześć dni później. Zaledwie pół roku później, 9 marca 1997 roku, Biggie zginął w podobnych okolicznościach w Los Angeles. Obie śmierci związane były z napięciami między Wschodnim a Zachodnim Wybrzeżem, ale mimo licznych teorii, nikt nigdy nie został skazany za te zabójstwa, co podsyca zainteresowanie i spekulacje do dziś.";
        ciekawostka.style.fontStyle = "italic";
        info.appendChild(ciekawostka);
    } else {
    info.innerHTML = '';
    }
}

$( function() {
    var availableTags = [
        "Travis Scott",
        "50 cent",
        "21 savage",
        "Kanye West",
        "Grandmaster flash",
        "LL COOL J",
        "Afrika Bambaataa",
        "Nas",
        "2Pac",
        "The Notorious B.I.G.",
        "Wu-Tang Clan",
        "Paktofonika",
        "Pezet",
        "Białas",
        "Sentino",
        "Tyler, The Creator",
        "Nemzzz",
        "Big L",
        "Kendrick Lamar",
        "King Von",
        "XXXTENTACION",
        "MF DOOM"
    ];
    $( "#artistName" ).autocomplete({
    source: availableTags
    });
} );

$(function() {
    $("#datepicker").attr("type", "text").datepicker();
});


$(document).ready(function() {
    if ($('.rating').length > 0) { 
        $('.rating').starRating({
            inputName: 'Ocena',
            showInfo: true,
            titles: ["Bardzo słaba", "Słaba", "Średnia", "Dobra", "Świetna!"],
            starIconEmpty: 'far fa-star',
            starIconFull: 'fas fa-star',
            starColorEmpty: 'lightgray',
            starColorFull: '#FFC107',
            starsSize: 4,
            stars: 5,
        });
    }
});

const ratingElement = document.querySelector('.rating');
if (ratingElement) {
    ratingElement.style.display = 'block';
}
