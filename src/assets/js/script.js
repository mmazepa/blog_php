/* jshint esversion: 6 */

var userLength;

const enableUpdateForm = (id, email, password, role) => {
    document.getElementById("updateDiv").hidden = false;

    const user = [id, email, password, role];
    userLength = user.length;
    var i;

    for (i = 1; i < userLength; i++) {
        document.getElementById("form0" + i).readOnly = false;
    }
    document.getElementById("update").disabled = false;
    document.getElementById("cancel").disabled = false;

    for (i = 0; i < userLength; i++) {
        document.getElementById("form0" + i).value = user[i];
    }

    changeModalTitle(email);
};

const disableUpdateForm = () => {
    document.getElementById("updateDiv").hidden = true;
    var i;

    for (i = 1; i < userLength; i++) {
        document.getElementById("form0" + i).readOnly = true;
    }
    document.getElementById("update").disabled = true;
    document.getElementById("cancel").disabled = true;

    for (i = 0; i < userLength; i++) {
        document.getElementById("form0" + i).value = null;
    }
};

const hidePassword = () => {
    var passwords = document.getElementsByClassName("password");
    for (var pass = 0; pass < passwords.length; pass++) {
        var hiddenPassword = "";
        for (var i = 0; i < passwords[pass].innerHTML.length; i++) {
            hiddenPassword += "*";
        }
        passwords[pass].innerHTML = hiddenPassword;
    }
};
hidePassword();

const changeModalTitle = (email) => {
    var modal = document.getElementsByClassName("modal-title")[0];
    modal.innerHTML = modal.innerHTML.split(" ")[0];
    modal.innerHTML += " użytkownika <b>" + email.split("@")[0] + "</b>";
};
