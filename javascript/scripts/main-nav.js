export default function MainNav() {
	// Mobile menu
	const menuToggle = document.getElementById('menu-toggle');
	const body = document.body;

	menuToggle.addEventListener('click', () => {
		// Toggle the 'overflow hidden on the body element
		body.classList.toggle('overflow-hidden');
	});

	// Toggle submenus when clicking on menu items with children
	const menuItems = document.querySelectorAll('.mobile-menu .menu-item');

	menuItems.forEach((menuItem) => {
		const submenu = menuItem.querySelector('.sub-menu');
		menuItem.addEventListener('click', (e) => {
			e.stopPropagation(); // Prevent parent item from toggling

			// Toggle the class 'left-0' on the submenu
			if (submenu.classList.contains('left-0')) {
				submenu.classList.remove('left-0');
			} else {
				submenu.classList.add('left-0'); // Add the class 'left-0' for smooth transition
			}

			const firstParagraph = submenu.querySelector('.back');
			firstParagraph.addEventListener('click', (s) => {
				submenu.classList.remove('left-0');
				s.stopPropagation(); // Prevent parent item from toggling
			});

			// Get the title of the menu item
			const title = menuItem.querySelector('.menu-item-link').innerHTML;
			//remove elements with class "parent-title" if they exist
			const parentTitles = document.querySelectorAll('.parent-title');
			parentTitles.forEach((parentTitle) => {
				parentTitle.remove();
			});
			// create a li with a class "parent-title" after the "back" li and add the title to it
			const parentTitle = document.createElement('li');
			parentTitle.classList.add('parent-title');
			parentTitle.innerHTML = title;
			submenu.insertBefore(parentTitle, firstParagraph);
		});
	});
}
  