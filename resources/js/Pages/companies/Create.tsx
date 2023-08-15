import ComboBox from "@/components/ComboBox"
import {useForm, Head} from "@inertiajs/react"
import {Textarea} from "@/components/ui/textarea"
import {FormEvent} from "react";
import {Button} from "@/components/ui/button"
import FormField from "@/components/FormField";
import {Separator} from "@/components/ui/separator"
import {regions} from "@/lib/constants"
import {UploadIcon} from "@radix-ui/react-icons"
import {useRef} from "react"
import route from "ziggy-js"
import {KeyTypeSelector} from "@/lib/types"

type Company = {
	name: string,
	description: string,
	email: string,
	phone: string,
	website: string,
	location: string,
	region: string,
	logo: File | null
}

export default function Create({}) {
	const form = useForm<Company>({
		name: '', description: '', email: '', phone: '', website: '', location: '', region: '', logo: null
	});

	let fileInput = useRef<HTMLInputElement>(null)

	function setData<K extends keyof Company>(name: K, value: KeyTypeSelector<Company, K>) {
		form.setData(name, value);
		if (form.errors[name]) form.clearErrors(name);
	}

	function handleSubmit(e: FormEvent) {
		e.preventDefault();

		form.post(route('companies.store'))
	}

	return <>
		<Head>
			<title>Create Company</title>
		</Head>
		<div className="mx-auto">
			<div className="mb-3 space-y-1">
				<h1 className="font-semibold text-2xl">Create Company</h1>
				<p className="text-gray-700">Start right now listing your jobs on our amazing platform to hire
					amazing people</p>
			</div>
			<Separator className="my-7"/>
			<form onSubmit={handleSubmit} className="space-y-5 mx-auto w-full max-w-2xl">
				<FormField name="Name" value={form.data.name} onChange={e => setData('name', e.currentTarget.value)}
						   error={form.errors.name}/>
				<FormField name="Description" error={form.errors.description}>
					<Textarea value={form.data.description}
							  onChange={e => setData('description', e.currentTarget.value)}/>
				</FormField>
				<div className="flex flex-wrap gap-5">
					<FormField className="base-52 grow" name="Email" value={form.data.email}
							   onChange={e => setData('email', e.currentTarget.value)} error={form.errors.email}/>
					<FormField className="base-52 grow" name="Phone" value={form.data.phone}
							   onChange={e => setData('phone', e.currentTarget.value)} error={form.errors.phone}/>
					<FormField className="base-52 grow" name="Website" value={form.data.website}
							   onChange={e => setData('website', e.currentTarget.value)}
							   error={form.errors.website}/>
				</div>
				<FormField name="Logo" error={form.errors.logo}>
					<input id="logo" type="file" ref={fileInput} className="hidden" accept="image/*"
						   onChange={() => fileInput.current?.files && setData('logo', fileInput.current.files[0])}/>
					<Button type="button" onClick={() => fileInput.current?.click()}>
						<UploadIcon className="mr-2 w-4 h-4"/>
						Upload
					</Button>
					<span className="ml-3 font-medium text-sm">{form.data.logo?.name}</span>
				</FormField>
				<div className="flex flex-wrap gap-5">
					<FormField className="base-52 grow" name="Region" error={form.errors.region}>
						<ComboBox className="!w-full" id="region"
								  items={regions.map(region => ({label: region, value: region}))} multiple={false}
								  onChange={value => setData('region', value)} name="Region"/>
					</FormField>
					<FormField className="base-52 grow" name="Location" value={form.data.location}
							   onChange={e => setData('location', e.currentTarget.value)}
							   error={form.errors.location}/>
				</div>
				<Button disabled={form.processing} type="submit" className="w-full">Submit</Button>
			</form>
		</div>
	</>
}
