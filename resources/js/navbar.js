document.addEventListener('DOMContentLoaded', function () {
  var profileDropDownNavbar = document.querySelector('#profileDropDownNavbar')
  var toggleAppearanceMenu = document.querySelector('#toggleAppearanceMenu')

  // accounts
  document.addEventListener('click', function (event) {
    if (event.target.matches('.profileDropDownNavbarLink')) {
      profileDropDownNavbar.classList.toggle('hidden')
      profileDropDownNavbar.classList.toggle('block')
      toggleAppearanceMenu.classList.add('hidden')
      toggleAppearanceMenu.classList.remove('block')
    }
  })

  // appearance
  toggleAppearanceMenu.addEventListener('click', function () {
    toggleAppearanceMenu.classList.toggle('hidden')
    toggleAppearanceMenu.classList.toggle('block')
    profileDropDownNavbar.classList.add('hidden')
    profileDropDownNavbar.classList.remove('block')
  })

  // posts
  document.addEventListener('click', function (event) {
    if (event.target.matches('.postActionsDotsDropdownDots')) {
      var postId = event.target.dataset.id
      var postActionsDotsDropdown = document.querySelector('#postActionsDotsDropdown-' + postId)
      postActionsDotsDropdown.classList.toggle('hidden')
      postActionsDotsDropdown.classList.toggle('block')
    }
  })
})
