import {usePage} from "@inertiajs/vue3";
import route from "ziggy-js";

export async function uploadFile(file: File) {
	const formData = new FormData()
	formData.append('logo', file)
	//@ts-ignore
	formData.append('_token', usePage().props._token)
	const response = await fetch(route('upload'), {
		method: 'POST', body: formData
	})
	return (await response.json()).path
}

export function convertDate(d: string) {
	const date = new Date(d);
	const month = String(date.getMonth() + 1).padStart(2, '0');
	const day = String(date.getDate()).padStart(2, '0');
	return month + '.' + day;
}
