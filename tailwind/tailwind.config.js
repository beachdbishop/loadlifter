/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin');
// Set flag to include Preflight conditionally based on the build target.
const includePreflight = ( 'editor' === process.env._TW_TARGET ) ? false : true;

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
    fontFamily: {
      head: ['serenity', 'sans-serif'],
      body: ['Work Sans', 'sans-serif'],
      mono: ['Fira Code', 'Consolas', 'monospace'],
    },
		// Extend the default Tailwind theme.
		extend: {
      aspectRatio: {
        'headshot': '95 / 127',
      },
      minHeight: {
        'hero': '420px',
      },
      maxWidth: {
        '46char': '46ch',
      },
		},
	},
  safelist: [
    '-ml-4',
    '-ml-8',
    'a11y-slider-container',
    'a11y-slider-dots',
    'a11y-slider-next',
    'a11y-slider',
    'bg-current',
    'bg-pink-900/70',
    'bg-gradient-to-r',
    'border-current',
    'border-transparent',
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
    'font-head',
    'from-brand-gray',
    'from-brand-red',
    'from-brand-blue',
    'group-open:bg-neutral-300',
    'group-open:bg-neutral-400',
    'grow',
    'h-8',
    'hover:bg-neutral-100',
    'hover:bg-neutral-200',
    'hover:bg-orange',
    'hover:border-transparent',
    'hover:border-neutral-600',
    'hover:text-white',
    'leading-tight',
    'list-square',
    'max-w-2xl',
    'max-w-3xl',
    'max-w-4xl',
    'max-w-md',
    'max-w-prose',
    'md:hidden',
    'md:inline',
    'papercorners-144',
    'rounded-md',
    'shadow-brand-blue-dark/50',
    'shadow-sm',
    'slider-quotes',
    'slider',
    'table-oldtab',
    'text-base',
    'text-brand-gray-dark',
    'to-brand-gray',
    'to-brand-red',
    'to-brand-blue',
    'transition-colors',
    'truncate',
    'via-brand-gray',
    'via-brand-red',
    'via-brand-blue',
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
    },
    {
      pattern: /(from|via|to)-(neutral)-(50|100|200|300|400|500|600|700|800|900)/,
    },
    {
      pattern: /(from|via|to)-brand-(gray|red|blue)-(faint|pale|dark)/,
    }
  ],
	corePlugins: {
		// Disable Preflight base styles in CSS targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
    function ({ addVariant }) {
      addVariant('children', '&>*')
    },
		// Add Tailwind Typography.
		require( '@tailwindcss/typography' ),

		// Extract colors and widths from `theme.json`.
		require( '@_tw/themejson' )( require( '../theme/theme.json' ) ),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require( '@tailwindcss/aspect-ratio' ),
		// require( '@tailwindcss/forms' ),
		// require( '@tailwindcss/line-clamp' ),
    require( '@shrutibalasa/tailwind-grid-auto-fit' ),
	],
};
