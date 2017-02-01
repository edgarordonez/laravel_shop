document.querySelectorAll('.btn-modal').forEach((element) => {
  element.addEventListener('click', ({currentTarget}) => {
    let orderId = currentTarget.dataset.order
    window.localStorage.setItem('orderId', orderId)

    let script = document.createElement('script')
    script.setAttribute('id', 'script-react')
    script.setAttribute('type', 'text/javascript')
    script.setAttribute('src', '../js/dashboard/main.072347aa.js')
    document.getElementsByTagName('head')[0].appendChild(script)
  })
})

document.querySelectorAll('.btn-close').forEach((element) => {
  element.addEventListener('click', () => {
    document.getElementById('script-react').remove()
  })
})
