import {createInertiaApp} from '@inertiajs/react'
import {createRoot} from 'react-dom/client'
import AppLayout from "@/layouts/AppLayout";
import '../css/app.css'

createInertiaApp({
	resolve: name => {
		const pages = import.meta.glob('./Pages/**/*.tsx', {eager: true})
		let page = pages[`./Pages/${name}.tsx`];
		page.default.layout = name.startsWith('auth') ? undefined : page => <AppLayout children={page} />
		return page;
	},
	setup({el, App, props}) {
		createRoot(el).render(<App {...props} />)
	},
})
