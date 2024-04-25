// const plugin = require('tailwindcss/plugin')

// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
	],
	future: {
		hoverOnlyWhenSupported: true
	},
	theme: {
		container: {
			center: true,
		},
		// Extend the default Tailwind theme.
		extend: {
			animation: {
				'fade-in': 'fade-in 500ms ease-in-out',
				'fade-in-from-top': 'fade-in-from-top 700ms ease-in-out',
				'fade-in-from-bottom': 'fade-in-from-bottom 700ms ease-in-out',
				'move-bg': 'move-bg 16s ease infinite',
			},
			aspectRatio: {
				headshot: '95 / 127',
				'featured-image': '384 / 125',
				'feat-3.75': '3.75 / 1',
				'feat-4.3': '4.3 / 1',
				'feat-card': '1.91',
			},
			backgroundImage: {
				'featured-image': 'var(--ll--page-feat-img)',
				headshot: "url('img/dots-neutral-500.svg')",
				'hero-gradient':
					'linear-gradient(to right, hsla(0, 0%, 16%, 0.9) 0%, hsla(0, 0%, 16%, 0.891) 8.1%, hsla(0, 0%, 16%, 0.866) 15.5%, hsla(0, 0%, 16%, 0.827) 22.5%, hsla(0, 0%, 16%, 0.777) 29%, hsla(0, 0%, 16%, 0.719) 35.3%, hsla(0, 0%, 16%, 0.654) 41.2%, hsla(0, 0%, 16%, 0.585) 47.1%, hsla(0, 0%, 16%, 0.515) 52.9%, hsla(0, 0%, 16%, 0.446) 58.8%, hsla(0, 0%, 16%, 0.381) 64.7%, hsla(0, 0%, 16%, 0.323) 71%, hsla(0, 0%, 16%, 0.273) 77.5%, hsla(0, 0%, 16%, 0.234) 84.5%, hsla(0, 0%, 16%, 0.209) 91.9%, hsla(0, 0%, 16%, 0.2) 100%)',
				'phoenix-desert-small':
					"url('img/phx-desert-color-no-crop-small.jpg')",
				'phoenix-desert3': "url('img/phx-desert-color-no-crop.jpg')",
			},
			colors: {
				mahogany: {
					50: '#fef2f3',
					100: '#ffe1e4',
					200: '#ffc8ce',
					300: '#ffa2ad',
					400: '#fd6c7d',
					500: '#f53e53',
					600: '#e31f36',
					700: '#ce182d',
					800: '#940418',
					900: '#831925',
					950: '#650b15',
				},
				orient: {
					50: '#effaff',
					100: '#def4ff',
					200: '#b6ecff',
					300: '#76deff',
					400: '#2dcfff',
					500: '#02baf5',
					600: '#0095d2',
					700: '#0077aa',
					800: '#00668e',
					900: '#075273',
					950: '#092f42',
				},
			},
			containers: {
				'2xs': '16rem',
			},
			fontFamily: {
				head: ['serenity', 'sans-serif'],
				mono: ['Fira Code', 'Consolas', 'monospace'],
				serif: ['Georgia', 'serif'],
			},
			keyframes: {
				'fade-in': {
					'0%': { opacity: 0 },
					'100%': { opacity: 1 },
				},
				'fade-in-from-top': {
					'0%': {
						opacity: '0',
						transform: 'translateY(-32px)'
					},
					'100%': {
						opacity: '1',
						transform: 'translateY(0)'
					},
				},
				'fade-in-from-bottom': {
					'0%': {
						opacity: '0',
						transform: 'translateY(64px)'
					},
					'100%': {
						opacity: '1',
						transform: 'translateY(0)'
					},
				},
				'move-bg': {
					'0%, 100%': { transform: 'translateX(0)' },
					'50%': { transform: 'translateX(-40vw)'	},
				},
			},
			maxWidth: {
				'46char': '46ch',
				'65char': '65ch',
				socimg: '736px',
			},
			minHeight: {
				hero: '360px',
			},
			textShadow: {
				none: 'none',
				sm: '0 1px 2px var(--tw-shadow-color)',
				DEFAULT: '0 2px 4px var(--tw-shadow-color)',
				lg: '0 8px 16px var(--tw-shadow-color)',
			},
		},
	},
	safelist: [
		'aspect-feat-3.75',
		'aspect-feat-4.3',
		'aspect-feat-card',
		'max-w-md',
		'max-w-xl',
		'max-w-2xl',
		'mb-3',
		'-ml-12',
		'pb-2',
		'pt-3',
		'px-2',
		'px-12',
		'py-8',
		'w-72',
		'w-fit',
		'md:float-right',
		'md:mb-2',
		'md:ml-2',
		'md:-ml-16',
		'md:px-16',
		'md:py-12',
		'lg:gap-16',
		'lg:max-w-lg',
		'lg:mb-4',
		'lg:ml-4',
		'lg:-ml-20',
		'lg:py-20',
		'lg:w-96',
	],
	corePlugins: {
		// Disable default tailwind aspect-* classes
		aspectRatio: false,
		// Disable Preflight base styles in CSS targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography (via _tw fork).
		require('@_tw/typography'),

		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),

		// Add Tailwind Typography.
		// require('@tailwindcss/typography'),

		require('@tailwindcss/container-queries'),
		require('@tailwindcss/forms'),
		require('@shrutibalasa/tailwind-grid-auto-fit'),

		// via: https://www.hyperui.dev/blog/text-shadow-with-tailwindcss
		({ matchUtilities, theme }) => {
			matchUtilities(
				{
					'text-shadow': (value) => ({
						textShadow: value,
					}),
				},
				{ values: theme('textShadow') }
			);
		},

		// via: https://www.viget.com/articles/adding-safari-14-support-to-tailwinds-aspect-ratio/
		({ matchUtilities, theme }) => {
			matchUtilities(
				{
					aspect: (value) => ({
						'@supports (aspect-ratio: 1 / 1)': {
							aspectRatio: value,
						},
						'@supports not (aspect-ratio: 1 / 1)': {
							'&::before': {
								content: '""',
								float: 'left',
								paddingTop: `calc(100% / (${value}))`,
							},
							'&::after': {
								clear: 'left',
								content: '""',
								display: 'block',
							},
						},
					}),
				},
				{ values: theme('aspectRatio') }
			);
		},

		function ({ addVariant }) {
			addVariant('children', '&>*');
		},
	],
};
