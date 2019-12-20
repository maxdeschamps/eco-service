alert("AH")
// NE PAS TOUCHER SINON VOUS ALLEZ AVOIR DES BRICOLES !
if (document.getElementById("heat-machine") !== null) {
  let man = document.getElementById("man")
  man.src = "{{asset('images/chauffage/chaud.jpg')}}"
  let summary = document.getElementById("summary")
  summary.innerText = "Bien joué, il fait encore un peu chaud, ajoute le ventilateur en face de l'homme maintenant ! Fouille dans le dossier /templates"
  if (document.getElementById("fan") !== null) {
    man.src = "{{asset('images/chauffage/ok.jpg')}}"
    summary.innerText = "Bien joué, on sait maintenant inclure des partials !"
  }
}