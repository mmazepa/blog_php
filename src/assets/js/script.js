/* jshint esversion: 6 */

var animalLength;

const enableUpdateForm = (id, species, name, weight, height) => {
    document.getElementById("updateDiv").hidden = false;

    const animal = [id, species, name, weight, height];
    animalLength = animal.length;
    var i;

    for (i = 1; i < animalLength; i++) {
        document.getElementById("form0" + i).readOnly = false;
    }
    document.getElementById("update").disabled = false;
    document.getElementById("cancel").disabled = false;

    for (i = 0; i < animalLength; i++) {
        document.getElementById("form0" + i).value = animal[i];
    }
};

const disableUpdateForm = () => {
    document.getElementById("updateDiv").hidden = true;
    var i;

    for (i = 1; i < animalLength; i++) {
        document.getElementById("form0" + i).readOnly = true;
    }
    document.getElementById("update").disabled = true;
    document.getElementById("cancel").disabled = true;

    for (i = 0; i < animalLength; i++) {
        document.getElementById("form0" + i).value = null;
    }
};
