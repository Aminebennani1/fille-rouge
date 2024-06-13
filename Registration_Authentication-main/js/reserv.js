let btn = document.getElementById("makeButton");
const form = document.querySelector("form");

form.addEventListener("submit", e => {
    e.preventDefault();
})

btn.addEventListener("click", function () {
    let fullname = form.elements.fullname.value;
    let Email = form.elements.Email.value;
    let phone = form.elements.phone.value;
    let date = form.elements.date.value;
    

    let xml = new XMLHttpRequest();
    xml.open("POST", "../client/reserv.php", true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("fullname=" + fullname + "&Email=" + Email + "&phone=" + phone + "&date=" + date);
    xml.onload = function () {
        if (xml.readyState === XMLHttpRequest.DONE) {
            if (xml.status === 200) {
                if (xml.responseText == "true") {
                    alert("le reservation envoi");
                }
                else {
                    alert("le reservation n'envoi pas");
                }
            }
        }
    }
})
