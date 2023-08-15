import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import {Application, Job, KeyTypeSelector} from "@/lib/types";
import {Separator} from "@/components/ui/separator";
import {useForm} from "@inertiajs/react";
import FormField from "@/components/FormField";
import {Textarea} from "@/components/ui/textarea";
import {Button} from "@/components/ui/button";
import {UploadIcon} from "@radix-ui/react-icons";
import {useRef} from "react";
import FileUpload from "@/components/FIleUpload";

type Props = {
	job: Job
}

export default function CreateApplication({ job }: Props) {
	const form = useForm<Application>('CreateApplication', {
		name: '',
		email: '',
		phone: '',
		text: '',
		residence: '',
		files: []
	})

	const fileInput = useRef<HTMLInputElement>(null)

	function setData<K extends keyof Application>(name: K, value: KeyTypeSelector<Application, K>) {
		form.setData(name, value);
		if (form.errors[name]) form.clearErrors(name);
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
			<CardContent className="space-y-5">
				<FormField name="Name" value={form.data.name} onChange={e => setData('name', e.currentTarget.value)} error={form.errors.name} />
				<div className="flex flex-wrap gap-5">
					<FormField className="base-52 grow" value={form.data.email} onChange={e => setData('email', e.currentTarget.value)} error={form.errors.email} name="Email" type="email"  />
					<FormField className="base-52 grow" value={form.data.phone} onChange={e => setData('phone', e.currentTarget.value)} error={form.errors.phone} name="Phone" type="tel" />
				</div>
				<FormField name="Text" error={form.errors.text}>
					<Textarea value={form.data.text}
							  onChange={e => setData('text', e.currentTarget.value)}/>
				</FormField>

				{/*<FormField name="Files" error={form.errors.files}>*/}
                {/*    <input id="logo" type="file" ref={fileInput} className="hidden" accept=".pdf, .doxc, .txt"*/}
                {/*           onChange={() => fileInput.current?.files && setData('files', [...form.data.files, fileInput.current.files[0]])} />*/}
				{/*	<div className="flex items-center gap-3">*/}
                {/*        <Button type="button" onClick={() => fileInput.current?.click()}>*/}
                {/*            <UploadIcon className="mr-2 w-4 h-4"/>*/}
                {/*            Upload*/}
                {/*        </Button>*/}
                {/*        <span className="inline-block flex-1 font-medium text-sm truncate">{form.data.files?.map(file => file.name).join(' ')}</span>*/}
				{/*	</div>*/}
				{/*</FormField>*/}
				<FileUpload />
			</CardContent>
		</Card>
	)
}
