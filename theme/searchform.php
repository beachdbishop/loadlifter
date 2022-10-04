<?php

/**
 * Custom Search Form
 */
?>

<form action="/" method="get" class="flex flex-wrap w-full gap-2 md:gap-4 lg:gap-6">
	<label class="relative block p-3 bg-white border-2 rounded-lg grow border-neutral-200" for="search">
		<input class="w-full grow px-0 pt-3.5 pb-0 text-md text-neutral-800 placeholder-transparent border-none focus:ring-0 peer" type="text" name="s" id="search" placeholder="Search" value="<?php the_search_query(); ?>" />

		<span class="absolute text-xs font-medium transition-all text-neutral-500 left-3 peer-focus:text-xs peer-focus:top-3 peer-focus:translate-y-0 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-sm">
			Search
		</span>
	</label>
	<button type="submit" class="inline-flex items-center justify-center px-5 py-3 text-base text-current bg-transparent border border-current border-solid rounded-lg hover:bg-brand-blue-pale hover:border-brand-blue-pale hover:text-brand-blue-dark sm:w-auto">
		<span class="font-medium">Search <i class="fa-solid fa-arrow-right"></i></span>
	</button>
</form>
