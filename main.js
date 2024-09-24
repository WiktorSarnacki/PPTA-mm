const productContainer = document.getElementById("product-container")
const form = document.getElementById("product-form")
let productNumber = 0

function formAlert(){
    window.alert("Proszę wypełnić formularz!")
}
//Atrybuty produktu: zdjęcie, nazwa, cena, lokalizacja, opis, stan techniczny

function isFormValid(){
    let alertC = 0
    if(form.elements["name"] == "" && alertC == 0){
        formAlert()
        alertC++
    }else if(form.elements["cost"] == "" && alertC == 0){
        formAlert()
        alertC++
    }else if(form.elements["picture"] == "" && alertC == 0){
        formAlert()
        alertC++
    }else if(form.elements["location"] == "" && alertC == 0){
        formAlert()
        alertC++
    }else if(form.elements["description"] == "" && alertC == 0){
        formAlert()
        alertC++
    }else if(form.elements["condition"] == "" && alertC == 0){
        formAlert()
        alertC++
    }else{
        addProduct()
    }
}

function addProduct(){
    productNumber++
    let newProductContainer = document.createElement('div')
    newProductContainer.className = ("product-" + productNumber)
    productContainer.appendChild(newProductContainer)
}