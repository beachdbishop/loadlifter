const plugin = require('tailwindcss/plugin')

// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require( './tailwind-typography.config.js' ),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
		'./theme/theme.json',
	],
	theme: {
    container: {
      center: true,
    },
    fontFamily: {
      head: ['serenity', 'sans-serif'],
      body: ['Work Sans', 'sans-serif'],
      mono: ['Fira Code', 'Consolas', 'monospace'],
      serif: ['Georgia', 'serif'],
    },
		// Extend the default Tailwind theme.
		extend: {
      aspectRatio: {
        'headshot': '95 / 127',
        'featured-image': '384 / 125',
      },
      backgroundImage: {
        'featured-image': "var(--ll--page-feat-img)",
        'headshot': "url('img/dots-neutral-500.svg')",
        'hero-gradient': "linear-gradient(to right, hsla(0, 0%, 16%, 0.9) 0%, hsla(0, 0%, 16%, 0.891) 8.1%, hsla(0, 0%, 16%, 0.866) 15.5%, hsla(0, 0%, 16%, 0.827) 22.5%, hsla(0, 0%, 16%, 0.777) 29%, hsla(0, 0%, 16%, 0.719) 35.3%, hsla(0, 0%, 16%, 0.654) 41.2%, hsla(0, 0%, 16%, 0.585) 47.1%, hsla(0, 0%, 16%, 0.515) 52.9%, hsla(0, 0%, 16%, 0.446) 58.8%, hsla(0, 0%, 16%, 0.381) 64.7%, hsla(0, 0%, 16%, 0.323) 71%, hsla(0, 0%, 16%, 0.273) 77.5%, hsla(0, 0%, 16%, 0.234) 84.5%, hsla(0, 0%, 16%, 0.209) 91.9%, hsla(0, 0%, 16%, 0.2) 100%)",
        'phoenix-desert-small': "url('img/phx-desert-color-no-crop-small.jpg')",
        'phoenix-desert3': "url('img/phx-desert-color-no-crop.jpg')",
      },
      backgroundSize: {
        '180pct': '180% 180%',
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
      maxWidth: {
        '46char': '46ch',
        '65char': '65ch',
        'socimg': '736px',
      },
      minHeight: {
        'hero': '360px',
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
    '-ml-4',
    '-ml-8',
    'alignright',
    'a11y-slider-container',
    'a11y-slider-dots',
    'a11y-slider-next',
    'a11y-slider',
    'bg-180pct',
    'bg-current',
    'bg-brand-gray-dark',
    'bg-brand-red-dark',
    'bg-brand-blue-dark',
    'border-brand-blue-dark',
    'border-brand-gray-dark',
    'border-brand-red-dark',
    'border-brand-red-pale',
    'border-amber-300',
    'border-current',
    'border-transparent',
    'collapse',
    'columns-2',
    'columns-3',
    'delay-150',
    'divide-brand-blue-faint',
    'divide-brand-blue',
    'divide-brand-red',
    'divide-current',
    'divide-solid',
    'divide-x',
    'divide-y',
    'ease-in-out',
    'flex-start',
    'group-open:bg-neutral-300',
    'group-open:bg-neutral-400',
    'grow',
    'h-8',
    'hidden',
    'hover:bg-neutral-100',
    'hover:bg-neutral-200',
    'hover:bg-orange',
    'hover:bg-brand-red-dark',
    'hover:border-brand-blue-faint',
    'hover:border-brand-red-faint',
    'hover:border-brand-red-pale',
    'hover:border-transparent',
    'hover:border-neutral-600',
    'hover:text-brand-blue-faint',
    'hover:text-brand-red-faint',
    'hover:text-white',
    'inline',
    'leading-tight',
    'lg:collapse',
    'lg:columns-2',
    'lg:columns-3',
    'lg:gap-16',
    'lg:gap-x-16',
    'lg:gap-y-12',
    'lg:grid-cols-2',
    'lg:visible',
    'list-square',
    'max-w-2xl',
    'max-w-3xl',
    'max-w-4xl',
    'max-w-5xl',
    'max-w-6xl',
    'max-w-md',
    'max-w-prose',
    'md:place-content-start',
    'rounded-md',
    'shadow-brand-blue-dark/50',
    'shadow-brand-blue-dark',
    'shadow-sm',
    'slider-quotes',
    'slider',
    'table-oldtab',
    'text-base',
    'text-brand-gray-dark',
    'text-shadow-sm',
    'text-shadow',
    'text-shadow-lg',
    'to-brand-gray',
    'to-brand-red',
    'to-brand-blue',
    'transition-colors',
    'truncate',
    'via-brand-gray',
    'via-brand-red',
    'via-brand-blue',
    'visible',
    'w-40',
    'w-8',
    'w-fit',
    {
      pattern: /bg-(amber|neutral|green)-(50|100|200|300|400|500|600|700|800|900)/,
    },
    {
      pattern: /border-(t|l|b|r|x|y)-(1|2|3|4)/,
    },
    {
      pattern: /border-(1|2|3|4)/,
    },
    {
      pattern: /m(t|l|b|r|x|y)-(0|1|2|4|6|8|10|12|16)/,
    },
    {
      pattern: /m-(0|1|2|4|6|8|10|12|16)/,
    },
    {
      pattern: /p(t|l|b|r|x|y)-(0|1|2|4|6|8|10|12|16)/,
    },
    {
      pattern: /p-(0|1|2|4|6|8|10|12|16)/,
    }
  ],
	corePlugins: {
		// Disable Preflight base styles in CSS targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
    // Extract colors and widths from `theme.json`.
		require('@_tw/themejson')(require('../theme/theme.json')),
    // Add Tailwind Typography.
		require('@tailwindcss/typography' ),
		// Uncomment below to add additional first-party Tailwind plugins.
		// require( '@tailwindcss/aspect-ratio' ),
		require( '@tailwindcss/forms' ),
    // require( '@tailwindcss/container-queries' ),
    require('@shrutibalasa/tailwind-grid-auto-fit'),

    // via: https://www.hyperui.dev/blog/text-shadow-with-tailwindcss
    plugin(function ({ matchUtilities, theme }) {
      matchUtilities(
        {
          'text-shadow': (value) => ({
            textShadow: value,
          }),
        },
        { values: theme('textShadow') }
      )
    }),
    function ({ addVariant }) {
      addVariant('children', '&>*')
    },
	],
};
