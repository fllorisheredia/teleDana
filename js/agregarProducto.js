function toggleForm() {
    var form = document.getElementById("form-container");
    if (form.classList.contains("hidden")) {
        form.classList.remove("hidden");
    } else {
        form.classList.add("hidden");
    }
}
