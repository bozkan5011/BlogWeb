if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', uploadPage)
} else {
    uploadPage()
}

function uploadPage() {
    var removeBasketItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeBasketItemButtons.length; i++) {
        var button = removeBasketItemButtons[i]
        button.addEventListener('click', removeBasketItem)
    }

    var quantityInputs = document.getElementsByClassName('basket-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToBasketButtons = document.getElementsByClassName('add-button')
    for (var i = 0; i < addToBasketButtons.length; i++) {
        var button = addToBasketButtons[i]
        button.addEventListener('click', addToBasketClicked)
    }

    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
}

//clearing the basket and alerting for purchase
function purchaseClicked() {
    alert('PURCHASE IS COMPLETED.')
    var basketItems = document.getElementsByClassName('basket-items')[0]
    while (basketItems.hasChildNodes()) {
        basketItems.removeChild(basketItems.firstChild)
    }
    updateBasketTotal()
}

//removing basket
function removeBasketItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateBasketTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateBasketTotal()
}

function addToBasketClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('phone-title')[0].innerText
    var price = shopItem.getElementsByClassName('phone-price')[0].innerText
    var imageSrc = shopItem.getElementsByClassName('phone-image')[0].src
    addItemToBasket(title, price, imageSrc)
    updateBasketTotal()
}

function addItemToBasket(title, price, imageSrc) {
    var basketRow = document.createElement('div')
    basketRow.classList.add('basket-row')
    var basketItems = document.getElementsByClassName('basket-items')[0]
    var basketItemNames = basketItems.getElementsByClassName('basket-item-title')
    for (var i = 0; i < basketItemNames.length; i++) {
        if (basketItemNames[i].innerText == title) {
            alert('This item is already added to the basket')
            return
        }
    }
    var basketRowContents = `
        <div class="basket-item basket-column">
            <img class="basket-item-image" src="${imageSrc}" width="100" height="100">
            <span class="basket-item-title">${title}</span>
        </div>
        <span class="basket-price basket-column">${price}</span>
        <div class="basket-quantity basket-column">
            <input class="basket-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">sil</button>
        </div>`
    basketRow.innerHTML = basketRowContents
    basketItems.append(basketRow)
    basketRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeBasketItem)
    basketRow.getElementsByClassName('basket-quantity-input')[0].addEventListener('change', quantityChanged)
}

function updateBasketTotal() {
    var basketItemContainer = document.getElementsByClassName('basket-items')[0]
    var basketRows = basketItemContainer.getElementsByClassName('basket-row')
    var total = 0
    for (var i = 0; i < basketRows.length; i++) {
        var basketRow = basketRows[i]
        var priceElement = basketRow.getElementsByClassName('basket-price')[0]
        var quantityElement = basketRow.getElementsByClassName('basket-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('₺', ''))
        var quantity = quantityElement.value
        total = total + (price * quantity)
    }
    
    document.getElementsByClassName('basket-total-price')[0].innerText = total + '₺' 
}