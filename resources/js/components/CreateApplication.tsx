import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import {Application, Job, KeyTypeSelector} from "@/lib/types";
import {Separator} from "@/components/ui/separator";
import {useForm} from "@inertiajs/react";
import FormField from "@/components/FormField";
import {Textarea} from "@/components/ui/textarea";
import {Button} from "@/components/ui/button";
import {UploadIcon} from "@radix-ui/react-icons";
import {FormEvent, useMemo, useRef} from "react";
import route from "ziggy-js";

type Props = {
	job: Job
}

export default function CreateApplication({ job }: Props) {
	const form = useForm<Application>('CreateApplication', {
		name: '',
		email: '',
		phone: '',
		application_letter: '',
		residence: '',
		files: []
	})

	const fileInput = useRef<HTMLInputElement>(null)

	function setData<K extends keyof Application>(name: K, value: KeyTypeSelector<Application, K>) {
		form.setData(name, value);
		if (form.errors[name]) form.clearErrors(name);
	}

	function handleSubmit(e: FormEvent<HTMLFormElement>) {
		e.preventDefault();

		form.post(route('jobs.applications.store', [job.id]), {
			onError() {
				console.log(form.errors)
				Object.keys(form.errors).forEach(e => {
					if (e.startsWith('files')) {
						// @ts-ignore
						form.setError('files', form.errors[e])
					}
				})
			}
		})
	}

	return (
		<Card>
			<CardHeader>
				<CardTitle>Apply for {job.name}</CardTitle>
				<CardDescription>Enter your information below to apply for this job</CardDescription>
			</CardHeader>
			<div className="flex m-6 mt-0">
				<Separator />
			</div>
			<CardContent>
				<form className="space-y-5" onSubmit={handleSubmit}>
					<FormField name="Name" value={form.data.name} onChange={e => setData('name', e.currentTarget.value)} error={form.errors.name} />
					<div className="flex flex-wrap gap-5">
						<FormField className="base-52 grow" value={form.data.email} onChange={e => setData('email', e.currentTarget.value)} error={form.errors.email} name="Email" type="email"  />
						<FormField className="base-52 grow" value={form.data.phone} onChange={e => setData('phone', e.currentTarget.value)} error={form.errors.phone} name="Phone" type="tel" />
						<FormField className="base-52 grow" value={form.data.residence} onChange={e => setData('residence', e.currentTarget.value)} error={form.errors.residence} name="Residence" type="application_letter" />
					</div>
					{/*@ts-ignore*/}
					<FormField name="Resume and other" error={form.errors.files}>
						<input id="logo" type="file" ref={fileInput} className="hidden" accept=".pdf, .doxc, .txt"
							   onChange={() => fileInput.current?.files && setData('files', [...form.data.files, fileInput.current.files[0]])} />
						<div className="flex items-center gap-3">
							<Button type="button" className="px-4 py-3" onClick={() => fileInput.current?.click()}>
								<UploadIcon className="mr-2 w-4 h-4"/>
								Upload
							</Button>
							<div className="inline-flex flex-1 overflow-hidden h-full gap-3">
								{form.data.files?.map(file => file.name).map(file => (
									<span key={file} className="font-medium application_letter-sm">{file}</span>
								))}
							</div>
						</div>
					</FormField>
					<FormField name="Application Letter" error={form.errors.application_letter}>
						<Textarea value={form.data.application_letter}
								  onChange={e => setData('application_letter', e.currentTarget.value)}/>
					</FormField>
					<Button type="submit" className="w-full">Submit</Button>
				</form>
			</CardContent>
		</Card>
	)
}
