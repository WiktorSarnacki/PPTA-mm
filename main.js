const productContainer = document.getElementById("product-container")
const form = document.getElementById("product-form")
let productNumber = 0
let name = form.elements["name"]
let cost = form.elements["cost"]
let picture = form.elements["picture"]
let location = form.elements["location"]
let description = form.elements["description"]
let condition = form.elements["condition"]

function formAlert(){
    window.alert("Proszę wypełnić formularz!")
}
//Atrybuty produktu: zdjęcie, nazwa, cena, lokalizacja, opis, stan techniczny

function isFormValid(){
    let alertC = 0
    if(name == "" && alertC == 0){
        formAlert()
        alertC++
    }else if(cost == "" && alertC == 0){
        formAlert()
        alertC++
    }else if(picture == "" && alertC == 0){
        formAlert()
        alertC++
    }else if(location == "" && alertC == 0){
        formAlert()
        alertC++
    }else if(description == "" && alertC == 0){
        formAlert()
        alertC++
    }else if(condition == "" && alertC == 0){
        formAlert()
        alertC++
    }else{
        addProduct()
    }
}

function addProduct(){
    productNumber++
    let newProductContainer = document.createElement('li')
    newProductContainer.className = ("product-" + productNumber)
    productContainer.appendChild(newProductContainer)
    
    newProductContainer.innerHTML = `<img src="${picture}" alt="zdjęcie"><h3>${name}</h3>`
}

//Dodaje sobie te show i hide z jQuery
$("#login-div").hide();
$("#register-div").hide();

$("#login-button").onclick(function(){
    $("#login-div").show();
})

$("#register-button").onclick(function(){
    $("#register-div").show();
})
