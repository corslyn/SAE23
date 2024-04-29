function redirect(url) {
    window.location.href = url;
}

window.addEventListener("DOMContentLoaded", () => {
    console.clear()
    let select = document.getElementById("choix");
    
    select.addEventListener("change", (e) => {
        let value = e.target.value;
        console.log(value);
        if(value === "Option1") {
            redirect("/signup");
        } else if(value === "option2") {
            redirect("/login");
        }
    });
})