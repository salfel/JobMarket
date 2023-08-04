import {usePage} from "@inertiajs/vue3";
import route from "ziggy-js";

export async function uploadFile(file: File) {
	const formData = new FormData()
	formData.append('logo', file)
	//@ts-ignore
	formData.append('_token', usePage().props._token)
	const response = await fetch(route('upload'), {
		method: 'POST',
		body: formData
	})
	return (await response.json()).path
}
