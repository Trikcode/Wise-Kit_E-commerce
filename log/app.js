const cartInfo = document.getElementById('cart-info')
const cart = document.getElementById('cart')
cartInfo.addEventListener('click', () => {
  cart.classList.toggle('show-cart')
})

//add items to cart
const cartBtn = document.querySelectorAll('.store-icon')
cartBtn.forEach((btn) => {
  btn.addEventListener('click', (e) => {
    // console.log(e.target)
    if (e.target.parentElement.classList.contains('store-icon')) {
      let fullpath =
        e.target.parentElement.parentElement.previousElementSibling.src
      // let pos = fullpath.indexOf('uploads') + 7
      // let partPath = fullpath.slice(pos)

      const item = {}
      item.img = fullpath

      let name =
        e.target.parentElement.parentElement.parentElement.nextElementSibling
          .children[0].children[0].textContent
      item.name = name

      let price =
        e.target.parentElement.parentElement.parentElement.nextElementSibling
          .children[0].children[1].textContent
      let finalprice = price.slice(1).trim()
      item.price = finalprice
      const cartItem = document.createElement('div')
      cartItem.classList.add(
        'cart-item',
        'd-flex',
        'justify-content-between',
        'capitalize',
        'my-3'
      )
      cartItem.innerHTML = `<img src="${item.img}"     class="img-fluid rounded-circle" id="item-img" alt="">
            <div class="item-text">
              <p id="cart-item-title" class="font-weight-bold mb-0">${item.name}</p>
              <span>UGX</span>
              <span id="cart-item-price" class="cart-item-price" class="mb-0">${item.price}</span>
            </div>
            <a href="#" id='cart-item-remove' class="cart-item-remove">
              <i class="fas fa-trash"></i>`
      const cart = document.getElementById('cart')
      const total = document.querySelector('.cart-total-container')
      cart.insertBefore(cartItem, total)
      // const response = document.createElement('h4')
      // response.innerHTML = 'Item added to cart!'
      // cartItem.appendChild(response)
      alert('item added to the cart')
      showTotals()
    }
    function showTotals() {
      const total = []
      const items = document.querySelectorAll('.cart-item-price')
      items.forEach((item) => {
        total.push(parseFloat(item.textContent))
      })

      const totalAmount = total.reduce((total, item) => {
        total += item
        return total
      }, 0)
      const finalMoney = totalAmount.toFixed(2)
      console.log(finalMoney)
      document.getElementById('cart-total').textContent = finalMoney
      document.querySelector('.item-total').textContent = finalMoney
      document.getElementById('item-count').textContent = total.length
    }
  })
})

const clearCart = document.getElementById('clear-cart')
const cartItems = document.querySelector('.yes')
clearCart.addEventListener('click', () => {
  alert('removed')
  cartItems.classList.add(cartItems)
})

// function call_ajax() {
//   var width = window.outerWidth
//   var height = window.outerHeight

//   var xmlhttp = new XMLHttpRequest()

//   xmlhttp.onreadystatechange = function () {
//     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//       document.getElementById('abc').innerHTML = xmlhttp.responseText
//     }
//   }
//   xmlhttp.open(
//     'POST',
//     'functions.php?height=' + height + 'width=' + width,
//     true
//   )
//   xmlhttp.send()
// }
