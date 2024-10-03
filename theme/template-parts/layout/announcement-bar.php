<?php

/**
 * Template part for displaying the announcement bar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dango
 */

$announcement_settings = get_field('announcement_bar', 'option');

$content = $announcement_settings['content'];
$text_color = $announcement_settings['text_color'];
$background_color = $announcement_settings['background_color'];
$hide_bar = $announcement_settings['hide_announcement_bar'];

if ($hide_bar) {
	return;
}
?>

<style>
	#announcement-bar {
		background-color: <?= $background_color ?>;
		color: <?= $text_color ?>;
	}

	#announcement-bar>* {
		color: <?= $text_color ?>;
		margin: 0;
		font-size: 0.75rem;
		line-height: normal;
		text-wrap: balance;
	}

	#announcement-bar a {
		text-decoration: underline !important;
	}

	.announcement-bar-transition {
		transition: visibility 0.5s;
	}

	.header-transition {
		transition: top 250ms;
	}

	.hidden-element {
		visibility: hidden;
	}

	.visible-element {
		visibility: visible;
	}
</style>

<script>
	document.addEventListener('alpine:init', () => {
		Alpine.data('AnnouncementBar', () => ({
			previousScrollY: 0,
			adminBarHeight: 0,
			announcementBarHeight: 0,
			init() {
				this.calculateContentSpaceTop()

				const header = document.querySelector('#masthead')
				const announcementBar = this.$el
				this.announcementBarHeight = announcementBar.offsetHeight

				const wpAdminBar = document.querySelector('#wpadminbar')
				this.adminBarHeight = wpAdminBar ? wpAdminBar.offsetHeight : 0

				this.calculateHeight({ header, announcementBar, announcementBarHeight: this.announcementBarHeight, wpAdminBar, adminBarHeight: this.adminBarHeight })
				window.addEventListener('resize', () => this.calculateHeight({ header, announcementBar, announcementBarHeight: this.announcementBarHeight, wpAdminBar, adminBarHeight: this.adminBarHeight }))

				// hide announcement bar on scroll
				window.addEventListener('scroll', () => {
					const currentScrollY = window.scrollY

					if (currentScrollY > this.previousScrollY && currentScrollY > 100) {
						header.classList.add('header-transition');
						header.style.top = wpAdminBar ? `${this.adminBarHeight}px` : '0';
						announcementBar.classList.add('hidden-element');
						announcementBar.classList.remove('visible-element');
					} else if (currentScrollY < this.previousScrollY && currentScrollY > 50) {
						announcementBar.classList.add('visible-element');
						announcementBar.classList.remove('hidden-element');
						header.classList.add('header-transition');
						header.style.top = wpAdminBar ? `${this.announcementBarHeight + this.adminBarHeight}px` : `${this.announcementBarHeight}px`;
					}

					this.previousScrollY = currentScrollY;
				});
			},
			calculateHeight({ header, announcementBar, announcementBarHeight, wpAdminBar, adminBarHeight }) {
				header.style.top = `${announcementBarHeight}px`
				this.adminBarHeight = wpAdminBar ? wpAdminBar.offsetHeight : 0
				this.announcementBarHeight =announcementBar.offsetHeight

				if (wpAdminBar) {
					header.style.top = `${announcementBarHeight + adminBarHeight}px`
					announcementBar.style.top = `${adminBarHeight}px`
				}


			},
			calculateContentSpaceTop() {
				const content = document.querySelector('#content');
				const header = document.querySelector('#masthead');
				const announcementBar = document.querySelector('#announcement-bar');

				if (!content || !header || !announcementBar) return;

				content.style.paddingTop = `${header.offsetHeight + announcementBar.offsetHeight}px`;
			}
		}))
	}, {
		once: true
	});
</script>

<div class="fixed inset-0 z-20 w-full py-[9px] px-3 text-center announcement-bar h-fit announcement-bar-transition"
	id="announcement-bar" x-data="AnnouncementBar">
	<?= $content ?>
</div>
