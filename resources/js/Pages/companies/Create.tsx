import ComboBox from "@/components/ComboBox"
import { useForm, Head } from "@inertiajs/react"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { Textarea } from "@/components/ui/textarea"
import { FormEvent } from "react";
import { Button } from "@/components/ui/button"
import { regions } from "@/lib/constants"
import { UploadIcon } from "@radix-ui/react-icons"
import { useRef } from "react"
import route from "ziggy-js"
import { KeyTypeSelector } from "@/lib/types"

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
		name: '',
		description: '',
		email: '',
		phone: '',
		website: '',
		location: '',
		region: '',
		logo: null
	});

	let fileInput = useRef<HTMLInputElement>(null)

	function setData<K extends keyof Company>(name: K , value: KeyTypeSelector<Company, K>) {
		form.setData(name, value);
		if (form.errors[name]) form.clearErrors(name);
	}

	function handleSubmit(e: FormEvent) {
		e.preventDefault();

		form.post(route('companies.store'))
	}

	return (
		<>
			<Head>
				<title>Create Company</title>
			</Head>
			<form onSubmit={handleSubmit} className="space-y-5 mx-auto w-full max-w-2xl">
				<div>
					<Label className="block mb-1" htmlFor="name">Name</Label>
					<Input id="name" autoComplete="off" value={form.data.name} onChange={e => setData("name", e.currentTarget.value)} />
					{form.errors.name &&
						<span className="mt-2 text-red-500 text-xs">{form.errors.name}</span>
					}
				</div>
				<div>
					<Label className="block mb-1" htmlFor="description">Description</Label>
					<Textarea id="description" autoComplete="off" value={form.data.description} onChange={e => setData("description", e.currentTarget.value)} />
					{form.errors.description &&
						<span className="mt-2 text-red-500 text-xs">{form.errors.description}</span>
					}
				</div>
				<div className="flex flex-wrap gap-5">
					<div className="basis-52 grow">
						<Label className="block mb-1" htmlFor="phone">Phone</Label>
						<Input id="phone" autoComplete="off" value={form.data.phone} onChange={e => setData("phone", e.currentTarget.value)} />
					{form.errors.phone &&
						<span className="mt-2 text-red-500 text-xs">{form.errors.phone}</span>
					}
					</div>
					<div className="basis-52 grow">
						<Label className="block mb-1" htmlFor="email">Email</Label>
						<Input id="email" autoComplete="off" value={form.data.email} onChange={e => setData("email", e.currentTarget.value)} />
					{form.errors.email &&
						<span className="mt-2 text-red-500 text-xs">{form.errors.email}</span>
					}
					</div>
					<div className="basis-52 grow">
						<Label className="block mb-1" htmlFor="website">Website</Label>
						<Input id="website" autoComplete="off" value={form.data.website} onChange={e => setData("website", e.currentTarget.value)} />
					{form.errors.website &&
						<span className="mt-2 text-red-500 text-xs">{form.errors.website}</span>
					}
					</div>
				</div>
				<div>
					<Label className="block mb-1" htmlFor="logo">Logo</Label>
					<div>
						<input id="logo" type="file" ref={fileInput} className="hidden" accept="image/*" onChange={() => fileInput.current?.files && setData('logo', fileInput.current.files[0])} />
						<Button type="button" onClick={() => fileInput.current?.click()}>
							<UploadIcon className="mr-2 w-4 h-4" />
							Upload
						</Button>
						<span className="ml-3 font-medium text-sm">{form.data.logo?.name}</span>
					</div>
					{form.errors.logo &&
						<span className="mt-2 text-red-500 text-xs">{form.errors.logo}</span>
					}
				</div>
				<div className="flex flex-wrap gap-5">
					<div className="basis-52 grow">
						<Label className="block mb-1" htmlFor="region">Region</Label>
						<ComboBox className="!w-full" id="region" items={regions.map(region => ({ label: region, value: region }))} multiple={false} onChange={value => setData('region', value)} name="Region"/>
					{form.errors.region &&
						<span className="mt-2 text-red-500 text-xs">{form.errors.region}</span>
					}
					</div>
					<div className="basis-52 grow">
						<Label className="block mb-1" htmlFor="location">Location</Label>
						<Input id="location" autoComplete="off" value={form.data.location} onChange={e => setData("location", e.currentTarget.value)}/>
					{form.errors.location &&
						<span className="mt-2 text-red-500 text-xs">{form.errors.location}</span>
					}
					</div>
				</div>
				<Button disabled={form.processing} type="submit" className="w-full">Submit</Button>
			</form>
		</>
	)
}
