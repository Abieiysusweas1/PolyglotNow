document.addEventListener("DOMContentLoaded", function() {
    const select = document.getElementById("lan");
    const checkboxIng = document.getElementById("checkbox-ing");
    const checkboxEsp = document.getElementById("checkbox-esp");

    function actualizarCheckbox() {
        if (select.value === "espanol") {
            checkboxEsp.style.display = "none";
            checkboxIng.style.display = "flex";
        } else if (select.value === "ingles") {
            checkboxIng.style.display = "none";
            checkboxEsp.style.display = "flex";
        } else {
            // Por si hay más idiomas en el futuro
            checkboxIng.style.display = "flex";
            checkboxEsp.style.display = "flex";
        }
    }

    // Llama a la función al cargar la página y cuando cambie el select
    actualizarCheckbox();
    select.addEventListener("change", actualizarCheckbox);
});
