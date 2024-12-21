export default function MainNav() {
	// Mobile menu
	const menuToggle = document.getElementById('menu-toggle')
	const body = document.body

	menuToggle.addEventListener('click', () => {
		// Toggle the 'overflow hidden on the body element
		body.classList.toggle('overflow-hidden')
	})

	// Toggle submenus when clicking on menu items with children
	const menuItems = document.querySelectorAll('.main-nav-mobile > .menu-item.menu-item-has-children')

	console.log({ menuItems })

	for (const menuItem of menuItems) {
		const submenu = menuItem.querySelector('.sub-menu')
		const arrow = menuItem.querySelector('.mobile-arrow')
		menuItem.addEventListener('click', (e) => {
			e.stopPropagation() // Prevent parent item from toggling

			// Close all other menus
			for (const item of menuItems) {
				if (item !== menuItem) {
					item.querySelector('.sub-menu').classList.remove('opened')
					console.log(item.querySelector('.mobile-arrow'))
					const arrow = item.querySelector('.mobile-arrow')
					arrow.style.transform = 'rotate(0deg)'
				}
			}

			// Toggle the class 'left-0' on the submenu
			if (submenu.classList.contains('opened')) {
				submenu.classList.remove('opened')
				arrow.style.transform = 'rotate(0deg)'
			} else {
				submenu.classList.add('opened') // Add the class 'left-0' for smooth transition
				arrow.style.transform = 'rotate(90deg)'
			}

		})
	}
}
