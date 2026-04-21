const bottoneMenu = document.getElementById("bottoneMenu");
const overlayMenu = document.getElementById("overlayMenu");
const chiudiMenu = document.getElementById("chiudiMenu");

bottoneMenu.addEventListener("click", () => {
  overlayMenu.classList.add("attivo");
});

chiudiMenu.addEventListener("click", () => {
  overlayMenu.classList.remove("attivo");
});