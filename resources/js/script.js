let oJatekos = []
let xJatekos = []
const jatekosok = ["O", "X"]
let aktualisJatekos = ""
let aktualis = false
let vegeAJateknak = false



const gyoztes = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
]


document.addEventListener("DOMContentLoaded", (event) => {
    jatekosValasztas()

});

function jatekosValasztas() {
    let min = 0; // az O
    let max = 1; // az X
    let kezdoJatekos = Math.floor(Math.random() * (max - min + 1)) + min;
    const infoBox = document.querySelector("#infoBox")
    const kontener = document.querySelector("#container")
    const info = document.querySelector("h3")
    console.log(kezdoJatekos);

    if (kezdoJatekos == 0) {
        aktualisJatekos = jatekosok[0] // elmentjük az aktuális játékost változóban sztringként
        console.log("A játékos a körrel van")
        info.textContent = "A kör játékos kezd"

    }
    else {
        aktualisJatekos = jatekosok[1]
        console.log("A játékos az X-el van")
        info.textContent = "Az X játékos kezd"
    }
    klikkesemeny(aktualisJatekos)


}


function klikkesemeny(kezdoJatekos) {
    const gombok = document.querySelectorAll("button")

    gombok.forEach((gomb, index) => {

        gomb.addEventListener("click", (event) => {
            const aktualisIndex = index

            console.log("gomb id és az indexe", gomb.id, aktualisIndex)
            if (aktualisJatekos == jatekosok[0] && gomb.children.length == 0) { //gyerek elemét a gombnak vizsgáljuk

                const imgO = document.createElement("img")
                imgO.src = "game/o.svg"
                imgO.className = "kep"
                gomb.append(imgO)
                oJatekos.push(Number(gomb.id))
                console.log("A kör játékos tömb adatai", oJatekos)
                aktualis = true
            } else if (aktualisJatekos == jatekosok[1] && gomb.children.length == 0) { //gyerek elemét a gombnak vizsgáljuk
                const imgX = document.createElement("img")

                imgX.src = "game/x.svg"
                imgX.className = "kep"
                gomb.append(imgX)
                xJatekos.push(Number(gomb.id))
                console.log("Az x játékos tömb adatai", xJatekos)

                aktualis = true


            } else {
                alert("Ide nem  rakhatsz");
                jatekosCsere(aktualisJatekos)
            }
            console.log(oJatekos, xJatekos)

            jatekosCsere(aktualisJatekos)
            ellenoriz()

        })

    })

}

function jatekosCsere(aktJatekos) {
    const infoBox = document.querySelector("#infoBox")
    const kontener = document.querySelector("#container")
    const info = document.querySelector("h3")


    if (aktJatekos == jatekosok[0]) {
        aktualisJatekos = jatekosok[1]
        console.log("Most az X jön!")

        info.textContent = "Most az X játékos jön!"

    } else {
        aktualisJatekos = jatekosok[0]
        console.log("Most a kör jön!")
        info.textContent = "Most a kör játékos jön!"

    }
}


function ellenoriz() {
    //console.log(elsoJatekos)


    if (oJatekos.includes(1) && oJatekos.includes(2) && oJatekos.includes(3)) {
        nyerAJatekos()

    }
    if (oJatekos.includes(4) && oJatekos.includes(5) && oJatekos.includes(6)) {
        nyerAJatekos()


    } if (oJatekos.includes(7) && oJatekos.includes(8) && oJatekos.includes(9)) {
        nyerAJatekos()

    } if (oJatekos.includes(1) && oJatekos.includes(4) && oJatekos.includes(7)) {
        nyerAJatekos()

    } if (oJatekos.includes(2) && oJatekos.includes(5) && oJatekos.includes(8)) {
        nyerAJatekos()

    } if (oJatekos.includes(1) && oJatekos.includes(5) && oJatekos.includes(9)) {
        nyerAJatekos()

    } if (oJatekos.includes(3) && oJatekos.includes(5) && oJatekos.includes(7)) {
        nyerAJatekos()

    } if (oJatekos.includes(3) && oJatekos.includes(6) && oJatekos.includes(9)) {
        nyerAJatekos()

    } if (xJatekos.includes(1) && xJatekos.includes(2) && xJatekos.includes(3)) {
        nyerAJatekos()

    } if (xJatekos.includes(4) && xJatekos.includes(5) && xJatekos.includes(6)) {
        nyerAJatekos()

    } if (xJatekos.includes(7) && xJatekos.includes(8) && xJatekos.includes(9)) {
        nyerAJatekos()

    } if (xJatekos.includes(1) && xJatekos.includes(4) && xJatekos.includes(7)) {
        nyerAJatekos()

    } if (xJatekos.includes(2) && xJatekos.includes(5) && xJatekos.includes(8)) {
        nyerAJatekos()

    } if (xJatekos.includes(3) && xJatekos.includes(6) && xJatekos.includes(9)) {
        nyerAJatekos()

    } if (xJatekos.includes(1) && xJatekos.includes(5) && xJatekos.includes(9)) {
        nyerAJatekos()
    }
    if (xJatekos.includes(3) && xJatekos.includes(5) && xJatekos.includes(7)) {
        nyerAJatekos()
    }

    let patt = egyenlo();
    if (patt && vegeAJateknak == false) {
        pattHelyzet()

    }

}

function egyenlo() {
    const gombok = document.querySelectorAll("button")
    let returnValue = true;

    gombok.forEach((gomb) => {
        if (gomb.children.length == 0) {
            returnValue = false;
        }
    })
    return returnValue;
}



function torolmindent() {
    const info = document.querySelector("h3")

    setTimeout(function () {

        if (confirm("Szeretnél új játékot kezdeni? Nyomj az Ok-ra!")) {
            window.location.reload();
        }
        else {
            tiltGombokat()
            info.textContent = "Remélem tetszett a játékom! :)"
        }


    }, 3000);


}

function tiltGombokat() {
    const gombok = document.querySelectorAll("button")

    gombok.forEach((gomb) => {
        gomb.disabled = true;
    })

}

function pattHelyzet() {
    const info = document.querySelector("h3")
    vegeAJateknak = true
    alert("Patthelyzet! Most nem nyert senki! :(")
    info.textContent = "Patthelyzet! Most nem nyert senki! :("
    tiltGombokat()
    torolmindent()
}

function nyerAJatekos() {
    const info = document.querySelector("h3")

    if (aktualisJatekos == jatekosok[1]) { // ha kör nyer
        aktualisJatekos = jatekosok[0]
        vegeAJateknak = true
        console.log(aktualisJatekos)
        info.textContent = "Nyert az" + " " + aktualisJatekos + " " + "!"
        tiltGombokat()
        torolmindent()
    }
    else {
        vegeAJateknak = true    // ha x nyer
        aktualisJatekos = jatekosok[1]
        console.log(aktualisJatekos)
        info.textContent = "Nyert az" + " " + aktualisJatekos + " " + "!"
        tiltGombokat()
        torolmindent()

    }
}










