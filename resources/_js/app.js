import {createApp, h} from "vue";
import {createInertiaApp, Link} from "@inertiajs/vue3";
import PrimeVue from "primevue/config";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import Textarea from "primevue/textarea";
import FileUpload from "primevue/fileupload";
import AutoComplete from "primevue/autocomplete";
import Card from "primevue/card";
import Toast from "primevue/toast";
import Dropdown from "primevue/dropdown";
import ToastService from "primevue/toastservice";

createInertiaApp({
	resolve: (name) => {
		const pages = import.meta.glob("./Pages/**/*.vue", {eager: true});
		return pages[`./Pages/${name}.vue`];
	},
	setup({el, App, props, plugin}) {
		createApp({render: () => h(App, props)})
			.use(plugin)
			.use(PrimeVue)
			.use(ToastService)
			.component("Link", Link)
			.component("Button", Button)
			.component("InputText", InputText)
			.component("Password", Password)
			.component("Textarea", Textarea)
			.component("FileUpload", FileUpload)
			.component("AutoComplete", AutoComplete)
			.component("Card", Card)
			.component("Toast", Toast)
			.component("Dropdown", Dropdown)
			.mount(el);
	},
});
