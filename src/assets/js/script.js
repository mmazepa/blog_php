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
