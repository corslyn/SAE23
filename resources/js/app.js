function redirect(url) {
    window.location.href = url;
}

window.addEventListener("DOMContentLoaded", () => {
    console.clear()
    let select = document.getElementById("choix");
    
    select.addEventListener("change", (e) => {
        let value = e.target.value;
        console.log(value);
        if(value === "signup") {
            redirect("/signup");
        } else if(value === "login") {
            redirect("/login");
        } else if(value === "logout") {
            redirect("/logout");
        } else if(value === "profile") {
            redirect("/profile");
        }
    });
})
