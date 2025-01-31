<?php
/**
 * WebShare partial
 *
 * "User-friendly social sharing component that works for everyone, using built-in APIs and progressive enhancement." - Andy Bell
 *
 * Adapted from example at: https://set.studio/simplify-sharing-with-built-in-apis-and-progressive-enhancement/
 */
?>

<script type="module">
import {createApp} from 'https://unpkg.com/petite-vue@0.2.2/dist/petite-vue.es.js';

const share = ({title, url}) => {
	return {
		title,
		url,
		webShareSupported: navigator.share,
		clipboardSupported: navigator.clipboard,
		shareFeedback: '',
		copyFeedback: '',
		noOptionsAvailable() {
			return !this.clipboardSupported && !this.webShareSupported;
		},
		share() {
			navigator
				.share({
					title,
					url,
					text: title,
				})
				.then(() => {
					this.shareFeedback = 'Thanks!';

					setTimeout(() => {
						this.shareFeedback = '';
					}, 3000);
				})
				.catch((error) => console.error('Error sharing', error));
		},
		copyLink() {
			navigator.clipboard
				.writeText(url)
				.then(() => {
					this.copyFeedback = 'Link copied!';

					setTimeout(() => {
						this.copyFeedback = '';
					}, 3000);
				})
				.catch((error) => console.error(error));
		},
	};
};

createApp({share}).mount();
</script>

<div
	id="share"
	tabindex="-1"
	class="my-8  |  lg:my-12 print:hidden"
	v-scope="share({ url:'<?php echo get_permalink(); ?>', title: '<?php the_title(); ?>' })"
	data-share-url="<?php echo get_permalink(); ?>"
	data-share-title="<?php the_title(); ?>"
>
	<p v-if="clipboardSupported || webShareSupported" class="mb-2 text-xl font-semibold font-head text-neutral-700  |  dark:text-neutral-400">Share with your network</p>
	<div v-if="!clipboardSupported && !webShareSupported">
		<p>Copy this link:</p>
		<p><code><?php echo get_permalink(); ?></code></p>
	</div>
	<div :class="!noOptionsAvailable() ? 'flex gap-2' : null" hidden :hidden="noOptionsAvailable()">
		<div class="relative" v-if="webShareSupported">
			<button class="inline-flex items-center justify-center px-5 py-3 font-bold no-underline border-2 border-orient-900 rounded-lg text-orient-900 font-head shadow-neutral-900/10  |  hover:shadow-xl hover:bg-orient-900 hover:text-white focus:outline-hidden focus:ring-3 focus:ring-3-orient-400/80 dark:border-orient-400 dark:text-orient-400 dark:hover:text-neutral-800 dark:hover:bg-orient-400 sm:w-auto lg:text-lg" data-theme="ghost" @click="share">
					<span><i class="fa-solid fa-share"></i> Share</span>
			</button>
			<p
				role="alert"
				aria-live="polite"
				id="shareFeedback"
				class="context-alert  |  animate-bounce bg-yellow-100 text-neutral-800 font-bold p-1 absolute text-center transition-opacity duration-200 ease-in-out  |  data-[state=empty]:opacity-0 data-[state=empty]:translate-y-1 data-[state=empty]:transition-none"
				style="inset: auto 0 calc(100% + 0.5rem) 0"
				data-state="empty"
				:data-state="shareFeedback.length ? null : 'empty'"
			>
				{{ shareFeedback }}
			</p>
		</div>
		<div class="relative" v-if="clipboardSupported">
			<button class="inline-flex items-center justify-center px-5 py-3 font-bold no-underline border-2 border-orient-900 rounded-lg text-orient-900 font-head shadow-neutral-900/10  |  hover:shadow-xl hover:bg-orient-900 hover:text-white focus:outline-hidden focus:ring-3 focus:ring-3-orient-400/80 dark:border-orient-400 dark:text-orient-400 dark:hover:text-neutral-800 dark:hover:bg-orient-400 sm:w-auto lg:text-lg" data-theme="ghost" @click="copyLink">
					<span><i class="fa-solid fa-copy"></i> Copy link</span>
			</button>
			<p
				role="alert"
				aria-live="polite"
				id="copyFeedback"
				class="context-alert  |  animate-bounce bg-yellow-100 text-neutral-800 font-bold p-1 absolute text-center transition-opacity duration-200 ease-in-out  |  data-[state=empty]:opacity-0 data-[state=empty]:translate-y-1 data-[state=empty]:transition-none"
				style="inset: auto 0 calc(100% + 0.5rem) 0"
				data-state="empty"
				:data-state="copyFeedback.length ? null : 'empty'"
			>
				{{ copyFeedback }}
			</p>
		</div>
	</div>
</div>
