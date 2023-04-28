function showHamburger() {
    const ham = document.getElementById("hamburger");

    if (ham.classList.contains("hidden")) {

        ham.classList.remove("hidden")
        ham.classList.add("grid")
    }
    else {
        ham.classList.remove("grid")
        ham.classList.add("hidden")
    }
}