/* jshint esversion: 6 */

const enableUpdateForm = (type, ...params) => {
    document.getElementById("updateDiv").hidden = false;
    let object = [];
    for (let param of params)
        object.push(param);
    let length = object.length;
    var i;

    for (i = 1; i < length; i++)
        document.getElementById("form0" + i).readOnly = false;
    document.getElementById("update").disabled = false;
    document.getElementById("cancel").disabled = false;

    for (i = 0; i < length; i++)
        document.getElementById("form0" + i).value = object[i];

    changeModalTitle(type, params[1]);
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

const changeModalTitle = (var1, var2) => {
    var modal = document.getElementsByClassName("modal-title")[0];
    modal.innerHTML = modal.innerHTML.split(" ")[0];
    if (var1.localeCompare("user") == 0)
        var2 = var2.split("@")[0];
    else if (var1.localeCompare("post") == 0)
        var2 = "\"" + var2 + "\"";
    modal.innerHTML += " " + var1 + " <b>" + var2 + "</b>";
};
